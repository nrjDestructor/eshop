<?php
    session_start();
    if(isset($_SESSION['user']))
        header("Location:eshop.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container ">
        <?php
            if(isset($_GET['message'])){
                ?>
                    <div class="alert alert-danger">
                        <?php
                            require_once 'messages.php';
                            echo $message[$_GET['message']];
                        ?>
                    </div>
            <?php
            }
        ?>
        <form id="logform" class="mt-5 w-50 mx-auto" action="login.php" method="POST">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp" required>
                <div id="loginHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp" required>
                <div id="passwordHelp" class="form-text"></div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="button" onclick="loginme()" class="btn btn-primary">Register</button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function loginme(){
            let ok = true;

            loginHelp.innerText = '';
            passwordHelp.innerText = '';

            if(login.value == '') {
                loginHelp.innerText = 'Please fill login field';
                ok = false;
            }
            if(password.value == '') {
                passwordHelp.innerText = 'Please fill password field';
                ok = false;
            }

           if(password.value.length < 6){
               passwordHelp.innerText = "Password must contain 6 symbols";
               ok = false;
           }
            if(ok)
                logform.submit();
        }
    </script>
</body>
</html>