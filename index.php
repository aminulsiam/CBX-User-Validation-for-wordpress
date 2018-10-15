<?php

require_once "db/db.php";
require_once "classes/user.php";

use Frontend\User\User;

$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $user->store($_POST);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Registration form</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <h1 class="text-center">You can register here</h1>
            <hr>
            <?php
                if (isset($message)){
            ?>
                <h4 class="text-center"><?php echo $message; ?></h4>
            <?php }?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="aminul_cbx_form">

                <div class="form-group">
                    <label for="exampleInputEmail1"><b>First Name </b></label>
                    <input type="text" name="first_name" class="form-control" id="first_name"
                           placeholder="Enter your first name">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Last Name </b></label>
                    <input type="text" name="last_name" class="form-control" id="last_name"
                           placeholder="Enter your last name">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"><b>Email address</b></label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1"><b>Password</b></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                           placeholder="Password">
                </div>

                <button type="submit" name="btn" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/dist/jquery.validate.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>