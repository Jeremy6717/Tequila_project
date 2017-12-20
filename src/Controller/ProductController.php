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

class ProductController {

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

    public function productAction(Request $request, Application $app) {
        $entityManager = $this->getEntityManager($app);
        
        $productRepository = $entityManager->getRepository(Product::class);
        $products = $productRepository->findAll();
        
        $categoryRepository = $entityManager->getRepository(Category::class);
        $categories = $categoryRepository->findAll();

        return $app['twig']->render(
                        'product.html.twig', [
                    'products' => $products,
                    'categories'=>$categories
                        ]
        );
    }


   public function productscsvAction(Request $request, Application $app){

        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Product::class);
        $products = $repository->findAll();

        // I open an export file in write mode
        $today= date("Y-m-d-h-i-sa");
        $fileFullName = __DIR__."\\csv\\product-".$today.".csv";
        echo $fileFullName;
        $filePointer = fopen($fileFullName, 'w'); // I open this file in write mode, the file is created if it was absent
        // print_r ($filePointer);

        // I parse the array and I create the csv lines
        // $nbrProducts = count($resultproducts);
        // echo "<br>There are {$nbrProducts} products in my array<br>";
        $line='';
        foreach ($products as $key => $value) {
            $line = [
                $value->getId(),
                $value->getName(),
                $value->getDescription(),
                $value->getPrice(),
                $value->getStock(),
                $value->getVat(),
                $value->getCatid()->getName()
            ];

            fputcsv($filePointer, $line, ';');
        }

        fclose($filePointer); // I close the file in write mode

        // Now that the CSV file has been created on the web server, I can download it to the user's local drive
        if (file_exists($fileFullName)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($fileFullName).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fileFullName));
            readfile($fileFullName);
            exit;
        } // end of the download of the CSV file, from the web server into the user's local drive
        
        return $app['twig']->render(
            'product.html.twig',
            [
                'products' => $products
            ]
        );
    
    } // end of the method productscsvAction(Request $request, Application $app) of Class DebuController
   

} // end of Class ProductController
