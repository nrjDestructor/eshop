<?php
require_once('db.php');
if(isset($_GET['category']))
    $goods = getGoodByCat($_GET['category']);
else $goods = getAllGoods();

$cats = getAllCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>EShop Homepage</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="eshop.php">EShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Товары</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach($cats as $cat){
                            ?>
                            <li><a class="dropdown-item" href="<?php echo 'eshop.php?category='.$cat['id']; ?>"><?php echo $cat['name']; ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <a class="btn btn-outline-dark" href="basket.php">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">
                        <?php
                        session_start();
                        if(isset($_SESSION['cart']))
                            echo count($_SESSION['cart']);
                        else
                            echo "0";
                        ?>
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- Header-->
<!--Section: Block Content-->
<div class="container">
    <section>

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-8">

                <!-- Card -->
                <div class="mb-3">
                    <div class="pt-4 wish-list">

                        <h5 class="mb-4">Cart (<span>2</span> items)</h5>

                        <?php
                            if(isset($_SESSION['cart'])){
                                foreach($_SESSION['cart'] as $good){

                        ?>

                        <div class="row mb-4">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                    <img class="img-fluid w-100"
                                         src="<?php echo "images/".$good['gpic']; ?>" alt="Sample">
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-9 col-xl-9">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><?php echo $good['gname']; ?></h5>
                                        </div>
                                        <div>
                                            <div class="def-number-input number-input safari_only mb-0 w-100">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                        class="minus decrease">-</button>
                                                <input type="hidden" value="<?php echo $good['gid']; ?>">
                                                <input class="quantity" min="0" name="quantity" value="<?php echo $good['gnum']; ?>" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                        class="plus increase">+</button>
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                                (Note, 1 piece)
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <form action="removefromcard.php" method="post">
                                                <input type="hidden" name="gid" value="<?php echo $good['gid']; ?>">
                                                <button type="submit" class="card-link-secondary small text-uppercase mr-3"><i
                                                        class="fas fa-trash-alt mr-1"></i> Remove item </button>
                                            </form>
                                        </div>
                                        <p class="mb-0"><span><strong id="summary"><?php echo $good['gnum']*$good['gprice']; ?></strong></span></p class="mb-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4">

                <!-- Card -->
                <div class="mb-3">
                    <div class="pt-4">

                        <h5 class="mb-3">The total amount of</h5>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Temporary amount
                                <span>$25.98</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Gratis</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>The total amount of</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong>$53.98</strong></span>
                            </li>
                        </ul>

                        <form action="buygood.php" method="post">
                            <button type="submit" class="btn btn-primary btn-block">BUY</button>
                        </form>

                    </div>
                </div>
                <!-- Card -->

                <!-- Card -->
                <div class="mb-3">
                    <div class="pt-4">

                        <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"
                           aria-expanded="false" aria-controls="collapseExample">
                            Add a discount code (optional)
                            <span><i class="fas fa-chevron-down pt-1"></i></span>
                        </a>

                        <div class="collapse" id="collapseExample">
                            <div class="mt-3">
                                <div class="md-form md-outline mb-0">
                                    <input type="text" id="discount-code" class="form-control font-weight-light"
                                           placeholder="Enter discount code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--Grid column-->

        </div>
        <!-- Grid row -->

    </section>
    <!--Section: Block Content-->
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
    </footer>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/script.js"></script>
</body>
</html>