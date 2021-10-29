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
    <?php require_once '../db.php';
    $cats = getAllCategories();
    ?>
    <form action="addgood.php" method="post" enctype="multipart/form-data">
        <label class="form-label">name</label>
        <input type="text" name="gname" class="form-control" required>
        <label class="form-label">description</label>
        <textarea cols="30" rows="5" name="gdesc" class="form-control" required></textarea>
        <label class="form-label">price</label>
        <input type="number" name="gprice" class="form-control" required>
        <label class="form-label">quantity</label>
        <input type="number" name="gquantity" class="form-control" required>
        <label class="form-label">quantity</label>
        <select name="gcat" class="form-select" required>
            <?php
            if($cats != null){
                foreach($cats as $c){
                    ?>
                    <option value="<?php echo $c['id']; ?>"> <?php echo $c['name']; ?></option>
                <?php       }
            }
            ?>
        </select>
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" name="gpic" id="formFile">
        <button type="submit" class="btn btn-primary mt-3">Add good</button>
    </form>
</div>
<?php require_once 'sidebar-bottom.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>