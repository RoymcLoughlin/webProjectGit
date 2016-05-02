<!--Css-->

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

<!--Scripts -->

<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

<!--Start of php -->

<?php
/**
 *
 */
require_once __DIR__ . '/../app/setup.php';
require_once __DIR__ . '/../vendor/autoload.php'; //

$templatesPath =  __DIR__ . '/../templates'; //
/**
 * app is for the silex to run
 */
$app->register(new Silex\Provider\TwigServiceProvider(), [

        'twig.path' => $templatesPath
    ]
);

/**
 * Itb Main Controller
 */
use Itb\MainController;

$mainController = new MainController();

// get action GET parameter (if it exists)
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

// get ID from request
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Static controller method.
$app->get('/',      \Itb\Utility::controller('Itb', 'main/index'));
$app->get('/about', \Itb\Utility::controller('Itb', 'main/about'));
$app->get('/classes', \Itb\Utility::controller('Itb', 'main/classes'));
$app->get('/trainers', \Itb\Utility::controller('Itb', 'main/trainers'));
$app->get('/login', \Itb\Utility::controller('Itb', 'main/login'));
$app->get('/contact', \Itb\Utility::controller('Itb', 'main/contact'));
$app->get('/admin', \Itb\Utility::controller('Itb', 'main/admin'));
$app->get('/detail/{id}', \Itb\Utility::controller('Itb', 'main/detail'));

// 404 - Page not found
$app->error(function ($message) use ($app) {

    $mainController = new Itb\MainController();
    return $mainController->error404($app, $message);
});

// run Silex front controller
// ------------
$app['debug']= true;
$app->run();
