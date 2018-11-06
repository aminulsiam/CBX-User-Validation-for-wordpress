<?php

if (isset($_POST)) {
    require_once "../db/db.php";
    $db = new DB();
    $query = "UPDATE users SET " . $_POST['name'] . "='" . $_POST['value'] . "' WHERE id=" . $_POST['pk'];
    $db->update($query);
}
