<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $gid = $_POST['gid'];
    $gname = $_POST['gname'];
    $gdesc = $_POST['gdesc'];
    $gprice = $_POST['gprice'];
    $gcat = $_POST['gcat'];
    $gqty = $_POST['gquantity'];

		if($gid && $gname && $gdesc && $gprice && $gcat && $gqty){
            include '../db.php';
            updateGood($gid, $gname, $gdesc, $gprice,$gqty, "", $gcat);
        }
	}
    header("Location:goods.php");

?>