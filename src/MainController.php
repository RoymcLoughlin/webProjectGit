<?php
namespace Itb;

use Itb\MartialRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController
{

   public function indexAction(Request $request, Application $app){
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
   public function adminAction(Request $request, Application $app){

      $martialRepository = new MartialRepository();
       $martial = $martialRepository->getAll();

        $argsArray = [

            'martial' => $martial,
        ];

        $templateName = 'admin';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function contactAction(Request $request, Application $app){

        $templateName = 'contact';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    public function aboutAction(Request $request, Application $app){

        $templateName = 'about';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    public function classesAction(Request $request, Application $app){

        $templateName = 'classes';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    public function trainersAction(Request $request, Application $app){

        $templateName = 'trainers';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    public function loginAction(Request $request, Application $app){

        $martialRepository = new MartialRepository();
        $martial = $martialRepository->getAll();

        $argsArray = [
            'martial' => $martial,
        ];

        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);

    }

    //log in controller
    public function SignInAction(Request $request, Application $app)
    {

        $em=$this->getDoctrine()->getManager();
        $repository =$em->getRepository('LoginUser:User');

        if($request->getMethod()=='POST')
        {
            $email=$request->get('email');
            $password=$request->get('password');

            $user=$repository->findOneBy(array('email'=>$email,'password'=>$password));

            if ($email == 'fred'){
                return $app['twig']->render('index' . '.html.twig', []);
            } //if user has values

//                return $this->render('DWMUserBundle:Default:home.html.twig', array('user' => $user));

            else//if login is incorrect
                return $this->render('DWMUserBundle:Default:signin.html.twig');
        }


        return $this->render('DWMUserBundle:Default:signin.html.twig');

    }


    public function contactThisAction(Request $request, Application $app){

        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

   /* public function sitemapAction(Request $request, Application $app){

        $templateName = 'sitemap';
        return $app['twig']->render($templateName . '.html.twig', []);
    }*/

    public function listAction(Request $request, Application $app){

        $martialRepository = new MartialRepository();
     //   $martial = $MartialRepository->getAll();//not sure if needed, implement for the moment

        $argsArray = [

        //    'martial' => $martial,

        ];

        $template = 'list';

        return $app['twig']->render($template . '.html.twig', $argsArray);
    }

    public function detailAction(Request $request, Application $app, $id){

        $martialRepository = new martial();
        $martial = $martialRepository->getOneById($id);

        $argsArray = [

            '' => $martial,

        ];

        $template = 'detail';

        return $app['twig']->render($template . '.html.twig', $argsArray);
    }

    /**
     * not found error page
     * @param \Silex\Application $app
     * @param             $message
     *
     * @return mixed
     */
    public static function error404(Application $app, $message){

        $argsArray = [

            'name' => 'Fabien',

        ];

        $templateName = '404';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}