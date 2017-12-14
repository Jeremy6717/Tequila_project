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
        $repository = $entityManager->getRepository(UserModel::class);
        $users = $repository->findAll();
        
        // return "ABC";
        
        return $app['twig']->render(
            'User/UserTemplate.html.twig',
            [
                'users' => $users
            ]
        );
        
    } // fin de la méthode helloAction(Request $request, Application $app) de la Classe UserController
   
   
   
   
} // end of class SalesController
