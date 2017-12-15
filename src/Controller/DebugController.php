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

} // end of class SalesController

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


} // end of class

