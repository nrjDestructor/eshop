<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $url = "register.php";
        $login = $_POST['login'];
        $password = $_POST['password'];
        $repasssword = $_POST['repassword'];
        $fullname = $_POST['fullname'];

        $ok = true;
        if(isset($login) && isset($password) && isset($repasssword) && isset($fullname)){
            require_once 'db.php';
            $user = getUser($login);
            if($user != null) {
                header("Location:registerForm.php?message=userExist");
                $ok = false;
            }

            if(strcmp($password, $repasssword) != 0) {
                header("Location:registerForm.php?message=passwordMismatch");
                $ok = false;
            }
            elseif(strlen($password) < 6 || strlen($repasssword) < 6) {
                header("Location:registerForm.php?message=passwordLength");
                $ok = false;
            }
            if($ok)
            registerUser($login, sha1($password), $fullname);
        }
    }
    ?>