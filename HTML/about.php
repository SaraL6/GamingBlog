<?php
require_once '../source/db_connect.php';
include_once '../source/session.php';

 
$requete=$base->prepare("SELECT * FROM categories");
$requete->execute(array());

$resultat2=$base->prepare("SELECT articles.id_article,articles.titre,articles.image_article,articles.descriptionn,articles.date_creation,categories.intitule_categorie From articles,categories where articles.id_categorie = categories.id_categorie ");
$response2=$resultat2->execute(array());



?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>EndGam - Gaming Magazine Template</title>
    <meta charset="UTF-8" />
    <meta name="description" content="EndGam Gaming Magazine Template" />
    <meta name="keywords" content="endGam,gGaming, magazine, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/animate.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style5.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section">
        <div class="header-warp">
            <div class="header-social d-flex justify-content-end">
                <p>Follow us:</p>
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
            <div class="header-bar-warp d-flex">
                <!-- site logo -->
                <a href="home.html" class="site-logo">
                    <img src="./img/logo.png" alt="" />
                </a>
                <nav class="top-nav-area w-100">
                    <div class="user-panel">
                        <?php if(isset($_SESSION['username'])) { ?>
                        <a href="../user/profile.php"><?php echo $_SESSION['username']?><a href=""></a>

                            <?php }else{ ?>
                            <a href="../index.php">Login</a> / <a href="../index.php">Register</a>
                            <?php } ?>
                    </div>
                    <!-- Menu -->
                    <ul class="main-menu primary-menu">
                        <li><a href="home.php">Home</a></li>
                        <li>
                            <a href="games.php">Games</a>
                            <ul class="sub-menu">
                                <?php   while ($ligne=$requete->fetch()) { ?>

                                <li><a href="game-single.php"> <?php echo $ligne['intitule_categorie'] ?></a>

                                </li>

                                <?php  } ?>

                            </ul>
                        </li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <?php if(isset($_SESSION['username'])) { ?>

                        <li><a href="../user/profile.php">Dashboard</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header section end -->

    <!-- Page top section -->
    <section class="page-top-section set-bg" data-setbg="img/page-top-bg/2.jpg">
        <div class="page-info">
            <h2>About</h2>
            <div class="site-breadcrumb">
                <a href="">Home</a> /
                <span>About</span>
            </div>
        </div>
    </section>
    <!-- Page top end-->

    <!-- Review section -->
    <section class="review-section">
        <div class="container">

            <div class="review-item">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="review-pic">
                            <img src="img/review/1.jpg" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="review-content text-box text-white">
                            <h3>About GG Zone</h3>
                            <p>
                                Hardcore gamers eat, drink, breathe and practically live their whole lives playing their
                                favorite games. For the rest of us mortals, games are but an escape to other worlds.
                                Games, from the simple to the complicated, have always served good entertainment value.
                                They can also be a way of life–something to be treated with passionate interest, which
                                can sometimes border on obsession.</p>

                            <p>GG Zone gives you a healthy dose of balanced news and views on the latest games today.
                                Whether you’re a gaming maniac, or you’re just the occasional gamer, playing a few
                                rounds of solitaire on your mobile phone to pass the time while lining up at the bank,
                                we would have something interesting for you to read or learn.</p>

                            <p>Reach for glory! Not the reset button!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Review section end-->


    <!-- Footer section -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-left-pic">
                <img src="img/footer-left-pic.png" alt="" />
            </div>
            <div class="footer-right-pic">
                <img src="img/footer-right-pic.png" alt="" />
            </div>
            <a href="#" class="footer-logo">
                <img src="./img/logo.png" alt="" />
            </a>
            <ul class="main-menu footer-menu">
                <li><a href="">Home</a></li>
                <li><a href="">Games</a></li>
                <li><a href="">Reviews</a></li>
                <li><a href="">News</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <div class="footer-social d-flex justify-content-center">
                <a href="#"><i class="fa fa-pinterest"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
            <div class="copyright">
                <a href="">Colorlib</a> 2018 @ All rights reserved
            </div>
        </div>
    </footer>
    <!-- Footer section end -->

    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky-sidebar.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>