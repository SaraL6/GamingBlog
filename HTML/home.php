<?php
require_once '../source/db_connect.php';
include_once '../source/session.php';

$requete=$base->prepare("SELECT * FROM categories");
$requete->execute(array());

$resultat2=$base->prepare("SELECT * From articles  JOIN categories on articles.id_categorie = categories.id_categorie  Where articles.id_categorie=? ");
$resultat2->execute(array());
$article = $resultat2->fetch();
// echo '<pre>', print_r($article, true) ,'</pre>';



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
                <nav class="top-nav-area w-100 ">
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

                                <li><a href="game-single.php?id_categorie=<?php  echo  $ligne["id_categorie"] ?>">
                                        <?php echo $ligne['intitule_categorie'] ?></a>

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

    <!-- Hero section -->
    <section class="hero-section overflow-hidden">
        <div class="hero-slider owl-carousel">
            <div class="hero-item set-bg d-flex align-items-center justify-content-center text-center"
                data-setbg="img/slider-bg-1.jpg">
                <div class="container">
                    <h2>GG ZONE!</h2>
                    <p>
                        XBOX ONE, PS4, PLAYSTATION VR AND PC GAME REVIEWS!<br />
                    </p>
                    <a href="about.php" class="site-btn">Read More <img src="img/icons/double-arrow.png" alt="#" /></a>
                </div>
            </div>
            <div class="hero-item set-bg d-flex align-items-center justify-content-center text-center"
                data-setbg="img/slider-bg-2.jpg">
                <div class="container">
                    <h2>GG Zone!</h2>
                    <p>
                        Sign in and be part of our community,share articles and more!<br />
                    </p>
                    <a href="#" class="site-btn">Read More <img src="img/icons/double-arrow.png" alt="#" /></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end-->

    <!-- Intro section -->
    <section class="intro-section">
        <div class="container">
            <div class="row">
                <?php   while ($ligne=$resultat2->fetch()) { ?>
                <div class="col-md-4">

                    <div class="intro-text-box text-box text-white">

                        <div class="top-meta"><?php  echo  $ligne["date_creation"] ?>/ in <a
                                href=""><?php  echo  $ligne["intitule_categorie"] ?></a></div>
                        <h3><?php  echo  $ligne["titre"] ?></h3>
                        <p>
                            <?php  echo  $ligne["descriptionn"] ?>
                        </p>
                        <a href="game-single.php?id_article=<?php  echo  $ligne["id_article"] ?>" class="read-more">Read
                            More <img src="img/icons/double-arrow.png" alt="#" /></a><br>
                        <br>

                    </div>
                </div>
                <?php   } ?>

            </div>
        </div>
    </section>
    <!-- Intro section end -->






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