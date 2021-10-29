<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $uid = $_POST['uid'];
    $gid = $_POST['gid'];
    $comment = $_POST['comment'];
}

    require_once 'db.php';
    commentGood($uid, $gid, $comment);
    echo "success";
?>