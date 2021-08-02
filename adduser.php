<?php

require_once 'source/db_connect.php';
include_once 'source/session.php';


if(isset($_POST['adduser-btn'])){
    $username=$_POST['username'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $id_role = $_POST['id_role'] ; 
    $hashed_password= password_hash($password,PASSWORD_DEFAULT);

try{
    $requete =$base->prepare("INSERT INTO utilisateurs(username,nom,prenom,email,password,id_role) Values(:username,:nom,:prenom,:email,:password,:id_role)");
    $result=$requete->execute(array(':username'=>$username,':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':password'=>$hashed_password,':id_role'=>$id_role));

    if($requete->rowCount() == 1){
		$_SESSION['message']="User successfully added.";
		$_SESSION['msg_type']="success";
        $result= header('Location:admin-listusers.php');
    }
}
catch(Exception $e){
    echo "La creation de compte a échouée";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
                    <a href="#">
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
            Add a user
        </div>
        <div class="content">
            <form action="adduser.php" method="POST">
                <input type="text" name="username" class="inputarea" placeholder="Username" /> <br>
                <br>
                <input type="text" name="nom" class="inputarea" placeholder="Nom" /><br>
                <br>
                <input type="text" name="prenom" class="inputarea" placeholder="Prenom" /><br>
                <br>
                <input type="email" name="email" class="inputarea" placeholder="Email" /><br>
                <br>
                <input type="password" name="password" class="inputarea" placeholder="Password" /><br>
                <br>

                <input type="text" name="id_role" class="inputarea" placeholder="Role" /><br>
                <br>
                <input type="submit" name="adduser-btn" class="btn" value="Add"><br>

            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="main2.js"></script>
</body>

</html>