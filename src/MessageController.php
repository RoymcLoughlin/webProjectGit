<?php
/**
 * namespace Itb
 */
namespace Itb;

//use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MessageController
 * @package Itb
 */

class MessageController
{
    /**
     * function submit action
     * @param Request $request
     * @param Application $app
     * @return mixed
     */


    public function submitAction(Request $request, Application $app){

        // if we need 'get' parameters, get them from '$request->query'
        // $paramsGet = $request->query->all();

        // we retrieve 'post' values from $request->request
        $paramsPost = $request->request->all();
        $messageRaw = $paramsPost ['message'];

        // now sanitise with filter_var()
        $message = filter_var($messageRaw, FILTER_SANITIZE_STRING);

        // value will be empty string or null if not valid/missing

        $argsArray = array(

            'message' => $message

        );

        $templateName = 'confirmMessage';

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

}