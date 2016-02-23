<?php
/**
 * getting all required data from the Master Config of the Framework
 * This includes the current Environment, (xxx/config.yml), parameters.yml and the master dev config file config_dev.yml
 * also an cookie is set to remember the current environment so it is not needed to transport the current environment using an url attachment
 */
$_xhprof = array();
$rootdirectory = realpath( dirname(__FILE__).'/../../../../../../../../../../');
require_once($rootdirectory.'/var/vendor/autoload.php');
if(empty($db))
{
    $db = 'WebService';
}
$filePath = $rootdirectory.'/config/parameter.yml';
if(!file_exists($filePath))
{
    $filePath = $rootdirectory.'/config/parameters.yml';
    $systemConfigPath = $rootdirectory.'/config/dev/config.yml';
}
else
{
    $systemConfigPath = $rootdirectory.'/config/config.yml';
}
$reader = new Symfony\Component\Yaml\Parser();
$systemConfig = $reader->parse(file_get_contents($systemConfigPath));
if(!isset($systemConfig['mjr_library_profiler']) || !isset($systemConfig['mjr_library_profiler']['enabled']) || $systemConfig['mjr_library_profiler']['enabled']===false)
{
    throw new Exception('Profiling has been disabled!');
}
$systemDb = $reader->parse(file_get_contents($filePath));
$masterDev = $reader->parse(file_get_contents($rootdirectory.'/config/dev/config.yml'));
$dbDriver = $systemDb['parameters']['database_driver'];
$dbDriver = explode('_',$dbDriver);
// Change these:
$dbDriver = $systemDb['parameters']['database_driver'];
$dbDriver = explode('_',$dbDriver);
$_xhprof['dbtype'] = $dbDriver[1]; // Only relevant for PDO
$_xhprof['dbhost'] = $systemDb['parameters']['database_host'];
$_xhprof['dbuser'] = $systemDb['parameters']['database_user'];
$_xhprof['dbpass'] = $systemDb['parameters']['database_password'];
$_xhprof['dbname'] = $systemDb['parameters']['database_name'];
$_xhprof['dbadapter'] = ucfirst($dbDriver[0]);
$_xhprof['servername'] = 'Symfony Database Server';
$_xhprof['namespace'] = 'Symfony';
$_xhprof['url'] = $masterDev['mjr_library_profiler']['location_web'];
/*
 * MySQL/MySQLi/PDO ONLY
 * Switch to JSON for better performance and support for larger profiler data sets.
 * WARNING: Will break with existing profile data, you will need to TRUNCATE the profile data table.
 */
$_xhprof['serializer'] = $masterDev['mjr_library_profiler']['storage'];

//Uncomment one of these, platform dependent. You may need to tune for your specific environment, but they're worth a try

//These are good for Windows
/*
$_xhprof['dot_binary']  = 'C:\\Programme\\Graphviz\\bin\\dot.exe';
$_xhprof['dot_tempdir'] = 'C:\\WINDOWS\\Temp';
$_xhprof['dot_errfile'] = 'C:\\WINDOWS\\Temp\\xh_dot.err';
*/

//These are good for linux and its derivatives.
$_xhprof['dot_binary']  = '/usr/bin/dot';
$_xhprof['dot_tempdir'] = ini_get('upload_tmp_dir');
$_xhprof['dot_errfile'] = $_xhprof['dot_tempdir'].'/xh_dot.err';

$ignoreURLs = array();

$ignoreDomains = array();

$exceptionURLs = array();

$exceptionPostURLs = array();
$exceptionPostURLs[] = "login";


$_xhprof['display'] = false;
$_xhprof['doprofile'] = false;


//$otherURLS = array();

// ignore builtin functions and call_user_func* during profiling
//$ignoredFunctions = array('call_user_func', 'call_user_func_array', 'socket_select');

//Default weight - can be overidden by an Apache environment variable 'xhprof_weight' for domain-specific values
$weight = 100;

if($domain_weight = getenv('xhprof_weight')) {
    $weight = $domain_weight;
}

unset($domain_weight);

/**
 * The goal of this function is to accept the URL for a resource, and return a "simplified" version
 * thereof. Similar URLs should become identical. Consider:
 * http://example.org/stories.php?id=2323
 * http://example.org/stories.php?id=2324
 * Under most setups these two URLs, while unique, will have an identical execution path, thus it's
 * worthwhile to consider them as identical. The script will store both the original URL and the
 * Simplified URL for display and comparison purposes. A good simplified URL would be:
 * http://example.org/stories.php?id=
 *
 * @param string $url The URL to be simplified
 * @return string The simplified URL
 */
function _urlSimilartor($url)
{
    //This is an example
    $url = preg_replace("!\d{4}!", "", $url);

    // For domain-specific configuration, you can use Apache setEnv xhprof_urlSimilartor_include [some_php_file]
    if($similartorinclude = getenv('xhprof_urlSimilartor_include')) {
        require_once($similartorinclude);
    }

    $url = preg_replace("![?&]_profile=\d!", "", $url);
    return $url;
}

function _aggregateCalls($calls, $rules = null)
{
    $rules = array(
        'Loading' => 'load::',
        'mysql' => 'mysql_'
    );

    // For domain-specific configuration, you can use Apache setEnv xhprof_aggregateCalls_include [some_php_file]
    if(isset($run_details['aggregateCalls_include']) && strlen($run_details['aggregateCalls_include']) > 1)
    {
        require_once($run_details['aggregateCalls_include']);
    }

    $addIns = array();
    foreach($calls as $index => $call)
    {
        foreach($rules as $rule => $search)
        {
            if (strpos($call['fn'], $search) !== false)
            {
                if (isset($addIns[$search]))
                {
                    unset($call['fn']);
                    foreach($call as $k => $v)
                    {
                        $addIns[$search][$k] += $v;
                    }
                }else
                {
                    $call['fn'] = $rule;
                    $addIns[$search] = $call;
                }
                unset($calls[$index]);  //Remove it from the listing
                break;  //We don't need to run any more rules on this
            }else
            {
                //echo "nomatch for $search in {$call['fn']}<br />\n";
            }
        }
    }
    return array_merge($addIns, $calls);
}