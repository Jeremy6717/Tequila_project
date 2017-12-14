<?php

namespace Controller;

use Mailgun\Mailgun;


require 'vendor/autoload.php';


class mail
{
    public function mail(){
    # First, instantiate the SDK with your API credentials
    $mg = Mailgun::create('key-3b03f8e801d51eb032cc72b57beec382');

    # Now, compose and send your message.
    # $mg->messages()->send($domain, $params);
    $mg->messages()->send('sandboxacff6eb40fd84da496b7999cb2cb3102.mailgun.org', [
        'from'    => 'tequila-report@gmail.com',
        'to'      => 'jeremydeumer@gmail.com',
        'subject' => 'Recovery password',
        'text'    => 'Click on the link under for defining a new password']);
    }
}
