<?php

namespace Controller;

use \Symfony\Component\HttpFoundation\Request;
use \Silex\Application;
use \Models\Orderline;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
                'orderlines' => $this->filterByDate($orderlines)
            ]
        );
    }
    
    public function orderlinescsvAction(Request $request, Application $app){

        $entityManager = $this->getEntityManager($app);
        $repository = $entityManager->getRepository(Orderline::class);
        $orderlines = $repository->findAll();
                
        // I open an export file in write mode
        $now = new \DateTime();
        $fileFullName = __DIR__."\\csv\\orderline-".$now->format("Y-m-d-h-i-sa").".csv";
        $filePointer = fopen($fileFullName, 'w'); // I open this file in write mode, the file is created if it was absent
        // print_r ($filePointer);

        // I parse the array and I create the csv lines
        $line='';
        $filteredOrderline=$this->filterByDate($orderlines);
        
        foreach ($filteredOrderline as $key => $value) {
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
            'orderlines.html.twig',
            [
                'orderlines' => $filteredOrderline
            ]
        );
    
    } // end of the method orderlinescsvAction(Request $request, Application $app) of Class DebuController
    
    private function filterByDate($orderlines){
        $now = new \DateTime();
        $firstDay = new \DateTime('first day of this month');
        
        $orderlinesArray = [];
        
        foreach ($orderlines as $key => $value) {
            $orderDate = \DateTime::createFromFormat('d/m/Y', $value->getOrder()->getDate());

            if ($orderDate >= $firstDay && $orderDate <= $now){
              $orderlinesArray[]=$value;
            }
            
        } // end of parsing all orderlines
        return $orderlinesArray;
    }


}// end of public function orderlineAction

//end of class

 