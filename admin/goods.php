<?php
require_once '../authorized.php';
checkIfNotAdmin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Goods list</title>
    <?php require_once 'admin-head.php' ?>

</head>

<body id="page-top">

<?php require_once 'sidebar-top.php' ?>



<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a class="btn btn-primary" href="addform.php">Add good</a>
    </div>
        <?php require_once '../db.php' ?>
        <table class="table table-light" style="margin-top: 20px;">
            <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Actions</th>
            </thead>
            <tbody>


            <?php
                $goods = getAllGoods();

                foreach($goods as $good){
                    ?>


                    <tr class="table-active">
                        <td><?php echo $good['id']; ?></td>
                        <td><?php echo $good['name']; ?></td>
                        <td><?php echo $good['description']; ?></td>
                        <td><?php echo $good['price']; ?></td>
                        <td> <?php echo $good['qty']; ?>  </td>
                        <td><?php echo $good['cname']; ?></td>
                        <td>
                            <a class="btn btn-primary" href="onegood.php?id=<?php echo $good['id']; ?>">Details</a></td>
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