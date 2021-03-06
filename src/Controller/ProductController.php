<?php

namespace Controller;

use \Symfony\Component\HttpFoundation\Request;
use \Silex\Application;
use \Models\Category;
use \Models\Product;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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

        //returns all the products in all categories to product.html.twig page         
        return $app['twig']->render(
            'product.html.twig', 
            [
                'products' => $products,
                'categories'=> $categories
            ]

        );// end of the method productAction
    } // end of Class


    /**
     * Method to filter products by Category
     * Returns the products of selected Category
     */
    public function productsOfCategoryAction(Request $request, Application $app) {
        $entityManager = $this->getEntityManager($app);
        
        $categoryRepository = $entityManager->getRepository(Category::class);
        $categories = $categoryRepository->findAll();
        
        $productRepository = $entityManager->getRepository(Product::class);
              
        $filteredProducts = $productRepository->findByCatid(
            $categoryRepository->find($request->query->get('selectCategory'))
        );
        
        //returns all the products in selected category to product.html.twig page       
        return $app['twig']->render(
            'product.html.twig', 
            [
                'categories'=> $categories,
                'products' => $filteredProducts                            
            ]
        );
        
        
    }//closes function productsOfCategoryAction

    public function productscsvAction(Request $request, Application $app){
             
        $entityManager = $this->getEntityManager($app);
        
        $productRepository = $entityManager->getRepository(Product::class);
        $products = $productRepository->findAll();
        
        $categoryRepository = $entityManager->getRepository(Category::class);
        $categories = $categoryRepository->findAll();

        // I open an export file in write mode
        $today= date("Y-m-d-h-i-sa");
        $fileFullName = __DIR__."\\csv\\product-".$today.".csv";

        $filePointer = fopen($fileFullName, 'w'); // I open this file in write mode, the file is created if it was absent
        // print_r ($filePointer);

        // I parse the array and I create the csv lines
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
            'product.html.twig',
            [
                'products' => $products,
                'categories'=>$categories
            ]
        );
    
    } // end of the method productscsvAction

} // end of Class ProductController
