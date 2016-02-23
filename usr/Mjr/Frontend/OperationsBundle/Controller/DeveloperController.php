<?php

namespace Mjr\Frontend\OperationsBundle\Controller;

use Mjr\Library\ControllerBundle\Controller\ControllerAbstract;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Class PreferencesController
 * @package Mjr\Frontend\OperationsBundle\Controller
 * @author Chris Westerfield <chris@MJR.ONE>
 * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
 * @copyright MJR.ONE Group
 * @link http://www.MJR.ONE
 */
class DeveloperController extends ControllerAbstract
{
    /**
     * @Route("/Developer/EnableProfiler", name="developer_enable_profiler")
     * @return RedirectResponse
     */
    public function enableProfilerAction()
    {
        $Response = new RedirectResponse($this->generateUrl('homepage_controller'));
        $Response->headers->setCookie(new Cookie('MJRProfiler','yes'));
        return $Response;
    }
    /**
     * @Route("/Developer/DisableProfiler", name="developer_disable_profiler")
     * @return RedirectResponse
     */
    public function disableProfilerAction()
    {
        $Response = new RedirectResponse($this->generateUrl('homepage_controller'));
        $Response->headers->setCookie(new Cookie('MJRProfiler','no'));
        return $Response;
    }

    /**
     * @Route("/Developer/ClearCache", name="developer_clear_cache")
     * @return RedirectResponse
     */
    public function clearCacheAction()
    {
        $Response = new RedirectResponse($this->generateUrl('homepage_controller'));
        $realCacheDir = $this->getParameter('kernel.cache_dir');
        $oldCacheDir = substr($realCacheDir, 0, -1).('~' === substr($realCacheDir, -1) ? '+' : '~');
        $filesystem = $this->get('filesystem');
        if (!is_writable($realCacheDir))
        {
            throw new \RuntimeException(sprintf('Unable to write in the "%s" directory', $realCacheDir));
        }
        if ($filesystem->exists($oldCacheDir))
        {
            $filesystem->remove($oldCacheDir);
        }
        $kernel = $this->get('kernel');
        $this->get('cache_clearer')->clear($realCacheDir);
        // the warmup cache dir name must have the same length than the real one
        // to avoid the many problems in serialized resources files
        $realCacheDir = realpath($realCacheDir);
        $warmupDir = substr($realCacheDir, 0, -1).('_' === substr($realCacheDir, -1) ? '-' : '_');
        if ($filesystem->exists($warmupDir))
        {
            $filesystem->remove($warmupDir);
        }
        $this->warmup($warmupDir, $realCacheDir);

        $filesystem->rename($realCacheDir, $oldCacheDir);
        if ('\\' === DIRECTORY_SEPARATOR) {
            sleep(1);  // workaround for Windows PHP rename bug
        }
        $filesystem->rename($warmupDir, $realCacheDir);
        $this->clearRedisCache();
        return $Response;
    }

    /**
     * @param string $warmupDir
     * @param string $realCacheDir
     * @param bool   $enableOptionalWarmers
     */
    protected function warmup($warmupDir, $realCacheDir, $enableOptionalWarmers = true)
    {
        // create a temporary kernel
        $realKernel = $this->get('kernel');
        $realKernelClass = get_class($realKernel);
        $namespace = '';
        if (false !== $pos = strrpos($realKernelClass, '\\')) {
            $namespace = substr($realKernelClass, 0, $pos);
            $realKernelClass = substr($realKernelClass, $pos + 1);
        }
        $tempKernel = $this->getTempKernel($realKernel, $namespace, $realKernelClass, $warmupDir);
        $tempKernel->boot();

        $tempKernelReflection = new \ReflectionObject($tempKernel);
        $tempKernelFile = $tempKernelReflection->getFileName();

        // warmup temporary dir
        $warmer = $tempKernel->getContainer()->get('cache_warmer');
        if ($enableOptionalWarmers) {
            $warmer->enableOptionalWarmers();
        }
        $warmer->warmUp($warmupDir);

        // fix references to the Kernel in .meta files
        $safeTempKernel = str_replace('\\', '\\\\', get_class($tempKernel));
        $realKernelFQN = get_class($realKernel);

        foreach (Finder::create()->files()->name('*.meta')->in($warmupDir) as $file) {
            file_put_contents($file, preg_replace(
                '/(C\:\d+\:)"'.$safeTempKernel.'"/',
                sprintf('$1"%s"', $realKernelFQN),
                file_get_contents($file)
            ));
        }

        // fix references to cached files with the real cache directory name
        $search = array($warmupDir, str_replace('\\', '\\\\', $warmupDir));
        $replace = str_replace('\\', '/', $realCacheDir);
        foreach (Finder::create()->files()->in($warmupDir) as $file) {
            $content = str_replace($search, $replace, file_get_contents($file));
            file_put_contents($file, $content);
        }

        // fix references to kernel/container related classes
        $fileSearch = $tempKernel->getName().ucfirst($tempKernel->getEnvironment()).'*';
        $search = array(
            $tempKernel->getName().ucfirst($tempKernel->getEnvironment()),
            sprintf('\'kernel.name\' => \'%s\'', $tempKernel->getName()),
            sprintf('key="kernel.name">%s<', $tempKernel->getName()),
        );
        $replace = array(
            $realKernel->getName().ucfirst($realKernel->getEnvironment()),
            sprintf('\'kernel.name\' => \'%s\'', $realKernel->getName()),
            sprintf('key="kernel.name">%s<', $realKernel->getName()),
        );
        foreach (Finder::create()->files()->name($fileSearch)->in($warmupDir) as $file) {
            $content = str_replace($search, $replace, file_get_contents($file));
            file_put_contents(str_replace($search, $replace, $file), $content);
            unlink($file);
        }

        // remove temp kernel file after cache warmed up
        @unlink($tempKernelFile);
    }

    /**
     * @param KernelInterface $parent
     * @param string          $namespace
     * @param string          $parentClass
     * @param string          $warmupDir
     *
     * @return KernelInterface
     */
    protected function getTempKernel(KernelInterface $parent, $namespace, $parentClass, $warmupDir)
    {
        $cacheDir = var_export($warmupDir, true);
        $rootDir = var_export(realpath($parent->getRootDir()), true);
        $logDir = var_export(realpath($parent->getLogDir()), true);
        // the temp kernel class name must have the same length than the real one
        // to avoid the many problems in serialized resources files
        $class = substr($parentClass, 0, -1).'_';
        // the temp kernel name must be changed too
        $name = var_export(substr($parent->getName(), 0, -1).'_', true);
        $code = <<<EOF
<?php

namespace $namespace
{
    class $class extends $parentClass
    {
        public function getCacheDir()
        {
            return $cacheDir;
        }

        public function getName()
        {
            return $name;
        }

        public function getRootDir()
        {
            return $rootDir;
        }

        public function getLogDir()
        {
            return $logDir;
        }

        protected function buildContainer()
        {
            \$container = parent::buildContainer();

            // filter container's resources, removing reference to temp kernel file
            \$resources = \$container->getResources();
            \$filteredResources = array();
            foreach (\$resources as \$resource) {
                if ((string) \$resource !== __FILE__) {
                    \$filteredResources[] = \$resource;
                }
            }

            \$container->setResources(\$filteredResources);

            return \$container;
        }
    }
}
EOF;
        $this->get('filesystem')->mkdir($warmupDir);
        file_put_contents($file = $warmupDir.'/kernel.tmp', $code);
        require_once $file;
        $class = "$namespace\\$class";

        return new $class($parent->getEnvironment(), $parent->isDebug());
    }
}