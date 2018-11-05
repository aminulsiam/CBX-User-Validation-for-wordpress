<?php

    if(isset($_POST['id'])){
        require_once "../db/db.php";
        $db = new DB;
        $id = $_POST['id'];
        $query = "DELETE FROM users WHERE id ='$id' ";
        $deleted = $db->delete($query);
        if($deleted){
            echo 1;
        }
    }
