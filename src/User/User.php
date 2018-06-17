<?php

namespace Vendor\User;

class User{

    private $id;
    private $email;
    private $password;

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $email
     * @throws \Exception
     */
    public function setEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Invalid email format provided', 500);
        }
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $password
     * @throws \Exception
     */
    public function setPassword($password)
    {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            throw new \Exception('Password must be a minimum of 8 characters, contain at least 1 number, contain at least one uppercase character, contain at least one lowercase character', 500);
        }
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
}
