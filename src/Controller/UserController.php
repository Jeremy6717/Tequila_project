<?php

namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Silex\Application;
use Models\UserModel;
use Models\Role;
use Form\UserForm;
use Silex\Provider\FormServiceProvider;

/**
 * Description of UserController
 *
 * @author tequila team
 */
class UserController {

    public function userSignupAction(Request $request, Application $app) {
             
        //If there are less than 5 then the user can be added
        $user = new UserModel();
       
        $formFactory = $app['form.factory'];
        $userForm = $formFactory->create(UserForm::class, $user, ['standalone'=>true]);
        $userForm->handleRequest($request);
       
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $entityManager = $app['orm.em'];
            
            $role = $request->request->get('usr_role');
            $roleRepository = $entityManager->getRepository(\Models\Role::class);
            $userRole = $roleRepository->findOneByLabel('ROLE_ADMIN');
            
            if (!$role) { 
                throw new NotFoundHttpException('Role '.$role.' not found');
            }else{
                $user->addRole($userRole);
                
                $entityManager = $app['orm.em'];
                $entityManager->persist($user);
                $entityManager->flush();
                
                return $app['twig']->render('signin.html.twig'); 
            }    

        }
        
        return $app['twig']->render(
                            'signUp.html.twig', [
                        'form' => $userForm->createView()
                            ]
            );
    } //end of function

} // end of class UserController

