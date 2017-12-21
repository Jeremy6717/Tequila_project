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

class MarketingController {
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
   public function marketingAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Customer::class);
        $customers = $repository->findAll();
        
        $customerswithage=$this->calculateAge($customers);

        return $app['twig']->render(
            'marketing.html.twig', //correct the name of the page
            [
                'customers' => $customerswithage
            ]
        );
        
    } //end of function marketingAction
    
        private function calculateAge($customers){
        $today = date("Y-m-d");
        
        $customersArray = [];
        
        foreach ($customers as $key => $value) {
            // $customerDate = \DateTime::createFromFormat('d/m/Y', $value->getDob());
            
            $diff = date_diff(\DateTime::createFromFormat('d/m/Y', $value->getDob()), date_create($today));
            
            $customerage = $diff->format('%y');
            $value->setDob($customerage);
            $customersArray[]=$value;
        } // end of parsing all orderlines
        return $customersArray;
    } // end of function calculateAge($customers)
   
   
}//end of class MarketingController
