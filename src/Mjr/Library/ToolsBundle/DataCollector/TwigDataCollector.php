<?php

/*
 *
 * (c) Vincent Bouzeran <vincent.bouzeran@elao.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mjr\Library\ToolsBundle\DataCollector;

use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\Container;

/**
 * AsseticDataCollector.
 *
 * @author Vincent Bouzeran <vincent.bouzeran@elao.com>
 */
class TwigDataCollector extends DataCollector
{
    private $container;

    /**
     * The Constructor for the Twig Datacollector
     *
     * @param Container $container    The service container
     * @param boolean   $displayInWdt True if the shortcut should be displayed
     */
    public function __construct(Container $container , $displayInWdt)
    {
        $this->container = $container;
        $this->data[ 'display_in_wdt' ] = $displayInWdt;
    }

    /**
     * Collect information from Twig
     *
     * @param Request    $request   The Request Object
     * @param Response   $response  The Response Object
     * @param \Exception $exception The Exception
     */
    public function collect(Request $request , Response $response , \Exception $exception = null)
    {
        $filters = array();
        $tests = array();
        $extensions = array();
        $functions = array();

        foreach ($this->getTwig()
                      ->getExtensions() as $extensionName => $extension)
        {
            $extensions[] = array
            (
                'name'  => $extensionName ,
                'class' => get_class($extension),
            );
            foreach ($extension->getFilters() as $filterName => $filter)
            {
                if ($filter instanceof \Twig_FilterInterface)
                {
                    $call = $filter->compile();
                    if (is_array($call) && is_callable($call))
                    {
                        $call = 'Method ' . $call[ 1 ] . ' of an object ' . get_class($call[ 0 ]);
                    }
                }
                else
                {
                    $call = $filter->getName();
                }

                $filters[] = array
                (
                    'name'      => $filterName ,
                    'extension' => $extensionName ,
                    'call'      => $call ,
                );
            }

            foreach ($extension->getTests() as $testName => $test)
            {
                if ($test instanceof \Twig_TestInterface)
                {
                    $call = $test->compile();
                }
                else
                {
                    $call = $test->getName();
                }

                $tests[] = array(
                    'name'      => $testName ,
                    'extension' => $extensionName ,
                    'call'      => $call ,
                );
            }

            foreach ($extension->getFunctions() as $functionName => $function)
            {
                if ($function instanceof \Twig_FunctionInterface)
                {
                    $call = $function->compile();
                }
                else
                {
                    $call = $function->getName();
                }

                $functions[] = array(
                    'name'      => $functionName ,
                    'extension' => $extensionName ,
                    'call'      => $call ,
                );
            }
        }

        $globals = array();

        foreach ($this->getTwig()
                      ->getGlobals() as $globalName => $global)
        {
            $globals[] = array(
                'name'  => $globalName ,
                'value' => $this->getVarDump($global) ,
            );
        }

        $this->data[ 'globals' ] = $globals;
        $this->data[ 'extensions' ] = $extensions;
        $this->data[ 'tests' ] = $tests;
        $this->data[ 'filters' ] = $filters;
        $this->data[ 'functions' ] = $functions;
    }

    /**
     * Get Twig Environment
     *
     * @return \Twig_Environment
     */
    protected function getTwig()
    {
        return $this->container->get('twig');
    }

    /**
     * Collects data on the twig templates rendered
     *
     * @param mixed $templateName The template name
     * @param array $parameters   The array of parameters passed to the template
     * @param array $templatePath The template path
     */
    public function collectTemplateData($templateName , $parameters , $templatePath = null)
    {
        $collectedParameters = array();
        foreach ($parameters as $name => $value)
        {
            $collectedParameters[ $name ] = array(
                'type'  => in_array(gettype($value) , array( 'object' , 'resource' ))
                    ? get_class($value)
                    : gettype($value) ,
                'value' => in_array(gettype($value) , array( 'object' , 'resource' , 'array' ))
                    ? null
                    : $value ,
            );
        }

        $this->data[ 'templates' ][] = array(
            'name'       => $templateName ,
            'path'       => $templatePath ,
            'parameters' => $collectedParameters,
        );
    }

    /**
     * Returns the amount of Templates
     *
     * @return int Amount of templates
     */
    public function getCountTemplates()
    {
        return count($this->getTemplates());
    }

    /**
     * Returns the Twig templates information
     *
     * @return array Template information
     */
    public function getTemplates()
    {
        return isset( $this->data[ 'templates' ] )
            ? $this->data[ 'templates' ]
            : array();
    }

    /**
     * Returns the amount of Extensions
     *
     * @return integer Amount of Extensions
     */
    public function getCountExtensions()
    {
        return count($this->getExtensions());
    }

    /**
     * Returns the Twig Globals Information
     *
     * @return array Globals Information
     */
    public function getGlobals()
    {
        return $this->data[ 'globals' ];
    }

    /**
     * Returns the Twig Extensions Information
     *
     * @return array Extension Information
     */
    public function getExtensions()
    {
        return $this->data[ 'extensions' ];
    }

    /**
     * Returns the amount of Filters
     *
     * @return integer Amount of Filters
     */
    public function getCountFilters()
    {
        return count($this->getFilters());
    }

    /**
     * Returns the Filter Information
     *
     * @return array Filter Information
     */
    public function getFilters()
    {
        return $this->data[ 'filters' ];
    }

    /**
     * Returns the amount of Twig Tests
     *
     * @return integer Amount of Tests
     */
    public function getCountTests()
    {
        return count($this->getTests());
    }

    /**
     * Returns the Tests Information
     *
     * @return array Tests Information
     */
    public function getTests()
    {
        return $this->data[ 'tests' ];
    }

    /**
     * Returns the amount of Twig Functions
     *
     * @return integer Amount of Functions
     */
    public function getCountFunctions()
    {
        return count($this->getFunctions());
    }

    /**
     * Returns Twig Functions Information
     *
     * @return array Function Information
     */
    public function getFunctions()
    {
        return $this->data[ 'functions' ];
    }

    public function getDisplayInWdt()
    {
        return $this->data[ 'display_in_wdt' ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'library_twig';
    }

    /**
     * Returns var_dump like of a variable but avoiding flood dumping
     *
     * @return string Formated var_dump
     */
    protected function getVarDump($var)
    {
        $varType = gettype($var);
        switch ($varType)
        {
            case 'boolean':
            case 'integer':
            case 'double':
            case 'NULL':
            case 'ressource':
                return print_r($var , 1);
            case 'string':
                return ( 250 < strlen($var) )
                    ? substr($var , 0 , 250) . '...'
                    : $var;
            case 'object':
                return 'Object instance of ' . get_class($var);
            case 'array':
                $formated_array = array();

                foreach ($var as $key => $value)
                {
                    $formated_array[ $key ] = $this->getVarDump($value);
                }

                return print_r($formated_array , 1);
        }
    }
}