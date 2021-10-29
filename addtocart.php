<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    $gid = $_POST['gid'];
    $gname = $_POST['gname'];
    $gpic = $_POST['gpic'];
    $gprice= $_POST['gprice'];
    session_start();

    if(!isset($_SESSION['cart']))
        $_SESSION['cart'] = [];


        $found = false;
    for($i=0; $i<count($_SESSION['cart']); $i++){
        if($_SESSION['cart'][$i]['gid'] == $gid){
            $_SESSION['cart'][$i]['gnum'] += 1;
            $found = true;
            break;
        }
    }

    if($found == false)
    $_SESSION['cart'][] = array('gid'=>$gid, 'gnum'=>1, 'gname'=>$gname, 'gpic'=>$gpic,'gprice'=>$gprice);
}
header("Location:eshop.php");
?>