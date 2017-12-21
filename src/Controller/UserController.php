<?php

namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Silex\Application;
use Models\UserModel;
use Models\Role;
use Form\UserForm;
//Encryption password 
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Description of UserController
 *
 * @author tequila team
 */
class UserController {

    public function userSignupAction(Request $request, Application $app) {
             
        $user = new UserModel();
       
        //call to symfony component formfactory and UserForm class
        $formFactory = $app['form.factory'];
        $userForm = $formFactory->create(UserForm::class, $user, ['standalone'=>true]);
        $userForm->handleRequest($request);
       
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $entityManager = $app['orm.em'];
            
            $role = $request->request->get('usr_role');
            $roleRepository = $entityManager->getRepository(Role::class);
            $userRole = $roleRepository->findOneByLabel('ROLE_ADMIN');
            
            if (!$role) { 
                throw new NotFoundHttpException('Role '.$role.' not found');
            }else{
                $user->addRole($userRole);
                
                //Encryption password
                $encoder = $app['security.encoder_factory']->getEncoder(UserInterface::class);
                $password = $encoder->encodePassword($user->getPassword(), null);
                $user->setPassword($password);
                
                //data retrieved and pushed into DB
                $entityManager = $app['orm.em'];
                $entityManager->persist($user);
                $entityManager->flush();
                
                return $app['twig']->render('signin.html.twig'); 
            }    
        }
        
        return $app['twig']->render(
               'signUp.html.twig', 
                [
                    'form' => $userForm->createView()
                ]
            );
    } //end of function

} // end of class UserController

