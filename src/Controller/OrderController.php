<?php

namespace Controller;

use \Symfony\Component\HttpFoundation\Request;
use \Silex\Application;
use \Models\Customer;
use \Models\Orders;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
        
        $customersRepository = $entityManager->getRepository(Customer::class);
        $customers = $customersRepository->findAll();

        //returns all the customer's and order's records in orders.html.twig page 
        return $app['twig']->render(
            'orders.html.twig',
            [
                'orders' => $orders,
                'customers' => $customers
            ]
        );
     } // end of the method orderAction
    
    /**
     * Method that filters the orders by customer
     * Returns the filtered orders
     */
    public function ordersByClientAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        
        //loads orders and customers class' into own repositories and calls content from DB
        $ordersRepository = $entityManager->getRepository(Orders::class);
        $customersRepository = $entityManager->getRepository(Customer::class);
        
        //filtering orders by customer ID if customer is selected (custID is retrieved)
        if($request->query->has('custId')) {
            $orders = $ordersRepository->findByCustid(
                    $customersRepository->find($request->query->get('custId'))
                );
            } else {
                //retrieves all orders if no ID is selected
                 $orders = $ordersRepository->findAll();
            }
         
        $filterCustomer = $customersRepository->findAll();
         
        //returns all the filtered orders in orders.html.twig page        
        return $app['twig']->render(
            'orders.html.twig',
            [
                'orders' => $orders,
                'customers' => $filterCustomer
            ]
        );
                 
         
     }//end of function ordersByClientAction
     
    public function ordercsvAction(Request $request, Application $app){

        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Orders::class);
        $orders = $repository->findAll();

        // I open an export file in write mode
        $today= date("Y-m-d-h-i-sa");
        $fileFullName = __DIR__."\\csv\\order-".$today.".csv";
        $filePointer = fopen($fileFullName, 'w'); // I open this file in write mode, the file is created if it was absent
        
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
        
        // Now that the CSV file has been created on the web server, I can download it to the user's local drive
        if (file_exists($fileFullName)) {
            return new BinaryFileResponse(
                $fileFullName,
                200,
                [
                    'Content-Type' => 'application/octet-stream',
                    'Content-Disposition' => 'attachment; filename="'.basename($fileFullName).'"'
                ]
            );
        } // end of the download of the CSV file, from the web server into the user's local drive

        return $app['twig']->render(
            'orders.html.twig',
            [
                'orders' => $orders
            ]
        );
    } // end of the method ordercsvAction
  } //end of class

 