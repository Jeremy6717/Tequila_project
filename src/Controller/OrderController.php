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
 * Description of OrderController
 *
 * @author Etudiant
 */
class OrderController {
     public function orderAction(Request $request, Application $app){
       return 'hi order controller';
   }
   
   
   
   
}
