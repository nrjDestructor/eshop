<?php
    session_start();
    $gid = $_GET['id'];
    require_once 'db.php';

    $good = getGood($gid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo "images/".$good['image']; ?>" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: BST-498</div>
                <h1 class="display-5 fw-bolder"><?php echo $good['name']; ?></h1>
                <div class="fs-5 mb-5">
                    <span><?php echo $good['price']; ?></span>
                </div>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<!--COMMENTSECTION-->
<section id="comments">
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="d-flex flex-column comment-section" id="myGroup">
                <div class="bg-white p-2">
                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2">
                            <span class="d-block font-weight-bold name">Marry Andrews</span>
                            <span class="date text-black-50">Shared publicly - Jan 2020</span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                    </div>
                </div>
                <div class="bg-white p-2">
                    <div class="d-flex flex-row fs-12">
                        <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                        <div class="like p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-1" href="#collapse-1"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                        <div class="like p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-2" href="#collapse-2"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                    </div>
                </div>
                <div id="collapse-1" class="bg-light p-2 collapse" data-parent="#myGroup">
                    <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"><textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                    <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                </div>
                <div id="collapse-2" class="bg-light p-2 collapse" data-parent="#myGroup">
                    <div class="d-flex flex-row align-items-start"><i class="fa fa-facebook border p-3 rounded mr-1"></i><i class="fa fa-twitter border p-3 rounded mr-1"></i><i class="fa fa-linkedin border p-3 rounded mr-1"></i><i class="fa fa-instagram border p-3 rounded mr-1"></i><i class="fa fa-dribbble border p-3 rounded mr-1"></i> <i class="fa fa-pinterest-p border p-3 rounded mr-1"></i> </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--COMMENTSECTION-->
<!--NEWREPLY-->
<div class="arlan">
    <div class="row">
        <div class="col-2"> <img src="https://i.imgur.com/xELPaag.jpg" width="70" class="rounded-circle mt-2"> </div>
        <div class="col-10">
            <div class="comment-box ml-2">
                <h4>Add a comment</h4>
                <div class="comment-area"> <textarea id="commentText" class="form-control" placeholder="what is your view?" rows="4"></textarea>
                    <input type="hidden" id="uid" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['id']; ?>">
                    <input type="hidden" id="gid" value="<?php echo $_GET['id'] ?>">
                </div>
                <div class="comment-btns mt-2">
                    <div class="row">
                        <div class="col-6">
                            <div class="pull-left"> <button class="btn btn-success btn-sm">Cancel</button> </div>
                        </div>
                        <div class="col-6">
                            <div class="pull-right"> <button id="commentButton" class="btn btn-success send btn-sm">Send <i class="fa fa-long-arrow-right ml-1"></i></button> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--NEWREPLY-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scriptsComment.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/scriptcomment.js"></script>
</body>
</html>