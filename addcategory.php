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