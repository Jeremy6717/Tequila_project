<?php

namespace Controller;

use Symfony\Component\HttpFoundation\Request;

require_once '../vendor/autoload.php';


class MailController {
//    // Create the Transport
//    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 25))
//        ->setUsername('tequilateam2017')
//        ->setPassword(file_get_contents('pwd.txt');)
//    ;
//
//    // Create the Mailer using your created Transport
//    $mailer = new Swift_Mailer($transport);
//
//    $replacements = [];
//    foreach ($users as $user) {
//        $replacements[$user['email']] = [
//            '{username}'=>$user['username'],
//            //'{resetcode}'=>$user['resetcode']
//        ];
//    }
//
//
//    // Create the message for recovery password
//    $message = (new Swift_Message())
//        ->setFrom(['tequilateam2017@gmail.com' => 'Tequila team'])
//        ->setTo(['{email}' => 'Monsieur X'])
//        // Give the message a subject
//        ->setSubject('Recovery password for {username}')
//        ->setBody(
//            "Hello {username}, you requested to reset your password.\n" .
//            "Please visit https://tequila.com/pwreset and use the reset code {resetcode} to set a new
//    password."
//        )
//    ;
//    foreach ($users as $user) {
//        $message->addTo($user['email'])
//
//    // Optionally add any attachments
//        ->attach(Swift_Attachment::fromPath(''));
//
//    // Send the message
//    $result = $mailer->send($message);


//        public function mailAction(Request $request)
//        use ($app) {
//            $message = \Swift_Message::newInstance()
//                ->setSubject('subject')
//                ->setFrom(array('name','email'))
//                ->setTo(array('tequilateam2017@gmail.com'))
//                ->setBody($request->match('message'));
//
//            $app['mailer']->send($message);
//

//        // Send the message
//        $result = $mailer->send($message);
//
//        echo 'Message has been sent';
//        } catch (Exception $e) {
//            echo 'Message could not be sent.';
//            echo 'Mailer Error: ' . $mail->ErrorInfo;
//        }
//






        public function mailAction(Request $request, Application $app){
            $message = \Swift_Message::newInstance()
                ->setSubject('subject')
                ->setFrom(array('name','email'))
                ->setTo(array('tequilateam2017@gmail.com'))
                ->setBody($request->match('message'));

            $app['mailer']->send($message);

            return new Response('Thank you for your message', 201);
        }

} // end of Class


