<?php

require 'vendor/autoload.php';

use Vendor\User\Repository;
use Vendor\User\User;

if(isset($_POST['registerUser'])){

    try{
        $repository = new Repository();
        $email = isset($_POST['email']) ?  $_POST['email'] : null;
        $password = isset($_POST['password']) ?  $_POST['password'] : null;
        $confirmPassword = isset($_POST['confirmPassword']) ?  $_POST['confirmPassword'] : null;

        if($password !== $confirmPassword) {
            throw new \Exception('Password doesn`t match');
        }

        /** @var User $user */
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);

        $response = $repository->register($user);

        if($response === true) {
            header('Location: http://' . $_SERVER['SERVER_NAME']);
        }
    } catch (\Exception $e){
        echo $e->getMessage();
    }
}