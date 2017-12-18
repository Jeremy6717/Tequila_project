<?php

use \Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Query\QueryBuilder;
use \Silex\Application;
use \Models\Category;
use \Models\Country;
use \Models\Customer;
use \Models\Orderline;
use \Models\Orders;
use \Models\Product;

namespace Controller;

/**
 * Description of MarketingController
 *
 * @author Etudiant
 */
class MarketingController {
     public function marketingAction(Request $request, Application $app){
       return 'hi marketing controller';
   }
   
   
   
   
}
