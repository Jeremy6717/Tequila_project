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
    
    public function stockcsvAction(Request $request, Application $app){

        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Product::class);
        $products = $repository->findAll();

        // I open an export file in write mode
        $today= date("Y-m-d-h-i-sa");
        $fileFullName = __DIR__."\\csv\\stock-".$today.".csv";
        echo $fileFullName;
        $filePointer = fopen($fileFullName, 'w'); // I open this file in write mode, the file is created if it was absent
        // print_r ($filePointer);

        // I parse the array and I create the csv lines
        $line='';
        foreach ($products as $key => $value) {
            if ($value->getStock() < 4){
                $line = [
                    $value->getId(),
                    $value->getName(),
                    $value->getDescription(),
                    $value->getPrice(),
                    $value->getStock(),
                    $value->getVat(),
                    $value->getCatid()->getNAme()
                ];
                fputcsv($filePointer, $line, ';');
            } // end of check whether the stock is low
        } // end of parsing all products

        fclose($filePointer); // I close the file in write mode

        // Now that the CSV file has been created on the web server, I can download it to the user's local drive
        if (file_exists($fileFullName)) {
            return new BinaryFileResponse(
                $fileFullName,
                200,
                [
                    'Content-Type' => 'application/octet-stream'
                ]
            );
        } // end of the download of the CSV file, from the web server into the user's local drive
        
        return $app['twig']->render(
            'stock.html.twig',
            [
                'products' => $products
            ]
        );
    
    } // end of the method stockvAction(Request $request, Application $app) of Class DebuController
    
    
    
}
