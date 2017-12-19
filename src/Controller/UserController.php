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

        $username = $request->request->get('usr_username');
        $firstname = $request->request->get('usr_firstname');
        $lastname = $request->request->get('usr_lastname');
        $email = $request->request->get('usr_email');
        $password = $request->request->get('usr_password');
        $newsletter = $request->request->get('usr_newsletter');
        $report = $request->request->get('usr_report');
        $role = 'ROLE_ADMIN'; //$request->request->get('usr_role');   

        /* $roleInstance = $app['orm.em']->getRepository(\Models\Role::class)->findOneByLabel($role);
          if (!$role) {
          throw new NotFoundHttpException('Role '.$role.' not found');
          } */

        $app->register(new FormServiceProvider());
        $formFactory = $app['form.factory'];
        $userForm = $formFactory->create(UserForm::class); //, $user, ['standalone'=>true]);
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $entityManager = $app['orm.em'];


            $user = new UserModel();

            $user->setFirstname($firstname)
                    ->setLastname($lastname)
                    ->setUsername($username)
                    ->setPassword($password)
                    ->setEmail($email)
                    ->setNewsletter($newsletter)
                    ->setReport($report)
                    ->setRoles([$roleInstance]);

            $entityManager = $app['orm.em'];
            $entityManager->persist($user);
            $entityManager->flush();

            return $app->json($user->toArray());      


            /*return $app['twig']->render(
                            'signUp.html.twig', [
                        'form' => $userForm->createView()
                            ]
            );*/
        }
    }

//end of function
}

//end of class UserController 
