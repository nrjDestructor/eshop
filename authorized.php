<?php
    session_start();
    $online = false;
    $user = null;
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $online = true;
    }
    else
        header("Location:../eshop.php");;
        function checkIfNotAdmin(){
            global $online;
            global $user;
            if($online && $user['code'] != 'admin'){
                header("Location:../eshop.php");
            }
        }
?>