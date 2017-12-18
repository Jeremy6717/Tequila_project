<?php

namespace Controller;

use \Symfony\Component\HttpFoundation\Request;
use \Silex\Application;
use \Models\Category;
use \Models\Country;
use \Models\Customer;
use \Models\Orderline;
use \Models\Orders;
use \Models\Product;
use \Models\UserModel;

class MarketingController {
      
   public function marketingAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Customer::class);
        $customers = $repository->findAll();
        
        /*
        return $app['twig']->render(
            'marketing.html.twig', //correct the name of the page
            [
                'customers' => $customers
            ]
        );*/
        
    } //end of function
   
   
}//end of class MarketingController
