<?php
require_once '../source/db_connect.php';
include_once '../source/session.php';

  
$requete=$base->prepare("SELECT * FROM categories");
$requete->execute(array());

$resultat2=$base->prepare("SELECT articles.id_article,articles.titre,articles.image_article,articles.descriptionn,articles.date_creation,categories.intitule_categorie From articles,categories where articles.id_categorie = categories.id_categorie ");
$response2=$resultat2->execute(array());
//  while($ligne = $resultat2->fetch())
//  {
// 	 echo "<pre>";
// 	var_dump($ligne);
// 	echo "</pre>";
//  }



 ?>





<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>EndGam - Gaming Magazine Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="EndGam Gaming Magazine Template">
    <meta name="keywords" content="endGam,gGaming, magazine, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


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
                    <img src="./img/logo.png" alt="">
                </a>
                <nav class="top-nav-area w-100">
                    <div class="user-panel">
                    <?php if(isset($_SESSION['username'])) { ?>
                        <a href="../user/profile.php"><?php echo $_SESSION['username']?>
                        
                        <?php }else{ ?>
                            <a href="../index.php">Login</a> / <a href="../index.php">Register</a>
                        <?php } ?>

                        

                    </div>
                    <!-- Menu -->
                    <ul class="main-menu primary-menu">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="games.php">Categories</a>
                            <ul class="sub-menu">
                                <li><a href="game-single.php">Blog post</a></li>
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
    <section class="page-top-section set-bg" data-setbg="img/page-top-bg/3.jpg">
        <div class="page-info">
            <h2>Blog</h2>
            <div class="site-breadcrumb">
                <a href="">Home</a> /
                <span>Blog</span>
            </div>
        </div>
    </section>
    <!-- Page top end-->


    <!-- Blog page -->
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <ul class="blog-filter">
                        <?php   while ($ligne=$requete->fetch()) { ?>

                        <li><a href="#">
                                <?php echo $ligne['intitule_categorie'] ?>
                            </a>
                        </li>
                        <?php  } ?>

                    </ul>

                    <div class="big-blog-item">
                        <?php   while ($ligne=$resultat2->fetch()) { ?>

                        <img src="<?php  echo  $ligne["image_article"] ?>" alt="" name=" image_article"
                            class="blog-thumbnail w-100 h-75">
                        <div class="blog-content text-box text-white">
                            <div class="top-meta"> <?php  echo  $ligne["date_creation"] ?> in <a
                                    href=""><?php  echo  $ligne["intitule_categorie"] ?></a>
                            </div>
                            <h3><?php  echo  $ligne["titre"] ?></h3>
                            <p><?php  echo  $ligne["descriptionn"] ?></p>
                            <a href="game-single.php?id_article=<?php  echo  $ligne["id_article"] ?>"
                                class="read-more">Read More <img src="img/icons/double-arrow.png" alt="#" /></a><br>
                            <br>
                            <hr style="background-color: #d3d3d3">
                        </div>
                        <?php   } ?>

                    </div>
                    <div class="site-pagination">
                        <a href="#" class="active">01.</a>
                        <a href="#">02.</a>
                        <a href="#">03.</a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-5 sidebar">
                    <div id="stickySidebar">
                        <div class="widget-item">
                            <form class="search-widget" method="POST">
                                <input type="text" name="search">
                                <button>  search</button>
                            </form>
                        </div>
                        <div class="widget-item">
                            <h4 class="widget-title">Trending</h4>
                            <div class="trending-widget">
                                <div class="tw-item">
                                    <div class="tw-thumb">
                                        <img src="./img/blog-widget/1.jpg" alt="#">
                                    </div>
                                    <div class="tw-text">
                                        <div class="tw-meta">11.11.18 / in <a href="">Games</a></div>
                                        <h5>The best online game is out now!</h5>
                                    </div>
                                </div>
                                <div class="tw-item">
                                    <div class="tw-thumb">
                                        <img src="./img/blog-widget/2.jpg" alt="#">
                                    </div>
                                    <div class="tw-text">
                                        <div class="tw-meta">11.11.18 / in <a href="">Games</a></div>
                                        <h5>The best online game is out now!</h5>
                                    </div>
                                </div>
                                <div class="tw-item">
                                    <div class="tw-thumb">
                                        <img src="./img/blog-widget/3.jpg" alt="#">
                                    </div>
                                    <div class="tw-text">
                                        <div class="tw-meta">11.11.18 / in <a href="">Games</a></div>
                                        <h5>The best online game is out now!</h5>
                                    </div>
                                </div>
                                <div class="tw-item">
                                    <div class="tw-thumb">
                                        <img src="./img/blog-widget/4.jpg" alt="#">
                                    </div>
                                    <div class="tw-text">
                                        <div class="tw-meta">11.11.18 / in <a href="">Games</a></div>
                                        <h5>The best online game is out now!</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-item">
                            <div class="categories-widget">
                                <h4 class="widget-title">categories</h4>
                                <ul>

                                    <li><a href="">Games</a></li>
                                    <li><a href="">Gaming Tips & Tricks</a></li>
                                    <li><a href="">Online Games</a></li>
                                    <li><a href="">Team Games</a></li>
                                    <li><a href="">Community</a></li>
                                    <li><a href="">Uncategorized</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-item">
                            <h4 class="widget-title">Latest Comments</h4>
                            <div class="latest-comments">
                                <div class="lc-item">
                                    <img src="./img/blog-widget/1.jpg" class="lc-avatar" alt="#">
                                    <div class="tw-text"><a href="">Maria Smith</a> <span>On</span> The best online game
                                        out there </div>
                                </div>
                                <div class="lc-item">
                                    <img src="./img/blog-widget/2.jpg" class="lc-avatar" alt="#">
                                    <div class="tw-text"><a href="">Maria Smith</a> <span>On</span> The best online game
                                        out there </div>
                                </div>
                                <div class="lc-item">
                                    <img src="./img/blog-widget/3.jpg" class="lc-avatar" alt="#">
                                    <div class="tw-text"><a href="">Maria Smith</a> <span>On</span> The best online game
                                        out there </div>
                                </div>
                                <div class="lc-item">
                                    <img src="./img/blog-widget/4.jpg" class="lc-avatar" alt="#">
                                    <div class="tw-text"><a href="">Maria Smith</a> <span>On</span> The best online game
                                        out there </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-item">
                            <a href="#" class="add">
                                <img src="./img/add.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog page end-->


    <!-- Newsletter section -->
    <section class="newsletter-section">
        <div class="container">
            <h2>Subscribe to our newsletter</h2>
            <form class="newsletter-form">
                <input type="text" placeholder="ENTER YOUR E-MAIL">
                <button class="site-btn">subscribe <img src="img/icons/double-arrow.png" alt="#" /></button>
            </form>
        </div>
    </section>
    <!-- Newsletter section end -->


    <!-- Footer section -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-left-pic">
                <img src="img/footer-left-pic.png" alt="">
            </div>
            <div class="footer-right-pic">
                <img src="img/footer-right-pic.png" alt="">
            </div>
            <a href="#" class="footer-logo">
                <img src="./img/logo.png" alt="">
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
            <div class="copyright"><a href="">Colorlib</a> 2018 @ All rights reserved</div>
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