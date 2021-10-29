<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];


    if($cname && $cdesc){
        include '../db.php';
        addCategory($cname, $cdesc);
    }
}
    header("Location:goods.php");
?>