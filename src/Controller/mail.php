<?php

namespace Controller;

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.tequila.com', 25))
    ->setUsername('your username')
    ->setPassword('your password')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['tequila@gmail.com' => 'Tequila Team'])
    ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
    ->setBody('Hello, you will find next the link for changing your password')
;

// Send the message
$result = $mailer->send($message);