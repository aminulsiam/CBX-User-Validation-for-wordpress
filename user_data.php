<?php
require_once "partials/header.php";
require_once "classes/user.php";

use Frontend\User\User;

$user = new User();
$value = $user->userData();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $user->delete($id);
}


// multiple user profile deleted
if (isset($_POST['check_delete'])) {
    require_once "db/db.php";
    $db = new DB();
    $checkbox = $_POST['check'];
    for ($i = 0; $i < count($checkbox); $i++) {
        $del_id = $checkbox[$i];
        $query = "DELETE FROM users WHERE id='" . $del_id . "'";
        if ($db->delete($query)) {
            $_SESSION['msg'] = "Data deleted successfully";
            header('location:user_data.php');
        }
    }
}
?>

<div class="col-md-6">
    <h2>User data</h2>
</div>
<div class="col-md-6 back-button">
    <a href="index.php">
        <button class="btn btn-primary">Back to previous page</button>
    </a>
</div>

<div class="col-md-12">
    <h3 class="text-center text-success" id="delete_message">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
    </h3>
    <hr>
    <form action="" method="post">
        <table class="table table-responsive-sm" id="datatable">
            <thead class="thead-light">
            <tr>
                <th>
                    <input type="checkbox" id="check_all" value="select"> Select
                    <input type="submit" name="check_delete"  onclick="return confirm('Are you sure want to delete this ??? ')" value="delete" class="btn btn-danger">
                </th>
                <th>#</th>
                <th>First</th>
                <th>Last</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($value as $data) {
                ?>
                <tr id="<?php echo $data['id']; ?>">
                    <th class="text-center">
                        <input type="checkbox" id="checkItem" name="check[]" value="<?php echo $data['id']; ?>">
                    </th>
                    <th><?php echo $i++; ?></th>
                    <td id="first_name"><?php echo $data['first_name']; ?></td>
                    <td id="last_name"><?php echo $data['last_name']; ?></td>
                    <td><?php echo $data['first_name'] . " " . $data['last_name']; ?></td>
                    <td id="email"><?php echo $data['email']; ?></td>
                    <td>
                        <a class="btn btn-info" href="edit.php?id=<?php echo $data['id']; ?>">
                            edit
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </form>
</div>
<?php require_once "partials/footer.php" ?>
<script type="text/javascript">

    // check all
    $("#check_all").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });


    //turn on to inline update
    $.fn.editable.defaults.mode = 'inline';
    $(document).ready(function() {
        $("#first_name,#email,#last_name").editable();
    });

</script>

