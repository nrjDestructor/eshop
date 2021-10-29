<?php
require_once '../authorized.php';
checkIfNotAdmin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <?php require_once 'admin-head.php' ?>
</head>

<body id="page-top">

<?php require_once 'sidebar-top.php' ?>



<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <?php require_once '../db.php' ?>
    <?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $goodid = $_GET['id'];

        $good = getGood($goodid);
        if($good != null){
            $cats = getAllCategories();
            ?>
            <form action="updategood.php" method="post">
                    <input type="hidden" value="<?php echo $good['id']; ?>" name="gid" class="form-control">
                    <label class="form-label">name</label>
                    <input type="text" value="<?php echo $good['name'] ?>" name="gname" class="form-control" required>
                    <label class="form-label">description</label>
                    <textarea cols="30" rows="5" name="gdesc" class="form-control" required><?php echo $good['description'] ?></textarea>
                    <label class="form-label">price</label>
                    <input type="number" name="gprice" value="<?php echo $good['price'] ?>" class="form-control" required>
                    <label class="form-label">quantity</label>
                    <input type="number" name="gquantity" value="<?php echo $good['qty'] ?>" class="form-control" required>
                    <label class="form-label">quantity</label>
                    <select name="gcat" class="form-select" required>
                        <?php
                            if($cats != null){
                                foreach($cats as $c){
                                    ?>
                        <option value="<?php echo $c['id']; ?>" <?php if($good['category_id'] == $c['id']) echo "selected"; ?>> <?php echo $c['name']; ?></option>
                         <?php       }
                            }
                        ?>
                    </select>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
            </form>
            <?php
        }
    }
    ?>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Really want to remove???
            </div>
            <div class="modal-footer">
                <form action="deletegood.php" method="POST">
                    <input type="hidden" value="<?php echo $good['id']; ?>" name="gid" class="form-control">
                    <button type="submit" class="btn btn-danger" >YES</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once 'sidebar-bottom.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>