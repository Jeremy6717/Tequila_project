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

class StockController {

    /**
     *  @return \Doctrine\DBAL\Query\QueryBuilder
     */
    protected function getQueryBuilder($doctrine) {
        //calls the querybuilder of doctrine
        return $doctrine->createQueryBuilder();
    }

    /**
     *  @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager(Application $app) {
        return $app['orm.em'];
    }

    public function stockAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Product::class);
        $products = $repository->findAll();
        
        return $app['twig']->render(
            'stock.html.twig', //check name of page
            [
                'products' => $products
            ]
        );
    
    }//end of fucntion stockAction
}
