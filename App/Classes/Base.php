<?php

namespace App\Classes;

class Base
{
    protected $username, $email, $phone, $password;

    public function __construct($username, $email, $phone, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }

    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function setUsername($username){
        $this->username = $username;
    }
}
