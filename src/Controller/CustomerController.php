<?php

namespace Controller;

use \Symfony\Component\HttpFoundation\Request;
use \Silex\Application;
use \Models\Customer;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


/**
 * Description of ReportController
 *
 * @author Tam
 */

class CustomerController {

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

    public function customerAction(Request $request, Application $app){
        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Customer::class);
        $customers = $repository->findAll();
        
         //returns all the customer's records in customer.html.twig page       
        return $app['twig']->render(
            'customer.html.twig', 
            [
                'customers' => $customers
            ]
        );
    
    }//end of fucntion stockAction
    
    public function customercsvAction(Request $request, Application $app){

        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Customer::class);
        $categories = $repository->findAll();

        // I open an export file in write mode
        $today= date("Y-m-d-h-i-sa");
        $fileFullName = __DIR__."\\csv\\customer-".$today.".csv";
        $filePointer = fopen($fileFullName, 'w'); // I open this file in write mode, the file is created if it was absent
        
        // I parse the array and I create the csv lines
        $line='';
        foreach ($categories as $key => $value) {
            $line = 
            [
                $value->getId(),
                $value->getFirstName(),
                $value->getLastName(),
                $value->getEmail(),
                $value->getAddress(),
                $value->getPostcode(),
                $value->getCity(),
                $value->getCouid()->getName()    
            ];
            fputcsv($filePointer, $line, ';');
        }
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

        // return file_get_contents($fileFullName);
        return $app['twig']->render(
            'customer.html.twig',
            [
                'customers' => $customers
            ]
        );
    
    } // end of the method customercsvAction
  
   
}//end of CustomerController
