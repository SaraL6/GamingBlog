<?php
require_once '../source/db_connect.php';
include_once '../source/session.php';

  $titre="";
  $id_article="";
//    $ligne=ucfirst($ligne);

 

  
$resultat=$base->prepare("SELECT username,nom,prenom,email From utilisateurs where id_user = ?");
$reponse=$resultat->execute(array($_SESSION['id_user']));
$ligne=$resultat->fetch();



$resultat2=$base->prepare("SELECT titre,image_article From articles where id_user = ?");
$response2=$resultat2->execute(array($_SESSION['id_user']));
$ligne2=$resultat2->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responsive vertical menu navigation</title>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/stylex.css">


    <style>

    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <i class="fa fa-tachometer"></i>
            <h3>Dashboard</h3>
        </div>
        <a href="#" class="nav-trigger"><span></span></a>
    </div>
    <div class="side-nav">
        <div class="logo">
            <span>GG Zone</span>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="#">
                        <span><a href="../HTML/home.php">Home</a></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span><a href="profile.php">Profile</a></span>
                    </a>
                </li>

                <li>

                    <span><a href="addarticle.php"> Add an article</a></span>

                </li>

                <li>
                    <a href="#">
                        <span><a href="listarticles.php"> Liste of articles</a></span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    <div class="main-content">
        <div class="title">
            Profile
        </div>
        <div class="content">
            <div class="container">
                <div class="row py-4 px-4">
                    <div class="col-md-5 col-lg-12 mx-auto">
                        <!-- Profile widget -->
                        <div class="bg-white shadow rounded overflow-hidden">
                            <div class="px-4 pt-0 pb-4 cover">
                                <div class="media align-items-end profile-head">
                                    <div class="profile mr-3">

                                        <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                            alt="..." width="130" class="rounded mb-2 img-thumbnail"><a
                                            href="../index.php" class="btn btn-outline-dark btn-sm btn-block">
                                            <?php if(!isset($_SESSION['username'])):header('location:logout.php'); ?>
                                            <?php else: ?>
                                            <?php endif ?>
                                            Logout</a>
                                    </div>
                                    <div class="media-body mb-5 text-white">
                                        <h4 class="mt-0 mb-0">
                                            <?php echo ucfirst($ligne['nom'])." ".ucfirst($ligne['prenom']) ?></h4>
                                        <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light p-4 d-flex justify-content-end text-center">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <h5 class="font-weight-bold mb-0 d-block">4</h5><small class="text-muted">
                                            Articles</small>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-weight-bold mb-0 d-block">745</h5><small class="text-muted">
                                            Followers</small>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-weight-bold mb-0 d-block">340</h5><small class="text-muted">
                                            Following</small>
                                    </li>
                                </ul>
                            </div>
                            <div class="px-4 py-3">
                                <h5 class="mb-0">About</h5>
                                <div class="p-4 rounded shadow-sm bg-light">
                                    <p class="font-italic mb-0">
                                        <?php echo ($ligne['email'])?></p>
                                    <p class="font-italic mb-0">Lives in New York</p>
                                    <p class="font-italic mb-0">Photographer</p>
                                </div>
                            </div>
                            <div class="py-4 px-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h5 class="mb-0">Articles</h5>
                                </div>
                                <div class="row">
                                    <?php   while ($ligne=$resultat2->fetch()) { ?>
                                    <div class="col-lg-6 mb-2 pr-lg-1">
                                        <img src="<?php  echo  $ligne["image_article"] ?>" alt="" name="image_article"
                                            class="img-fluid rounded shadow-sm img-thumbnail w-100 h-75">

                                        <br>
                                        <p class=" font-italic mb-0" name="titre"><?php  echo  $ligne["titre"] ?></p>
                                        <br>
                                    </div>
                                    <?php   } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

</body>

</html>