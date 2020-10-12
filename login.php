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

                if(password_verify($password,$hashed_password)){
                    $_SESSION['id_user']=$id_user;
                    $_SESSION['username']=$username;
                header("Location:dashboard.php");
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

?>