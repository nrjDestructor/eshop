<?php
require_once '../authorized.php';
checkIfNotAdmin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Categories list</title>
    <?php require_once 'admin-head.php' ?>

</head>

<body id="page-top">

<?php require_once 'sidebar-top.php' ?>



<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a class="btn btn-primary" href="addcategory.php">Add category</a>
    </div>
    <?php require_once '../db.php' ?>
    <table class="table table-light" style="margin-top: 20px;">
        <thead>
        <th>ID</th>
        <th>NAME</th>
        <th>Description</th>
        <th>Actions</th>
        </thead>
        <tbody>


        <?php
        $cats = getAllCategories();

        foreach($cats as $cat){
            ?>


            <tr class="table-active">
                <td><?php echo $cat['id']; ?></td>
                <td><?php echo $cat['name']; ?></td>
                <td><?php echo $cat['description']; ?></td>
                <td>
                    <a class="btn btn-primary" href="onecat.php?id=<?php echo $cat['id']; ?>">Details</a>
                <form action="deletecategory.php" method="post"><input type="hidden" name="catid" value="<?php echo $cat['id']; ?>"><button class="btn btn-danger">Delete</button></form></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>



</div>
<?php require_once 'sidebar-bottom.php' ?>
</body>

</html>