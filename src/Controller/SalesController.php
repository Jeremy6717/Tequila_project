<?php

namespace Controller;

use \Symfony\Component\HttpFoundation\Request;
use \Silex\Application;
use \Model\Category;
use \Model\Country;
use \Model\Customer;
use \Model\Orderline;
use \Model\Orders;
use \Model\Product;

class SalesController {
    
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
    
     public function salesAction(Request $request, Application $app){
       $entityManager = $this->getEntityManager($app);
       $repository = $entityManager->getRepository(\Models\Orderline::class);
       //\Models\Orders::class
   }
}
