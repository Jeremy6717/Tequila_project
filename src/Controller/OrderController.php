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

     return $app['twig']->render(
     'orders.html.twig',
     [
     'orders' => $orders
     ]
     );
     } // end of the method orderAction
     
     
     public function ordercsvAction(Request $request, Application $app){

        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Orders::class);
        $orders = $repository->findAll();

        // I open an export file in write mode
        $today= date("Y-m-d-h-i-sa");
        $fileFullName = __DIR__."\\csv\\order-".$today.".csv";
        echo $fileFullName;
        $filePointer = fopen($fileFullName, 'w'); // I open this file in write mode, the file is created if it was absent
        // print_r ($filePointer);

        // I parse the array and I create the csv lines
        $line='';
        foreach ($orders as $key => $value) {
                $line = [
                    $value->getId(),
                    $value->getDate(),
                    $value->getPayment(),
                    $value->getCustid()->getFirstname(),
                    $value->getCustid()->getLastname()
                ];
                fputcsv($filePointer, $line, ';');
        } // end of parsing all orders

        fclose($filePointer); // I close the file in write mode

        // return file_get_contents($fileFullName);
        return $app['twig']->render(
            'orders.html.twig',
            [
                'orders' => $orders
            ]
        );
    
    } // end of the method ordercsvAction(Request $request, Application $app) of Class DebuController



  } //end of class

 