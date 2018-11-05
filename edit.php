<?php
require_once "partials/header.php";

// show user data
if (isset($_GET['id'])) {
    require_once "classes/user.php";

    $user = new \Frontend\User\User();
    $id = $_GET['id'];
    $result = $user->edit($id);
    $data = $result->fetch(PDO::FETCH_ASSOC);
}

// update user
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user->update($_POST);
}

?>


<div class="col-md-6 offset-3">
    <h1 class="text-center">You can updated your profile</h1>
    <hr>
    <h4 class="text-center" id="msg"></h4>
    <form action="" method="post">

        <h4 class="process_message text-success text-center"></h4>

        <div class="form-group">
            <label for="exampleInputEmail1"><b>First Name </b></label>
            <input type="text" name="first_name" class="form-control" id="first_name"
                   placeholder="Enter your first name" value="<?php echo $data['first_name']; ?>">
            <small id="emailHelp" class="form-text text-muted"></small>
            <span id="error" class="error"></span>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"><b>Last Name </b></label>
            <input type="text" name="last_name" class="form-control" id="last_name"
                   placeholder="Enter your last name" value="<?php echo $data['last_name']; ?>">
            <small id="emailHelp" class="form-text text-muted"></small>
            <span id="error" class="error"></span>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"><b>Email address</b></label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email"
                   value="<?php echo $data['email']; ?>">
            <small id="emailHelp" class="form-text text-muted"></small>
            <span id="error" class="error"></span>
        </div>

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>"/>

        <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary btn-block">Submit</button>
    </form>
</div>
<?php require_once "partials/footer.php"; ?>


