<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class MailController {

        public function mailAction(Request $request, Application $app){
            $message = (new \Swift_Message('subject'))
                ->setSubject('subject')
                ->setFrom(array('tequilateam2017@gmail.com'))
                ->setTo(array('tequilateam2017@gmail.com'))
                ->setBody($request->get('message'));

            $app['mailer']->send($message);

            return new Response('Thank you for your message', 201);
        }

} // end of Class


