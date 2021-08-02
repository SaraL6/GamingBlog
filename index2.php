<?php

require_once 'source/db_connect.php';
include_once 'source/session.php';

if(isset($_POST['addcategory-btn'])){
    $newcategory=$_POST['newcategory'];

    try{
        $requete=$base->prepare("INSERT INTO categories(intitule_categorie)Values(:newcategory)");
        $result=$requete->execute(array(':newcategory'=>$newcategory));

        if($requete->rowCount() == 1){
            $result= header('Location:index2.php');
        }
    }
    catch(Exception $e){
        echo "La creation de catégorie échouée";
    }
}
    

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
    <link rel="stylesheet" href="css/stylex.css">


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
        <div class="title">
            Add a category
        </div>
        <div class="content">
            <form action="addcategory.php" method="POST">

                <input type="text" name="newcategory"><br>
                <br>
                <input type="submit" name="addcategory-btn" class="btn" value="Add"><br>

            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="main2.js"></script>
</body>

</html>