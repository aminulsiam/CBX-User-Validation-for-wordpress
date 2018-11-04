<?php

use Frontend\Validate\Validation;
use PHPMailer\PHPMailer\PHPMailer;

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
            //Load Composer's autoloader
            require '../vendor/autoload.php';

            $mail = new PHPMailer;
            $mail->SMTPDebug = 0;
            $mail->isSMTP();                           // Set mailer to use SMTP
            $mail->Host = 'smtp.mailtrap.io';          // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                    // Enable SMTP authentication
            $mail->Username = 'f3532b7f6dbf28';        // SMTP username
            $mail->Password = '8d7341193e25c7';        // SMTP password
            $mail->SMTPSecure = 'tls';                 // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                          // TCP port to connect to

            $mail->From = 'aminul@gmail.com';
            $mail->FromName = 'Mailer';
            $email = $_POST['email'];
            $mail->addAddress($email);      // Name is optional
            $mail->isHTML(true);      // Set email format to HTML

            $mail->Subject = 'Mail testing only';
            $mail->Body = 'This is the mail test <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            $process_messages['insert'] = 'Database insert failed';
        }
        $messages['process_message'] = $process_messages;
    }
    echo json_encode($messages);
    die();
}

