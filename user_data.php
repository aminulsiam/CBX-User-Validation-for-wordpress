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
            <tr>
                <th><?php echo $i++; ?></th>
                <td><?php echo $data['first_name']; ?></td>
                <td><?php echo $data['last_name']; ?></td>
                <td><?php echo $data['first_name'] . " " . $data['last_name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>">
                        <button class="btn btn-primary">edit</button>
                    </a>
                    <a href="?delete=<?php echo $data['id']; ?>">
                        <button class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete this ??? ')">delete
                        </button>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<?php require_once "partials/footer.php" ?>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<!--<script src="https://cdn.datatables.net/1.10.19/js/dataTables.jqueryui.min.js"></script>-->
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
