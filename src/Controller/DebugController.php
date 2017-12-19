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

class DebugController {

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


   public function debugusersAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(UserModel::class);
        $users = $repository->findAll();

        // return "ABC";

        return $app['twig']->render(
            'Debug/UserTemplate.html.twig',
            [
                'users' => $users
            ]
        );

    } // fin de la méthode debugusersAction(Request $request, Application $app) de la Classe DebugController

   public function debugcountriesAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Country::class);
        $countries = $repository->findAll();

        // return "ABC";

        return $app['twig']->render(
            'Debug/CountryTemplate.html.twig',
            [
                'countries' => $countries
            ]
        );

    } // fin de la méthode debugcountriesAction(Request $request, Application $app) de la Classe DebugController

    public function debugcategoriesAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Category::class);
        $categories = $repository->findAll();

        // return "ABC";

        return $app['twig']->render(
            'Debug/CategoryTemplate.html.twig',
            [
                'categories' => $categories
            ]
        );

    } // fin de la méthode debugcategoriesAction(Request $request, Application $app) de la Classe DebugController


    public function debugcustomersAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Customer::class);
        $customers = $repository->findAll();

        // return "ABC";

        return $app['twig']->render(
            'Debug/CustomerTemplate.html.twig',
            [
                'customers' => $customers
            ]
        );
        

    } // fin de la méthode debugcustomersAction(Request $request, Application $app) de la Classe DebugController



   public function debugproductsAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Product::class);
        $products = $repository->findAll();

        return $app['twig']->render(
            'Debug/ProductTemplate.html.twig',
            [
                'products' => $products
            ]
        );

    } // fin de la méthode debugproductsAction(Request $request, Application $app) de la Classe DebugController

    public function debugproductscsvAction(Request $request, Application $app){

        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Product::class);
        $products = $repository->findAll();

        // I open an export file in write mode
        $fileFullName = "C:\\xampp\\htdocs\\00_Tequila\\var\\csv\\export-20171218.csv";
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

        // return file_get_contents($fileFullName);
        return $app['twig']->render(
            'Debug/ProductcsvTemplate.html.twig',
            [
                'products' => $products
            ]
        );
    
    } // end of the method debugproductscsvAction(Request $request, Application $app) of Class DebuController
    
    
    public function debugproductsjsonAction(Request $request, Application $app){

        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Product::class);
        $products = $repository->findAll();
                
        $monjson = json_encode($products, JSON_PRETTY_PRINT);
        // var_dump($monjson);

        // I parse the array and I create the JSON
        $tableau = [];
        foreach ($products as $key => $value) {
            // var_dump($value->toArray());
            $tableau[] = $value->toArray();
            // var_dump($tableau);
        }
        var_dump(json_encode($tableau, JSON_PRETTY_PRINT));
        
        // $monjson2 = json_encode( array_map( function($t){ return is_string($t) ? utf8_encode($t) : $t; }, $tableau ) );
        // $monjson2 = json_encode($tableau, JSON_PRETTY_PRINT);
        // var_dump($monjson2);

        
        return $app['twig']->render(
            'Debug/ProductcsvTemplate.html.twig',
            [
                'products' => $products
            ]
        );
    
    } // end of the method debugproductsjsonAction(Request $request, Application $app) of Class DebuController
    
     public function debugstockAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Product::class);
        $products = $repository->findAll();
        
        return $app['twig']->render(
            'Debug/StockTemplate.html.twig',
            [
                'products' => $products
            ]
        );
        
    } 
    
     public function debugMarketingAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Customer::class);
        $customers = $repository->findAll();
        
        return $app['twig']->render(
            'Debug/MarketingTemplate.html.twig',
            [
                'customers' => $customers
            ]
        );
        
    } 


   public function debugordersAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Orders::class);
        $orders = $repository->findAll();
                     
        return $app['twig']->render(
            'Debug/OrdersTemplate.html.twig',
            [
                'orders' => $orders
            ]
        );
    } // end of the method debugordersAction(Request $request, Application $app) of Class DebugController 
    
   
    public function debugorderlinessAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Orderline::class);
        $orderlines = $repository->findAll();
                     
        return $app['twig']->render(
            'Debug/OrderlineTemplate.html.twig',
            [
                'orderlines' => $orderlines
            ]
        );
    } // end of the method debugorderlinesAction(Request $request, Application $app) of Class DebugController 
    
    
    
    
    
    
} // end of Class DebugController


