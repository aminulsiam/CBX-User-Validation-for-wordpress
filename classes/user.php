<?php

namespace Frontend\User;

use Frontend\Validate\Validation;

require_once "db/db.php";
require_once "validation.php";

/**
 * Class User
 */
class User
{
    private $db;
    private $validate;

    public function __construct()
    {
        $this->db = new \DB;
        $this->validate = new Validation();
    }

    // user store
    public function store($data)
    {
//        // Get the value and validate here
//
//        $first_name = $this->validate->validate($data['first_name']);
//        $last_name  = $this->validate->validate($data['last_name']);
//        $email      = $this->validate->validate($data['email']);
//        $password   = md5($data['password']);
//
//        // Insert user data
//
//        $query = "INSERT INTO users(first_name,last_name,email,password) VALUES
//        ('$first_name','$last_name','$email ','$password')";
//        $store = $this->db->insert($query);
//        if($store == true){
//            $message = "Registration successfully done";
//            return $message;
//        }
    }








}// end class
