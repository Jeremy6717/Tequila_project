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

class OrderlineController {

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

   public function orderlinesAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Orderline::class);
        $orderlines = $repository->findAll();
                     
        return $app['twig']->render(
            'orderlines.html.twig',
            [
                'orderlines' => $orderlines
            ]
        );
    }


}// end of public function orderlineAction

//end of class

 