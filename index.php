<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                <h4 class="text-center" id="msg"></h4>
            <form data-busy="0" data-ajax="1" action="" method="post" id="aminul_cbx_form">

                <div class="process_message text-success"></div>

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
                <input type="hidden" name="aminul_form" value="1" />

                <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/dist/jquery.validate.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>