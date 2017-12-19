<?php

namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Models\UserModel;
use Form\UserForm;
use Silex\Provider\FormServiceProvider;
/**
 * Description of UserController
 *
 * @author tequila team
 */



class UserController 
{

    public function  userSignupAction(Request $request, Application $app){
        $app->register(new FormServiceProvider());
        $user = new UserModel();

        $formFactory = $app['form.factory'];
        $userForm = $formFactory->create(UserForm::class, $user, ['standalone'=>true]);

        $userForm->handleRequest($request);
        if($userForm->isSubmitted() && $userForm->isValid()){
            $entityManager = $app['orm.em'];
            $roleRepository = $entityManager->getRepository(Role::class);
            $userRole = $roleRepository->findOneByLabel('ROLE_ADMIN');

            $user->addRole($userRole);

            $entityManager->persist($user);
            $entityManager->flush();

            return $app->redirect($app['url_generator']->generate('signup'));
        }

        return $app['twig']->render(
            'signUp.html.twig',
            [
                'form' => $userForm->createView()
            ]
        );
    }
}
