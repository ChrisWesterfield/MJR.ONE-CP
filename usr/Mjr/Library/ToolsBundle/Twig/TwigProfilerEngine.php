<?php

namespace Mjr\Library\ToolsBundle\Twig;

use Mjr\Library\ToolsBundle\DataCollector\TwigDataCollector;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Twig_Environment;
use Twig_LoaderInterface;

/**
 * Class TwigProfilerEngine
 * Twig Profiler Engine
 * @package Mjr\Library\ToolsBundle\Twig
 * @author Chris Westerfield <chris@MJR.ONE>
 * @license Mozilla Public License 2.0 <https://www.mozilla.org/en-US/MPL/2.0/>
 * @copyright MJR.ONE Group
 * @link http://www.MJR.ONE
 */
class TwigProfilerEngine extends TwigEngine
{
    /**
     * @var Twig_Environment
     */
    protected $environment;
    /**
     * @var TwigEngine
     */
    protected $twigEngine;
    /**
     * @var TwigDataCollector
     */
    protected $collector;

    /**
     * TwigProfilerEngine constructor.
     * @param Twig_Environment $environment
     * @param TwigEngine $twigEngine
     * @param TwigDataCollector $collector
     */
    public function __construct(Twig_Environment $environment, TwigEngine $twigEngine, TwigDataCollector $collector)
    {
        $this->environment = $environment;
        $this->twigEngine  = $twigEngine;
        $this->collector   = $collector;
    }

    /**
     * {@inheritdoc}
     */
    public function render($name, array $parameters = array())
    {
        $templatePath = null;

        $loader = $this->environment->getLoader();

        if ($loader instanceof Twig_LoaderInterface) {
            $templatePath = $loader->getCacheKey($name);
        }
        $this->collector->collectTemplateData($name, $parameters, $templatePath);

        return $this->twigEngine->render($name, $parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function stream($name, array $parameters = array())
    {
        $this->twigEngine->stream($name, $parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function exists($name)
    {
        return $this->twigEngine->exists($name);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($name)
    {
        return $this->twigEngine->supports($name);
    }
}