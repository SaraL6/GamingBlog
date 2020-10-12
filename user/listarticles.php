<?php
require_once '../source/db_connect.php';
include_once '../source/session.php';

  $titre="";
  $id_article="";
  if(isset($_GET["id_article"]))
  {
    $requete=$base->prepare("DELETE FROM articles WHERE id_article=?");
    $resultat=$requete->execute(array($_GET["id_article"]));

  }

  
$resultat=$base->prepare("SELECT *  From articles where id_user = ?");
$reponse=$resultat->execute(array($_SESSION['id_user']));

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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style3.css">



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
            List of articles
        </div>
        <div class="content">
            <table>
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
                        <td> <a href="listarticles.php?id_article=<?php  echo  $ligne["id_article"] ?>">Delete</a></td>
                    </tr>

                    <?php   } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

</body>

</html>