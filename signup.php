<?php

require_once 'source/db_connect.php';

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