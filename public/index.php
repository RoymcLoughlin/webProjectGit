<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
<!---//calender-style---->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />-->
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
        });
    });
</script>
<!-- grid-slider -->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

<?php
require_once __DIR__ . '/../app/setup.php';
require_once __DIR__ . '/../vendor/autoload.php'; //

$templatesPath =  __DIR__ . '/../templates'; //

$app->register(new Silex\Provider\TwigServiceProvider(), [

        'twig.path' => $templatesPath
    ]
);

//require_once __DIR__ . '/../app/config_db.php';

use Itb\MainController;

//define('DB_HOST', 'localhost');
//define('DB_USER', 'root');
//define('DB_PASS', '');
//define('DB_NAME', 'itb');

$mainController = new MainController();

// get action GET parameter (if it exists)
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

// get ID from request
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// use our static controller() method...
$app->get('/',      \Itb\Utility::controller('Itb', 'main/index'));
$app->get('/about', \Itb\Utility::controller('Itb', 'main/about'));
$app->get('/classes', \Itb\Utility::controller('Itb', 'main/classes'));
$app->get('/trainers', \Itb\Utility::controller('Itb', 'main/trainers'));
$app->get('/login', \Itb\Utility::controller('Itb', 'main/login'));
$app->get('/contact', \Itb\Utility::controller('Itb', 'main/contact'));


//$app->get('/login', \Itb\Utility::controller('Itb', 'main/login'));
//$app->get('/login', \Itb\Utility::controller('Itb', 'main/login'));
$app->get('/detail/{id}', \Itb\Utility::controller('Itb', 'main/detail'));

$app->post('/processIndexMessageForm', \Itb\Utility::controller('Itb', 'message/submit'));

// 404 - Page not found
$app->error(function (\Exception $e, $message) use ($app) {

//    dump($code);
//    switch ($code) {

//        case 404:
//            $message = 'The requested page could not be found.';
         $mainController = new Itb\MainController();
            return $mainController->error404($app, $message);

//        default:
//            $message = 'We are sorry, but something went terribly wrong.'
//                . '<p>' . $e->getMessage();
//            return \Itb\MainController::error404($app, $message);
//    }
});


// --------- DEV ZONE ----------
// ------ list all routes ----------
$app->get('/listRoutes', function() use ($app) {

    print '<h1>List all routes</h1>';
    print '<pre>';
    foreach ($app['routes'] as $pattern) {
        /**
         * @var \Silex\Route $pattern
         */
        print $pattern->getPath();
        print '<br>';
    }

    return '';
});


// run Silex front controller
// ------------
$app['debug']= true;
$app->run();
