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


//routing for signin
$app->get('/signin', function(Request $request)use ($app) {
    return $app['twig']->render('signIn.html.twig', [
                //recuperation de la derniere erreur de connection - session depuis la request
                'error' => $app['security.last_error']($request),
                'last_username' => $app['session']->get('_security.last_username')
                    ]
    );
})->bind('signin');

//routing for signup page

$app->match('/signup', "Controller\UserController::userSignupAction")->bind('signup');


/* $app->get('/signup', "Form\UserForm::buildForm")->bind('signup'); */

//routing for sales page which is not in use at the moment
//$app->get('/report/sales', "Controller\SalesController::salesAction")->bind('sales');

//routing for stock page
$app->get('/report/stock', "Controller\StockController::stockAction")->bind('stock');
//routing for category page
$app->get('/report/category', "Controller\CategoryController::categoryAction")->bind('category');
//routing for choose category page
$app->get('/report/choosecategory', "Controller\CategoryController::categorychooseAction")->bind('choosecategory');
//routing for orders page
$app->get('/report/orders', "Controller\OrderController::orderAction")->bind('order');

//routing for orderlines displayed as Sales in the report menu
$app->get('/report/orderlines', "Controller\OrderlineController::orderlinesAction")->bind('orderlines');
//routing for products page
$app->get('/report/prod_in_cat', "Controller\ProductController::productAction")->bind('product');
//routing for marketing page

$app->get('/report/marketing', "Controller\MarketingController::marketingAction")->bind('marketing'); 

//routing for sending message contact page
$app->post('/team', "Controller\MailController::mailAction")->bind('mail');


//routing for debug users
$app->get('/debugusers', "Controller\DebugController::debugusersAction")->bind('debugusers');

//routing for debug countries
$app->get('/debugcountries', "Controller\DebugController::debugcountriesAction")->bind('debugcountries');

//routing for debug categories
$app->get('/debugcategories', "Controller\DebugController::debugcategoriesAction")->bind('debugcategories');


//routing for debug customers
$app->get('/debugcustomers', "Controller\DebugController::debugcustomersAction")->bind('debugcustomers');

//routing for debug Products
$app->get('/debugproducts', "Controller\DebugController::debugproductsAction")->bind('debugproducts');

//routing for Products CSV
$app->get('/productscsv', "Controller\ProductController::productscsvAction")->bind('productscsv');

//routing for Categories CSV
$app->get('/categorycsv', "Controller\CategoryController::categorycsvAction")->bind('categorycsv');

//routing for Stock CSV
$app->get('/stockcsv', "Controller\StockController::stockcsvAction")->bind('stockcsv');

//routing for orders CSV
$app->get('/report/orderscsv', "Controller\OrderController::ordercsvAction")->bind('ordercsv');

//routing for orderlines CSV
$app->get('orderlinescsv', "Controller\OrderlineController::orderlinescsvAction")->bind('orderlinescsv');

//routing for debug Products JSON
$app->get('/debugproductsjson', "Controller\DebugController::debugproductsjsonAction")->bind('debugproductsjson');


//routing for debug Stock
$app->get('/debugstock', "Controller\DebugController::debugstockAction")->bind('debugstock');

//routing for debug Marketing
$app->get('/debugmarketing', "Controller\DebugController::debugMarketingAction")->bind('debugmarketing');

//routing for debug Orders
$app->get('/debugorders', "Controller\DebugController::debugordersAction")->bind('debugorders');

//routing for debug Orderlines
$app->get('/debugorderlines', "Controller\DebugController::debugorderlinessAction")->bind('debugorderlines');



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
        'errors/' . $code . '.html.twig',
        'errors/' . substr($code, 0, 2) . 'x.html.twig',
        'errors/' . substr($code, 0, 1) . 'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
