<?php

require 'vendor/autoload.php';

use Vendor\User\Repository;

if(isset($_POST['loginUser'])){
    $repository = new Repository();
    $email = isset($_POST['email']) ?  $_POST['email'] : null;
    $password = isset($_POST['password']) ?  $_POST['password'] : null;
    $response = $repository->login($email, $password);

    if($response === true){
        header('Location: http://' . $_SERVER['SERVER_NAME']);
    } else{
        echo $response;
    }
}