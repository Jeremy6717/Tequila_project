<?php

namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Models\UserModel;

/**
 * Description of UserController
 *
 * @author tequila team
 */
class UserController
{

    public function userSignUp(Request $request, Application $app)
    {

        /*
         * if (!isset($_POST['user_lastname'])) {
         *  message = 'user_lastname must be defined';
         *  return $app->json(['status' => 'error', 'message' => $message], 400);
         * }
         */
        if (!$request->request->has('user_lastname')) {
            $message = 'user_lastname must be defined';
            return $app->json(['status' => 'error', 'message' => $message], 400);
        }

        /*
         * if (!isset($_POST['user_firstname'])) {
         *  message = 'user_firstname must be defined';
         *  return $app->json(['status' => 'error', 'message' => $message], 400);
         * }
         */
        if (!$request->request->has('user_firstname')) {
            $message = 'user_firstname must be defined';
            return $app->json(['status' => 'error', 'message' => $message], 400);
        }


        /*
         * if (!isset($_POST['user_username'])) {
         *  message = 'user_username must be defined';
         *  return $app->json(['status' => 'error', 'message' => $message], 400);
         * }
         */
        if (!$request->request->has('user_username')) {
            $message = 'user_username must be defined';
            return $app->json(['status' => 'error', 'message' => $message], 400);
        }

        /*
        * if (!isset($_POST['user_password'])) {
        *  message = 'user_password must be defined';
        *  return $app->json(['status' => 'error', 'message' => $message], 400);
        * }
        */
        if (!$request->request->has('user_password')) {
            $message = 'user_password must be defined';
            return $app->json(['status' => 'error', 'message' => $message], 400);
        }

        /*
        * if ($_POST['user_password'] == $_POST['user_confirm_password']) {
        *  message = 'confirm password must be the same of password';
        *  return $app->json(['status' => 'error', 'message' => $message], 400);
        * }
        */
        if ($_POST['user_password'] !== $_POST['user_confirm_password']) {
            $message = 'confirm password must be the same of password';
            return $app->json(['status' => 'error', 'message' => $message], 400);
        }else{
            $encoder = $app['security.encoder_factory']->getEncoder(UserInterface::class);
            $password = $encoder->encodePassword($data->getPassword(), null);
            $data->setPassword($password);
        }




        // $firstname = $_POST['user_firstname'];
        $firstname = $request->request->get('user_firstname');

        // $lastname = $_POST['user_lastname'];
        $lastname = $request->request->get('user_lastname');

        // $username = $_POST['user_username'];
        $username = $request->request->get('user_username');

        // $password = $_POST['user_password'];
        $password = $request->request->get('user_password');



        $user = new UserModel();
        $user->setFirstname($firstname)
            ->setLastname($lastname)
            ->setUsername($username)
            ->setPassword($password);



        $entityManager = $app['orm.em'];
        $entityManager->persist($user);
        $entityManager->flush();

        return $app->json($user->toArray());
    }
}
