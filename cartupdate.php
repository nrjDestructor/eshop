<?php
    session_start();

    $goodId = $_POST['goodId'];
    $goodNum = $_POST['goodNum'];


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        foreach($_SESSION['cart'] as $subKey => $subArray){
            if($subArray['gid'] == $goodId){
                $_SESSION['cart'][$subKey]['gnum'] = $goodNum;
                break;
            }
        }
    }
    ?>