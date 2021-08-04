<?php
require_once '../source/db_connect.php';
include_once '../source/session.php';

$id_article="";
  
$requete=$base->prepare("SELECT * FROM categories");
$requete->execute(array());

$resultat2=$base->prepare("SELECT articles.titre,articles.image_article,articles.descriptionn,articles.date_creation,articles.contenu,articles.id_article,categories.intitule_categorie From articles,categories where articles.id_categorie = categories.id_categorie AND id_article=?");
$resultat2->execute(array($_GET['id_article']));
$article = $resultat2->fetch();
echo '<pre>', print_r($article, true) ,'</pre>';
// echo "<pre>";
// 	var_dump($article);
// 	echo "</pre>";
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


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
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
    <section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg">
        <div class="page-info">
            <h2>Games</h2>
            <div class="site-breadcrumb">

                <a href="">Category</a>
                /
                <a href=""><?php  echo  $article["intitule_categorie"] ?></a>

            </div>
        </div>
    </section>
    <!-- Page top end-->


    <!-- Games section -->

    <section class="games-single-page">
        <div class="container">
            <div class="game-single-preview">

                <img src="<?php  echo  $article["image_article"] ?>" alt="" name=" image_article" class="w-100 h-75">

            </div>
            <div class="row">

                <div class="col-xl-9 col-lg-8 col-md-7 game-single-content">
                    <div class="gs-meta">

                        <?php  echo  $article["date_creation"] ?>/ in
                        <a href=""><?php  echo  $article["intitule_categorie"] ?></a>
                    </div>
                    <h2 class="gs-title"><?php  echo  $article["titre"] ?></h2>
                    <h4><?php  echo  $article["descriptionn"] ?></h4>
                    <p><?php  echo  $article["contenu"] ?></p>
                    <div class="geme-social-share pt-5 d-flex">
                        <p>Share:</p>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-4 col-md-5 sidebar game-page-sideber">
                    <div id="stickySidebar">
                        <div class="widget-item">
                            <div class="rating-widget">
                                <h4 class="widget-title">Ratings</h4>
                                <ul>
                                    <li>Price<span>3.5/5</span></li>
                                    <li>Graphics<span>4.5/5</span></li>
                                    <li>Levels<span>3.5/5</span></li>
                                    <li>Levels<span>4.5/5</span></li>
                                    <li>Dificulty<span>4.5/5</span></li>
                                </ul>
                                <div class="rating">
                                    <h5><i>Rating</i><span>4.5</span> / 5</h5>
                                </div>
                            </div>
                        </div>
                        <div class="widget-item">
                            <div class="testimonials-widget">
                                <h4 class="widget-title">Testimonials</h4>
                                <div class="testim-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolo re magna aliqua. Quis ipsum suspend isse ultrices.
                                    </p>
                                    <h6><span>James Smith,</span>Gamer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Games end-->

    <section class="game-author-section">
        <div class="container">
            <div class="game-author-pic set-bg" data-setbg="img/author.jpg"></div>
            <div class="game-author-info">
                <h4>Written by: <?php echo $_SESSION['username']?></h4>
                <p>Vivamus volutpat nibh ac sollicitudin imperdiet. Donec scelerisque lorem sodales odio ultricies, nec
                    rhoncus ex lobortis. Vivamus tincid-unt sit amet sem id varius. Donec elementum aliquet tortor.
                    Curabitur justo mi, efficitur sed eros alique.</p>
            </div>
        </div>
        <br>
        <br>
    </section>
    <!-- comment section -->
    <section class="contact-page">
        <div class="container">
            <?php if(isset($_SESSION['username'])) { ?>
            <h3 style="color:white">Comments</h3>
            <form method="POST" id="comment_form">
                <div class="form-group">
                    <br>
                    <br>
                    <input type="hidden" name="comment_name" id="comment_name" class="form-control"
                        value="<?php echo $_SESSION['username'] ?>" />
                </div>
                <div class="form-group">
                    <textarea name="comment_content" id="comment_content" class="form-control"
                        placeholder="Enter Comment" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <!-- value 0 means no parent comment, value=value of the parent comment(comment_id) -->
                    <input type="hidden" name="comment_id" id="comment_id" value="0" />
                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                </div>
            </form>
            <?php } ?>
            <span id="comment_message"></span>
            <br />
            <div id="display_comment"></div>
        </div>
    </section>
    <br>
    <!-- comment section end -->




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
    <!-- <script src="js/jquery-3.2.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky-sidebar.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>
<script>
// wait for the document to be loaded
$(document).ready(function() {

    // when you click submit btn of comment_form apply function
    $('#comment_form').on('submit', function(event) {

        // prevent the submit btn from refreshing
        event.preventDefault();

        // convert the form data into as string so it can be sent with ajax
        // we take whatever is inside the form tag turn it into a string
        var form_data = $(this).serialize();

        $.ajax({
            // point to ajax which code its gonna send the form_data to
            url: "add_comment.php",
            method: "POST",
            data: form_data,
            dataType: "JSON",
            // once the code in  add_comment.php is executed:
            success: function(data) {
                console.log({
                    data
                })
                // accessing error that's inside data 
                // != opposite of ==
                if (data.error != '') {
                    // select the form inside the jquery selector,at its index and we reset the form
                    $('#comment_form')[0].reset();
                    // takes the error from add_comment and puts it in the html of comment_message(comment_message was an empty span)
                    $('#comment_message').html(data.error);
                    // we set the value of the hidden input back to 0
                    $('#comment_id').val('0');
                    load_comment();
                }
            }
        })
    });

    load_comment();

    function load_comment() {
        $.ajax({
            url: "fetch_comment.php",
            method: "POST",
            success: function(data) {
                $('#display_comment').html(data);
            }
        })
    }

    $(document).on('click', '.reply', function() {
        // $this refers to the clicked reply btn 
        // we access its attributes and get the id
        var comment_id = $(this).attr("id");
        // we select the hidden input
        // then we replace its value with the var comment id
        $('#comment_id').val(comment_id);
        // when we click on reply the name input box gets focused
        $('#comment_name').focus();
    });

});
</script>