<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Controller\UserController;

//Request::setTrustedProxies(array('127.0.0.1'));




//Routing for report page
$app->get('/report', function() use ($app) {
    $user=null;
    $token = $app['security.token_storage']->getToken();
    if (null!==$token){
        $user = $token->getUser();
    }
    return $app['twig']->render('report.html.twig', array('user'=>$user));
})
->bind('report');


//Routing for team page
$app->get('/team', function() use ($app) {
    $user=null;
    return $app['twig']->render('team.html.twig', array('user'=>$user));
})
    ->bind('team');


//routing for signin
$app->get('/signin', function(Request $request)use ($app){
    return $app['twig']->render('signIn.html.twig',
        [
            //recuperation de la derniere erreur de connection - session depuis la request
            'error'=>$app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username')
        ]
    );
})->bind('signin');

//routing for signup page
$app->get('/signup', "Controller\UserController::userSignupAction")->bind('signup');
//routing for sales page
$app->get('/report/sales', "Controller\SalesController::salesAction")->bind('sales');
//routing for stock page
$app->get('/report/stock', "Controller\ReportController::stockAction")->bind('stock');
//routing for category page
$app->get('/report/category', "Controller\CategoryController::categoryAction")->bind('category');
//routing for orders page
$app->get('/report/orders', "Controller\ReportController::ordersAction")->bind('orders');
//routing for prod page
$app->get('/report/prod_in_cat', "Controller\ReportController::prodAction")->bind('prod');
//routing for marketing page
$app->get('/report/marketing', "Controller\ReportController::marketingAction")->bind('marketing');


//routing for debug users
$app->get('/debugusers', "Controller\DebugController::debugusersAction")->bind('debugusers');

//routing for debug countries
$app->get('/debugcountries', "Controller\DebugController::debugcountriesAction")->bind('debugcountries');

//routing for debug categories
$app->get('/debugcategories', "Controller\DebugController::debugcategoriesAction")->bind('debugcategories');

//Routing for homepage
$app->get('/', function () use ($app) {
    return $app['twig']->render('home.html.twig', array());
})
->bind('home')
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
