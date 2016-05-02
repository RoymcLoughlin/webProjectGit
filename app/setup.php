<?php
//----- used to autoload any class we use ---------

require_once __DIR__ . '/../vendor/autoload.php';

//----- autoload any classes that we are using ------

require_once __DIR__ . '/config_db.php';

// my settings
// ------------

$myTemplatesPath = __DIR__ . '/../templates';
//$loader = new Twig_Loader_Filesystem($templatesPath);
//$twig = new Twig_Environment($loader);

// setup Silex
// ------------
$app = new Silex\Application();

// register Twig together with Silex
// ------------
$app->register(new Silex\Provider\TwigServiceProvider(), array(

    'twig.path' => $myTemplatesPath
));


//----- autoload any classes we are using -----------

require_once __DIR__ . '/setup_monolog.php';

//------ providers ---- to setup Web Profiler Debug Toolbar --------

use Silex\Provider;

$app->register(new Provider\HttpFragmentServiceProvider());
$app->register(new Provider\ServiceControllerServiceProvider());

// (we have registered Twig)

// --- do this LAST - after other Silex service providers ----

//$app->register(new Provider\WebProfilerServiceProvider(), array(

  //  'profiler.cache_dir' => __DIR__.'/../cache/profiler',
    //'profiler.mount_prefix' => '/_profiler', // this is the default
    //'profiler.mount_prefix' => '/_profiler', // this is the default
//
//));
//use Monolog\Logger;
//use Monolog\Handler\StreamHandler;

//$log = new Logger('roy');
//$log->pushHandler(new StreamHandler('/Users/matt/Desktop/evote-dvd/zz_in_development_should_be_in_a_branch/eVote_dvd_version14_database/logs/log.txt', Logger::DEBUG));
//$log->pushHandler(new StreamHandler('/logs/logs.txt', Logger::DEBUG));

