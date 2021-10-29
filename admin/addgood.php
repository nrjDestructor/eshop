<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if($_FILES['gpic']['type'] == 'image/jpeg' || $_FILES['gpic']['type']  == 'image/png'){
        if($_FILES['gpic']['size'] <= 1024*1024*20){
                move_uploaded_file($_FILES['gpic']['tmp_name'], "../images/".$_FILES['gpic']['name']);
        }
    }

    $gname = $_POST['gname'];
    $gdesc = $_POST['gdesc'];
    $gprice = $_POST['gprice'];
    $gqty = $_POST['gquantity'];
    $gcat = $_POST['gcat'];


    if($gname && $gdesc && $gprice && $gqty && $gcat){
        include '../db.php';
        addgood($gname, $gdesc, $gprice, $gqty, $_FILES['gpic']['name'], $gcat);
    }
}
    header("Location:goods.php");
?>