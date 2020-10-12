<?php
require_once '../source/db_connect.php';
include_once '../source/session.php';

  $titre="";
  $id_article="";
  $ligne=ucfirst($ligne);

  
$resultat=$base->prepare("SELECT username,email,nom,prenom,avatar From utilisateurs where id_user = ?");
$reponse=$resultat->execute(array($_SESSION['id_user']));
$ligne=$resultat->fetch();




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
    <link rel="stylesheet" href="../css/style3.css">


    <style>

    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <i class="fa fa-tachometer"></i>
            <span>Brand</span>
        </div>
        <a href="#" class="nav-trigger"><span></span></a>
    </div>
    <div class="side-nav">
        <div class="logo">
            <span>Dashboard</span>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="#">
                        <span><a href="profile.php">Profile</a></span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span><a href="addarticle.php"> Add an article</a></span>
                    </a>
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

            <div class="container"></div>
            <div class="row py-5 px-4">
                <div class="col-md-5 col-lg-12 mx-auto">
                    <!-- Profile widget -->
                    <div class="bg-white shadow rounded overflow-hidden">
                        <div class="px-4 pt-0 pb-4 cover">
                            <div class="media align-items-end profile-head">
                                <div class="profile mr-3"><img
                                        src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                        alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="#"
                                        class="btn btn-outline-dark btn-sm btn-block">Edit profile</a></div>
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
                                    <h5 class="font-weight-bold mb-0 d-block">215</h5><small class="text-muted"> <i
                                            class="fas fa-image mr-1"></i>Photos</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">745</h5><small class="text-muted"> <i
                                            class="fas fa-user mr-1"></i>Followers</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">340</h5><small class="text-muted"> <i
                                            class="fas fa-user mr-1"></i>Following</small>
                                </li>
                            </ul>
                        </div>
                        <div class="px-4 py-3">
                            <h5 class="mb-0">About</h5>
                            <div class="p-4 rounded shadow-sm bg-light">
                                <p class="font-italic mb-0">
                                    <?php echo ($ligne['email'])?></< /p>
                                <p class="font-italic mb-0">Lives in New York</p>
                                <p class="font-italic mb-0">Photographer</p>
                            </div>
                        </div>
                        <div class="py-4 px-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="mb-0">Recent articles</h5><a href="#" class="btn btn-link text-muted">Show
                                    all</a>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-2 pr-lg-1"><img
                                        src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                        alt="" class="img-fluid rounded shadow-sm">
                                    <p class="font-italic mb-0">Lives in New York</p>
                                </div>

                                <div class="col-lg-6 mb-2 pl-lg-1"><img
                                        src="https://images.unsplash.com/photo-1493571716545-b559a19edd14?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                        alt="" class="img-fluid rounded shadow-sm">
                                    <p class="font-italic mb-0">Lives in New York</p>
                                </div>

                                <div class="col-lg-6 pr-lg-1 mb-2"><img
                                        src="https://images.unsplash.com/photo-1453791052107-5c843da62d97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                                        alt="" class="img-fluid rounded shadow-sm">
                                    <p class="font-italic mb-0">Lives in New York</p>
                                </div>

                                <div class="col-lg-6 pl-lg-1"><img
                                        src="https://images.unsplash.com/photo-1475724017904-b712052c192a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                        alt="" class="img-fluid rounded shadow-sm">
                                    <p class="font-italic mb-0">Lives in New York</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- <table>
            <thead>
                <tr>
                    <th>Article Id</th>
                    <th>Article</th>
                    <th>image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php   while ($ligne=$resultat->fetch()) { ?>
                <tr>

                    <td name="id_article"> <?php  echo  $ligne["id_article"] ?></td>
                    <td name="titre"><?php  echo  $ligne["titre"] ?></td>
                    <td name="image_article"><img src="<?php  echo  $ligne["image_article"] ?>" alt=""
                            style="width:50px;height:50px;"></td>
                    <td> <a
                            href="editarticle.php?id_article=<?php  echo  $ligne["id_article"] ?>&titre=<?php  echo  $ligne["titre"] ?>&descriptionn=<?php  echo  $ligne["descriptionn"] ?>&contenu=<?php  echo  $ligne["contenu"] ?>">Edit</a>
                    </td>
                    <td> <a href="listarticles.php?id_article=<?php  echo  $ligne["id_article"] ?>">Delete</a>
                    </td>
                </tr>

                <?php   } ?>
            </tbody>
        </table> -->
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