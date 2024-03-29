<?php
require_once 'source/db_connect.php';
include_once 'source/session.php';


  $id_user="";
  if(isset($_GET["id_user"]))
  {
    $requete=$base->prepare("DELETE FROM utilisateurs WHERE id_user=?");
    $resultat=$requete->execute(array($_GET["id_user"]));

    $_SESSION['message']="User successfully deleted.";
    $_SESSION['msg_type']="danger";

  }

  
$resultat=$base->prepare("SELECT *  From utilisateurs");
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
    <link rel="stylesheet" href="css/stylex.css?v=<?php echo time(); ?>">



</head>

<body>
    <div class="header">
        <div class="logo">
            <i class="fa fa-tachometer"></i>
            <span>GG Zone</span>
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

                    <?php if(!isset($_SESSION['username'])):header('location:logout.php'); ?>
                    <?php else: ?>
                    <?php endif ?>
                    <!-- <?php echo "<h1> Welcome ".$_SESSION['username']."</h1>"?> -->
                    <a href="logout.php">Logout</a>
                </li>
                <li>
                    <a href="#">
                        <span><a href="index2.php"> Add a category</a></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span><a href="admin-addarticle.php"> Add an article</a></span>

                </li>
                <li>
                    <a href="#">
                        <span><a href="adduser.php"> Add a user</a></span>
                    </a>
                </li>
                <li>
                    <a href="admin-listarticles.php">
                        <span>List of articles</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span><a href="admin-listusers.php"> List of users</a></span>
                    </a>
                </li>


            </ul>
        </nav>
    </div>
    <div class="main-content">
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
            <?php 
        echo $_SESSION['message']; 
        unset ($_SESSION['message']);
        ?>
        </div>
        <?php endif ?>
        <div class="title">
            List of users
        </div>
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Id Role</th>
                        <th>Username</th>
                        <th>Edit Role</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   while ($ligne=$resultat->fetch()) { ?>
                    <tr>

                        <td name="id_role"> <?php  echo  $ligne["id_role"] ?></td>
                        <td name="username"><?php  echo  $ligne["username"] ?></td>
                        <td> <a href="admin-editusers.php?id_user=<?php  echo  $ligne["id_user"] ?>">Edit</a>
                        </td>
                        <td> <a href="admin-listusers.php?id_user=<?php  echo  $ligne["id_user"] ?>">Delete</a></td>
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