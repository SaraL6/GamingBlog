<?php
require_once 'source/session.php';
require_once 'source/db_connect.php';


if(isset($_POST['login-btn'])){
    $user=$_POST['username'];
    $password=$_POST['password'];

    
    try{
        $requete=$base->prepare("SELECT * FROM utilisateurs WHERE username= :username ");
        $result= $requete->execute(array(':username'=>$user));
      
        while($row = $requete->fetch()){
            $id_user=$row['id_user'];
            $hashed_password=$row['password'];
            $username=$row['username'];
            $id_role=$row['id_role'];

            if(password_verify($password,$hashed_password) && ($id_role=="1") ){
                $_SESSION['id_user']=$id_user;
                $_SESSION['username']=$username;
               
                    header("Location:index2.php");

              
            }else if(password_verify($password,$hashed_password)  && ($id_role=="2")){
                $_SESSION['id_user']=$id_user;
                $_SESSION['username']=$username;
                
                header("Location:user/profile.php");
            }
            else{
                echo"Invalid Username or Password, Please try again";
            }
        
        }
    }
    catch(Exception $e){
        echo "Error";
    }
}

if(isset($_POST['signup-btn'])){
        $username=$_POST['username'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $id_role = 2 ; 
        $hashed_password= password_hash($password,PASSWORD_DEFAULT);

    try{
        $requete =$base->prepare("INSERT INTO utilisateurs(username,nom,prenom,email,password,id_role) Values(:username,:nom,:prenom,:email,:password,:id_role)");
        $result=$requete->execute(array(':username'=>$username,':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':password'=>$hashed_password,':id_role'=>$id_role));

        if($requete->rowCount() == 1){
            $result= header('Location:index.php');
        }
    }
    catch(Exception $e){
        echo "La creation de compte a échouée";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login System</title>
    <link rel="stylesheet" href="css/style1.css?v=<?php echo time(); ?>" />
</head>

<body>

    <section class="left-section">
        <div id="left-cover" class="cover cover-hide">
            <img src="img/mateo-vrbnjak-nCU4yq5xDEQ-unsplash.jpg" alt="" />
            <h1>Welcome to GG Zone!</h1>
            <h3>Already have an account ?</h3>
            <button type="button" class="switch-btn" onclick="location.reload()">
                Login
            </button>
        </div>
        <div id="left-form" class="form fade-in-element">
            <h1>Login</h1>
            <form action="index.php" method="post">
                <input type="text" name="username" class="input-box" placeholder="User Name" />
                <input type="password" name="password" class="input-box" placeholder="Password" />
                <input type="submit" name="login-btn" class="btn" value="Login" />
            </form>
        </div>
    </section>

    <section class="right-section">
        <div id="right-cover" class="cover fade-in-element">
            <img src="img/anas-alshanti-feXpdV001o4-unsplash.jpg" alt="" />
            <h1>Welcome to GG Zone !</h1>
            <h3>Don't have an account ?</h3>
            <button type="button" class="switch-btn" onclick="switchSignup()">
                Signup
            </button>
        </div>
        <div id="right-form" class="form form-hide">
            <h1>Signup</h1>
            <form action="index.php" method="post">
                <input type="text" name="username" class="input-box" placeholder="Username" />
                <input type="text" name="nom" class="input-box" placeholder="Last Name" />

                <input type="text" name="prenom" class="input-box" placeholder="First Name" />
                <input type="email" name="email" class="input-box" placeholder="Email" />
                <input type="password" name="password" class="input-box" placeholder="Password" />
                <input type="submit" name="signup-btn" class="btn" value="Signup" />
            </form>
        </div>
    </section>

    <script src="js/main.js"></script>
</body>

</html>