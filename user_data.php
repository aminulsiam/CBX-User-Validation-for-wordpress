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
    <h3 class="text-center text-success">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
    </h3>
    <hr>
    <table class="table table-responsive-sm" id="datatable">
        <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>First</th>
            <th>Last</th>
            <th>Full name</th>
            <th>Email</th>
            <th class="checkbox">Action <input type="checkbox"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($value as $data) {
            ?>
            <tr id="<?php echo $data['id']; ?>">
                <th><?php echo $i++; ?></th>
                <td><?php echo $data['first_name']; ?></td>
                <td><?php echo $data['last_name']; ?></td>
                <td><?php echo $data['first_name'] . " " . $data['last_name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>">
                        <button class="btn btn-primary">edit</button>
                    </a>

                    <button class="btn btn-danger" onclick="deleteUser(<?php echo $data['id']; ?>)">
                        delete
                    </button>

                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php require_once "partials/footer.php" ?>
<script type="text/javascript">
    // user delete
    function deleteUser(id) {
        var check = confirm("Are you sure want to delete this ??? ");
        if (check) {
            var id = id;
            jQuery.ajax({
                method: "POST",
                url: "check/delete_user.php",
                data: {id: id},
                success: function (response) {
                    if (response == 1) {
                        $("#" + id).hide(1200);
                    }
                }
            });
        }
    }
</script>

