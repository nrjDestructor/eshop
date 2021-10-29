<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $gid = $_POST['gid'];


    if($gid){
        include '../db.php';
        deleteGood($gid);
    }
}
    header("Location:goods.php");

?>