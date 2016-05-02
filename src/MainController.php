<?php

/**
 * namespace Itb
 */
namespace Itb;

/**
 * use Itb martial repository
 * use Silex application
 * use Symfonys component request from HttpFoundation
 */
use Itb\MartialRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MainController
 * @package Itb
 */
class MainController
{

    /**
     * function index action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
   public function indexAction(Request $request, Application $app)
   {
       //    public function indexAction(\Twig_Environment $twig){

//        $martialRepository = new Martial();
        $martialRepository = new MartialRepository();
//        $martial = martial::getAll();
       $martial = $martialRepository->getAll();
//
//        $argsArray = [
        $argsArray = [
            'martial' => $martial,
        ];
//
//            'martialartsclass' => $martial
//        ];
        $templateName = 'index';
//        $htmlOutput = $twig->render($templateName . '.html.twig', $argsArray);
//        print $htmlOutput;
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
   }

    /**
     * admin Action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */

   public function adminAction(Request $request, Application $app)
   {
       $martialRepository = new MartialRepository();
       $martial = $martialRepository->getAll();

       $argsArray = [

            'martial' => $martial,
        ];

       $templateName = 'admin';

       return $app['twig']->render($templateName . '.html.twig', $argsArray);
   }

    /**
     * contract Action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function contactAction(Request $request, Application $app)
    {
        $templateName = 'contact';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    /**
     * about action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function aboutAction(Request $request, Application $app)
    {
        $templateName = 'about';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    /**
     * classes Action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */

    public function classesAction(Request $request, Application $app)
    {
        $templateName = 'classes';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    /**
     * trainers Action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */

    public function trainersAction(Request $request, Application $app)
    {
        $templateName = 'trainers';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    /**
     * login Action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */

    public function loginAction(Request $request, Application $app)
    {
        $martialRepository = new MartialRepository();
        $martial = $martialRepository->getAll();

        $argsArray = [
            'martial' => $martial,
        ];

        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * Sign in Action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */

    //log in controller
//    public function SignInAction(Request $request, Application $app)
//    {
//
//        $em=$this->getDoctrine()->getManager();
//        $repository =$em->getRepository('LoginUser:User');
//
//        if($request->getMethod()=='POST')
//        {
//            $email=$request->get('email');
//            $password=$request->get('password');
//
//            $user=$repository->findOneBy(array('email'=>$email,'password'=>$password));
//
//            if ($email == 'fred'){
//                return $app['twig']->render('index' . '.html.twig', []);
//            } //if user has values
//
//                return $this->render('DWMUserBundle:Default:home.html.twig', array('user' => $user));
//
//            else//if login is incorrect
//                return $this->render('DWMUserBundle:Default:signin.html.twig');
//        }

//
//        return $this->render('DWMUserBundle:Default:signin.html.twig');
//
//    }


    /**
     * contact This Action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */

    public function contactThisAction(Request $request, Application $app)
    {
        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

   /* public function sitemapAction(Request $request, Application $app){

        $templateName = 'sitemap';
        return $app['twig']->render($templateName . '.html.twig', []);
    }*/

    /**
     * list action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function listAction(Request $request, Application $app)
    {
        $martialRepository = new MartialRepository();
     //   $martial = $MartialRepository->getAll();//not sure if needed, implement for the moment

        $argsArray = [

        //    'martial' => $martial,

        ];

        $template = 'list';

        return $app['twig']->render($template . '.html.twig', $argsArray);
    }

    /**
     * detail Action
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function detailAction(Request $request, Application $app, $id)
    {
        $martialRepository = new martial();
        $martial = $martialRepository->getOneById($id);

        $argsArray = [

            '' => $martial,

        ];

        $template = 'detail';

        return $app['twig']->render($template . '.html.twig', $argsArray);
    }


    /**
     * error 404 page
     * @param Application $app
     * @param $message
     * @return mixed
     */
    public static function error404(Application $app, $message)
    {
        $argsArray = [

            'name' => 'Fabien',

        ];

        $templateName = '404';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}
