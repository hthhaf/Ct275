<?php
    require_once('../database/dbhelper.php');
    require_once('signup.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aurora flower</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-light sticky-top">
            <div class="container-fluid">
                <a class="navbar-branch" href="index.php">
                    <img src="../common/images/aurora.jpg" height="50">
                </a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#category" href="#category">Category</a>
                        </li>
                        <li class="nav-item">
                            <form  method="get">
                                <input id="search" name="search" type="text" placeholder="Search...">
                            </form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#signup" href="#signup">Sign up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="inner">

            <div class="row-inner">
                <div class="introduce col-6">
                    <h1>Aurora Flower</h1>
                    <p>This Online Flowers Shop provides all its Customers with an ultimate Shopping Experience. They offer Bouquets, Fresh Floral Arrangements, Dried Flowers, Artificial Flowers and other floral items at Affordable Prices.</p>
                    <button id="loadmore">
                        <a data-toggle="modal" data-target="#login" href="#login">Order Now</a>
                    </button>
                </div>

            </div>
        </div>
    </header>

    <!-- Category -->
    <div class="modal fade" id="category">
        <div class="modal-dialog mwb_form_modal modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close mwb_close_btn" data-dismiss="modal">&times;</button>
                <div class="modal-body">
                    <div class="mwb_subscribe_form_wrap">
                        <h1><span>CATEGORY</span></h1>
                        <hr>
                        <form class="needs-validation" novalidate>
                            <div class="form-row">
                                <?php
                                $sql          = 'select * from category';
                                $categoryList = executeResult($sql);

                                foreach ($categoryList as $item) {
                                    echo ' <div class="col-md-6 mb-3">
                                                <label class="radio-inline temp-custom-radio-button temp-radio-button-subscribe">
                                                        <input name="category" value="' . $item['id'] . '" type="radio"> ' . $item['name'] . '
                                                            <span class="temp-radio-checkmark"></span>
                                                </label>
                                            </div>';
                                }
                                ?>
                            </div>
                            <hr>
                            <div class="mwb_form_btn_wrap">
                                <button class="btn btn-primary mwb_form_btn" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End category -->

    <!-- Sign up -->
    <div class="modal fade" id="signup">
        <div class="modal-dialog mwb_form_modal modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close mwb_close_btn" data-dismiss="modal">&times;</button>
                <div class="modal-body">
                    <div class="mwb_registration_form_wrap">
                        <h2><span style="margin-left: 15px;">Sign up to score great deals!</span></h2>
                        <br>
                        <div class="agileits-top">
                            <form action="index.php" method="post">
                                <input class="signup text" type="text" value="<?=$username?>" name="username" placeholder="Username" required="">
                                <input class="signup text email" type="email" value="<?=$email?>" name="email" placeholder="Email" required="">
                                <input class="signup text" type="password"  name="password" placeholder="Password" required="">
                                <?=$pw?'':'<div style="margin-left: 20px;"><font color=red>Passwords do not match</font></div>' ?>
                                <input class="signup text w3lpass" type="password"  name="confirmpassword" placeholder="Confirm Password" required="">
                                <div class="sign wthree-text">
                                    <label class="anim">
                                        <input type="checkbox" class="checkbox" required="">
                                        <span>I Agree To The Terms & Conditions</span>
                                    </label>
                                    <div class="clear"> </div>
                                </div>
                                <input class="sign" id="loadmore" type="submit" value="SIGN UP">
                            </form>
                            <p class="sign">Do you have an Account? <a data-toggle="modal" data-target="#login" href="#login">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====  End ====-->

    <!-- Log in -->
    <div class="modal fade" id="login">
        <div class="modal-dialog mwb_form_modal modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close mwb_close_btn" data-dismiss="modal">&times;</button>
                <div class="modal-body">
                    <div class="mwb_registration_form_wrap">
                        <h1 style="text-align: center;"><span>LOG IN!</span></h1>
                        <br>
                        <div class="agileits-top">
                            <form action="index.php" method="post">
                                <input class="signup text" type="text" name="name" placeholder="Username" required="">
                                <input class="signup text" type="new-password" name="pass" placeholder="Password" required="">
                                <input id="loadmore" class="sign" type="submit" value="SIGN UP">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1>PRODUCTS</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid padding">
        <div class="row padding">

            <?php
            $limit = 8;
            $page = 1;

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }

            $firstIndex = ($page - 1) * $limit;

            $search = '';
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
            }

            $additional = '';
            if (!empty($search)) {
                $additional = 'and title like "%' . $search . '%"';
            }

            $sql          = 'select product.title, product.price, product.thumbnail, product.content from product where 1 ' . $additional . ' limit ' . $firstIndex . ', ' . $limit;
            $productList = executeResult($sql);

            $sql = 'select count(id) as total from product where 1 ' . $additional;
            $countResult = executeSingleResult($sql);
            $number = 0;
            if ($countResult != null) {
                $count = $countResult['total'];
                $number = ceil($count / $limit);
            }

            foreach ($productList as $item) {
                echo '
                                <div class="col-md-3">
                                    <div id="card" class="card">
                                        <img class="thumbnail" src="../common/images/' . $item['thumbnail'] . '">
                                        <div class="card-body"><h6> ' . $item['title'] . ' </h6>
                                            <p class="card-text">$' . $item['price'] . '</p>
                                            <div class="row">
                                                    <div  id="load"> <b> Load More </b></div>
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
            }
            ?>
        </div>
        <div class="loadmore">
            <button id="loadmore">Loadmore</button>
        </div>
    </div>
    <div id="ab" class="about">
        <div class="row padding">
            <div class="col-lg-4">
                <img src="../common/images/bgp.jpg" class="img-fluid">
            </div>

            <div id="about" class="col-lg-7">
                <h2>ABOUT US...</h2>
                <p>Flowers make a wonderful surprise for any occasion. Whether you’re brightening up their birthday, celebrating their anniversary, expressing your thanks, offering your sympathy or just letting them know that you care, you can easily say it with flowers of all kinds from UrbanStems. It’s easy to find just the right arrangement for everyone in your life.</p>
                <p>Not only are they beautiful, but the best flower bouquets are also farm-fresh! From roses and carnations to scabiosa and solomio flowers, there’s a blossom for every occasion. With lush, shapely greenery serving as an elegant backdrop, these flowers stand out and add a pop of stunning color and style to any home or office.</p>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-12">
                <h1>CONTACT US</h1>
            </div>
            <div class="col-12 social padding">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-md-4">
                    <h4>Working hours</h4>
                    <p>Monday-Friday: 9am - 9pm</p>
                    <p>Weekend: 8am - 12am</p>
                </div>
                <div class="col-md-4">
                    <h4>Address</h4>
                    <p>+84 123456789</p>
                    <p>Nguyen Van Cu Street, Nink Kieu, Can Tho</p>
                </div>
                <div class="col-md-4">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2738.204406498174!2d105.78128300462663!3d10.039026391906347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a063f698d728d3%3A0xd64ae134d2d133cf!2sHavana%20Flowers!5e0!3m2!1svi!2s!4v1640097581334!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <hr class="light">
                <div class="col-12">
                    <hr class="light-100">
                    <h5>&copy; AURORA</h5>
                </div>
            </div>
        </div>
    </footer>
</body>
<script>

</script>

</html>