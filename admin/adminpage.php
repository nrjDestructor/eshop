<?php
require_once '../authorized.php';
checkIfNotAdmin();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once 'admin-head.php' ?>

</head>

<body id="page-top">

<?php require_once 'sidebar-top.php' ?>



<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- MY CONTENT HERE -->
    </div>



</div>
<?php require_once 'sidebar-bottom.php' ?>
</body>

</html>