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

    // select all user data
    public function userData()
    {
        $query = "SELECT * From users ORDER BY id DESC";
        return $this->db->select($query);
    }

    // user edit form
    public function edit($id)
    {
        $query = "SELECT * FROM users WHERE id='$id'";
        return $this->db->select($query);
    }

    // update user
    public function update($data)
    {
        $first_name = $this->validate->validate($data['first_name']);
        $last_name  = $this->validate->validate($data['last_name']);
        $email      = $this->validate->validate($data['email']);
        $id         = (int)$data['id'];

        $query = "UPDATE users SET first_name='$first_name',last_name='$last_name',email='$email' WHERE id='$id' ";
        $update = $this->db->update($query);
        if($update){
            session_start();
            $_SESSION['msg'] = "Profile updated successfully";
            header("location:user_data.php");
        }
    }

    // delete user data
    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id='$id'";
        return $this->db->delete($query);
        header('location:user_data.php');
    }

    // delete multiple user
    public function deleteMultipleUser($id)
    {
        $query = "DELETE FROM users WHERE id='$id'";
        return $this->db->delete($query);
        header('location:user_data.php');
    }


}// end class
