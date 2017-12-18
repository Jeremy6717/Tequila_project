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

class OrderController {
    /**
    *  @return \Doctrine\DBAL\Query\QueryBuilder
    */
   protected function getQueryBuilder($doctrine){
   //calls the querybuilder of doctrine
   return $doctrine->createQueryBuilder();
   }

   /**
    *  @return \Doctrine\ORM\EntityManager
    */
   public function getEntityManager(Application $app){
   return $app['orm.em'];
   }

   public function orderAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Orders::class);
        $orders = $repository->findAll();

   /*
     return $app['twig']->render(
     'orders.html.twig', //check that the right page is called here
     [
     'orders' => $orders
     ]
     );*/
     } // end of the method debugordersAction(Request $request, Application $app) of Class DebugController



  } //end of class

 