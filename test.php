<?php
require_once 'source/db_connect.php';
include_once 'source/session.php';

if(isset($_POST['editusers-btn'])){
    $username=$_POST['username'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $id_role = $_POST['id_role'] ; 
    $id_user = $_POST["id_user"];

    $hashed_password= password_hash($password,PASSWORD_DEFAULT);
	
    $requete=$base->prepare("UPDATE utilisateurs SET username=?,nom=?,prenom=?,email=?,password=?, id_role=? WHERE id_user=?");
    $resultat=$requete->execute(array( $username,$nom,$prenom,$email,$hashed_password,$id_role,$_SESSION['id_user']));
    echo '<pre> update : ', print_r($resultat) ,'</pre>';



}

$requete2=$base->prepare("SELECT * FROM utilisateurs");
$requete2->execute(array());

$requete3=$base->prepare("SELECT * FROM utilisateurs Where id_user=?");
$requete3->execute(array($_GET['id_user']));
$ligne2=$requete3->fetch();


 echo '<pre> operation : ', print_r($ligne2) ,'</pre>';

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
                        <span> <a href="admin-listarticles.php"></a> List of articles</span>
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
            Edit a user
        </div>
        <div class="content">
            <form action="admin-editusers.php" method="POST">
                <input type="text" name="username" class="inputarea" placeholder="Username"
                    value="<?php  echo $ligne2["username"] ?>" /> <br>
                <br>
                <input type="text" name="nom" class="inputarea" placeholder="Nom"
                    value="<?php  echo $ligne2["nom"] ?>" /><br>
                <br>
                <input type="text" name="prenom" class="inputarea" placeholder="Prenom"
                    value="<?php  echo $ligne2["prenom"] ?>" /><br>
                <br>
                <input type="email" name="email" class="inputarea" placeholder="Email"
                    value="<?php  echo $ligne2["email"] ?>" /><br>
                <br>
                <input type="password" name="password" class="inputarea" placeholder="Password" /><br>
                <br>

                <input type="text" name="id_role" class="inputarea" placeholder="Role" /><br>
                <br>
                <input type="submit" name="editusers-btn" class="btn" value="Add"><br>

            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="main2.js"></script>
</body>

</html>