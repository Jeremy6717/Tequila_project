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
    
    public function orderlinescsvAction(Request $request, Application $app){

        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Orderline::class);
        $orderlines = $repository->findAll();

        // I open an export file in write mode
        $today= date("Y-m-d-h-i-sa");
        $fileFullName = __DIR__."\\csv\\orderline-".$today.".csv";
        echo $fileFullName;
        $filePointer = fopen($fileFullName, 'w'); // I open this file in write mode, the file is created if it was absent
        // print_r ($filePointer);

        // I parse the array and I create the csv lines
        $line='';
        foreach ($orderlines as $key => $value) {
            $line = [
                $value->getOrder()->getId(),
                $value->getOrder()->getDate(),
                $value->getOrder()->getPayment(),
                $value->getOrder()->getCustid()->getId(),
                $value->getOrder()->getCustid()->getFirstname(),
                $value->getOrder()->getCustid()->getLastname(),
                $value->getOrder()->getCustid()->getCouId()->getName(),
                $value->getQuantity(),
                $value->getProduct()->getId(),
                $value->getProduct()->getName(),
                $value->getProduct()->getCatId()->getId(),
                $value->getProduct()->getCatId()->getName()
            ];
            fputcsv($filePointer, $line, ';');
        } // end of parsing all orderlines

        fclose($filePointer); // I close the file in write mode

        // return file_get_contents($fileFullName);
        return $app['twig']->render(
            'orderlines.html.twig',
            [
                'orderlines' => $orderlines
            ]
        );
    
    } // end of the method orderlinescsvAction(Request $request, Application $app) of Class DebuController
    


}// end of public function orderlineAction

//end of class

 