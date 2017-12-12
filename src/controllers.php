<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Controller\UserController;
//Request::setTrustedProxies(array('127.0.0.1'));

$app->match('/', 'Controller\UserController::registerAction')->bind('home');

$app->get('/report', function() use ($app) {
    $user=null;
    $token = $app['security.token_storage']->getToken();
    if (null!==$token){
        $user = $token->getUser();
    }   
    return $app['twig']->render('report.html.twig', array('user'=>$user));
})
->bind('report');

$app->get('/signin', "Controller\UserController::signInAction")->bind('signin');
$app->get('/report/sales', "Controller\ReportController::salesAction")->bind('sales');
$app->get('/report/stock', "Controller\ReportController::stockAction")->bind('stock');
$app->get('/report/category', "Controller\ReportController::categoryAction")->bind('category');
$app->get('/report/orders', "Controller\ReportController::ordersAction")->bind('orders');
$app->get('/report/prod_in_cat', "Controller\ReportController::prodAction")->bind('prod');
$app->get('/report/marketing', "Controller\ReportController::marketingAction")->bind('marketing');
$app->get('/team', "Controller\UserController::teamAction")->bind('team');

        
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage')
;

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
