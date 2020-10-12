<?php
    $base= new PDO('mysql:host=localhost;dbname=gamingblog;charset=utf8',"root","");


    try{
            $base= new PDO('mysql:host=localhost;dbname=gamingblog;charset=utf8',"root","");
        
        }
        catch(Exception $e){
            echo "La connexion a echouée";
        }

?>