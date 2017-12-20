<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Request::setTrustedProxies(array('127.0.0.1'));
//Routing for report page
$app->get('/report', function() use ($app) {
    $user = null;
    $token = $app['security.token_storage']->getToken();
    if (null !== $token) {
        $user = $token->getUser();
    }
    return $app['twig']->render('report.html.twig', array('user' => $user));
})
->bind('report');


//Routing for team page
$app->get('/team', function() use ($app) {
    return $app['twig']->render('team.html.twig', array());
})
->bind('team');


//Routing for signin
$app->get('/signin', function(Request $request)use ($app) {
    return $app['twig']->render('signIn.html.twig', [
        //recuperation de la derniere erreur de connection - session depuis la request
        'error' => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username')
            ]
    );
})->bind('signin');

//Routing for signup page
$app->match('/signup', "Controller\UserController::userSignupAction")->bind('signup');

/* $app->get('/signup', "Form\UserForm::buildForm")->bind('signup'); */

//Routing for sales page which is not in use at the moment
//$app->get('/report/sales', "Controller\SalesController::salesAction")->bind('sales');
//
//Routing for stock page
$app->get('/report/stock', "Controller\StockController::stockAction")->bind('stock');

//Routing for category page
$app->get('/report/category', "Controller\CategoryController::categoryAction")->bind('category');

//Routing for choose category page
$app->get('/report/choosecategory', "Controller\CategoryController::categorychooseAction")->bind('choosecategory');

//Routing for orders page
$app->get('/report/orders', "Controller\OrderController::orderAction")->bind('order');

//Routing for customer page
$app->get('/report/customer', "Controller\CustomerController::customerAction")->bind('customer');

//Routing for orderlines displayed as Sales in the report menu
$app->get('/report/orderlines', "Controller\OrderlineController::orderlinesAction")->bind('orderlines');

//Routing for products page
$app->get('/report/prod_in_cat', "Controller\ProductController::productAction")->bind('product');

//Routing for marketing page
$app->get('/report/marketing', "Controller\MarketingController::marketingAction")->bind('marketing');

//Routing for sending message contact page
$app->post('/team', "Controller\MailController::mailAction")->bind('mail');

//Routing for debug users
$app->get('/debugusers', "Controller\DebugController::debugusersAction")->bind('debugusers');

//Routing for debug countries
$app->get('/debugcountries', "Controller\DebugController::debugcountriesAction")->bind('debugcountries');

//Routing for debug categories
$app->get('/debugcategories', "Controller\DebugController::debugcategoriesAction")->bind('debugcategories');

//Routing for debug customers
$app->get('/debugcustomers', "Controller\DebugController::debugcustomersAction")->bind('debugcustomers');

//Routing for debug Products
$app->get('/debugproducts', "Controller\DebugController::debugproductsAction")->bind('debugproducts');

//Routing for Products CSV
$app->get('/productscsv', "Controller\ProductController::productscsvAction")->bind('productscsv');

//Routing for Categories CSV
$app->get('/categorycsv', "Controller\CategoryController::categorycsvAction")->bind('categorycsv');

//Routing for Stock CSV
$app->get('/stockcsv', "Controller\StockController::stockcsvAction")->bind('stockcsv');

//Routing for orders CSV
$app->get('/report/orderscsv', "Controller\OrderController::ordercsvAction")->bind('ordercsv');

//Routing for orderlines CSV
$app->get('orderlinescsv', "Controller\OrderlineController::orderlinescsvAction")->bind('orderlinescsv');

//Routing for debug Products JSON
$app->get('/debugproductsjson', "Controller\DebugController::debugproductsjsonAction")->bind('debugproductsjson');

//Routing for debug Stock
$app->get('/debugstock', "Controller\DebugController::debugstockAction")->bind('debugstock');

//Routing for debug Marketing
$app->get('/debugmarketing', "Controller\DebugController::debugMarketingAction")->bind('debugmarketing');

//Routing for debug Orders
$app->get('/debugorders', "Controller\DebugController::debugordersAction")->bind('debugorders');

//Routing for debug Orderlines
$app->get('/debugorderlines', "Controller\DebugController::debugorderlinessAction")->bind('debugorderlines');


//Routing for homepage
$app->get('/', function () use ($app) {
            return $app['twig']->render('home.html.twig', array());
})
->bind('home');

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }
    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/' . $code . '.html.twig',
        'errors/' . substr($code, 0, 2) . 'x.html.twig',
        'errors/' . substr($code, 0, 1) . 'xx.html.twig',
        'errors/default.html.twig',
    );
    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
