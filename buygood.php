<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    session_start();
    if(!$_SESSION['user'])
        header("Location:loginform.php");
    require_once 'db.php';
    foreach($_SESSION['cart'] as $subKey => $subArray){
        buyGood($_SESSION['user']['id'], $subArray['gid'],
            $subArray['gnum']);
        }
        unset($_SESSION['cart']);
    }
?>