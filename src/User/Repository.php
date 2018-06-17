<?php

namespace Vendor\User;

use Vendor\Database;

class Repository{

    public function login($email, $password){

        try{

            /** @var User $user */
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);

            /** @var \PDO $pdo */
            $pdo = Database::getDatabase()->connect();
            $stmt = $pdo->prepare(
                'SELECT COUNT(*)
					FROM users
					WHERE users.email = :email
					AND users.password = :password'
            );
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
//            $test = $stmt->fetchColumn();
//            var_dump(intval($test));
            if(intval($stmt->fetchColumn()) > 0){
                session_start();
                $_SESSION['user'] = $email;
                return true;
            }else{
                throw new \Exception('User not found', 500);
            }
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * @param User $user
     * @return bool|string
     */
    public function register(User $user){

        try{

            /** @var \PDO $pdo */
            $pdo = Database::getDatabase()->connect();
            $stmt = $pdo->prepare(
                'INSERT INTO users(email, password)
					VALUES (:email, :password)'
            );
            $stmt->bindValue(':email', $user->getEmail());
            $stmt->bindValue(':password', $user->getPassword());
            $stmt->execute();

            if($stmt->execute()){
                return true;
            } else {
                throw new \Exception('Query failed', 500);
            }
        } catch(\Exception $e){
            return $e->getMessage();
        }
    }
}



