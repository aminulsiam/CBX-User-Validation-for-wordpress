<?php
require_once "partials/header.php";

use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
//require 'vendor/autoload.php';
//
//$mail = new PHPMailer;
//$mail->SMTPDebug = 0;
//$mail->isSMTP();                           // Set mailer to use SMTP
//$mail->Host = 'smtp.mailtrap.io';          // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                    // Enable SMTP authentication
//$mail->Username = 'f3532b7f6dbf28';        // SMTP username
//$mail->Password = '8d7341193e25c7';        // SMTP password
//$mail->SMTPSecure = 'tls';                 // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 465;                          // TCP port to connect to
//
//$mail->From = 'aminul@gmail.com';
//$mail->FromName = 'Mailer';
//
//$mail->addAddress('aminulhossain90@gmail.com');      // Name is optional
//$mail->isHTML(true);      // Set email format to HTML
//
//$mail->Subject = 'Mail testing only';
//$mail->Body = 'This is the mail test <b>in bold!</b>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//if (!$mail->send()) {
//    echo 'Message could not be sent.';
//    echo 'Mailer Error: ' . $mail->ErrorInfo;
//}

?>
<div class="col-md-6 offset-3">
    <h1 class="text-center">You can register here</h1>
    <hr>
    <h4 class="text-center" id="msg"></h4>
    <form data-busy="0" data-ajax="1" action="" method="post" id="aminul_cbx_form">

        <h4 class="process_message text-success text-center"></h4>

        <div class="form-group">
            <label for="exampleInputEmail1"><b>First Name </b></label>
            <input type="text" name="first_name" class="form-control" id="first_name"
                   placeholder="Enter your first name">
            <small id="emailHelp" class="form-text text-muted"></small>
            <span id="error" class="error"></span>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"><b>Last Name </b></label>
            <input type="text" name="last_name" class="form-control" id="last_name"
                   placeholder="Enter your last name">
            <small id="emailHelp" class="form-text text-muted"></small>
            <span id="error" class="error"></span>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"><b>Email address</b></label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
            <small id="emailHelp" class="form-text text-muted"></small>
            <span id="error" class="error"></span>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1"><b>Password</b></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <span id="error" class="error"></span>
        </div>
        <input type="hidden" name="aminul_form" value="1"/>

        <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary btn-block">Submit</button>
    </form>
    <hr>
    <a href="user_data.php">
        <button class="btn btn-warning btn-block">see all data</button>
    </a>
</div>
<?php require_once "partials/footer.php"; ?>


