<?php
namespace Itb;

use Itb\Martial;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController
{

    public function indexAction(Request $request, Application $app){

        $martialRepository = new Martial();
        $martial = martial::getAll();

        $argsArray = [

            'id' => $martial
        ];
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', []);
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

        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', []);
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