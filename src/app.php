<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());

// add variable globale : users
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    
    $user = null;
    
    $token = $app['security.token_storage']->getToken();
    if ($token) {
        $user = $token->getUser();
    }
    $twig->addGlobal('user', $user);
    return $twig;
});

return $app;
