<?php

use Frontend\Validate\Validation;

if (isset($_POST['aminul_form']) && intval($_POST['aminul_form']) == 1) {

    require_once "../classes/validation.php";

    $validation = new Validation;

    $error = array();
    $validated = true;

    $first_name = $validation->validate($_POST['first_name']);
    $last_name = $validation->validate($_POST['last_name']);
    $email = $validation->validate($_POST['email']);
    $password = $_POST['password'];

    // check empty
    if (empty($first_name)) {
        $validated = false;
        $error['first_name'] = "first name is empty";
    }

    if (empty($last_name)) {
        $validated = false;
        $error['last_name'] = 'last name is empty';
    }

    if (empty($email)) {
        $validated = false;
        $error['email'] = 'email is empty';
    }

    if (empty($password)) {
        $validated = false;
        $error['password'] = 'password is empty';
    }


    $messages = array();
    $messages['validation_message'] = $error;

    if ($validated) {

        $process_messages = array();

        //insert into db
        require_once "../db/db.php";
        $db = new DB;

        $password = md5($_POST['password']);

        $query = "INSERT INTO users(first_name,last_name,email,password) VALUES
        ('$first_name','$last_name','$email ','$password')";
        $store = $db->insert($query);
        if ($store) {
            $process_messages['insert'] = 'Database inserted successfully';
        } else {
            $process_messages['insert'] = 'Database insert failed';
        }


        $email_ok = 1;

        //send email
        if ($email_ok) {

        } else {

        }

        $messages['process_message'] = $process_messages;

    }

    echo json_encode($messages);
    die();
}

