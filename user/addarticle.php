<?php

require_once '../source/db_connect.php';
include_once '../source/session.php';


if(isset($_POST['addarticle-btn'])){
	$content=$_POST['editor'];
    $titre=$_POST['titre'];
    $description=$_POST['descriptionn'];
    $categorie=$_POST['categorie'];
    $chemin = '' ;

    if(isset($_FILES['image_article'])   and $_FILES['image_article']['error'] == 0)
    {
          if($_FILES['image_article']['size'] < 1000000 )
          {
            //   echo '<pre>', print_r($_FILES, true) ,'</pre>';
              $liste_extensions = array('png', 'jpg', 'jpeg', 'gif');
              $details = pathinfo($_FILES['image_article']['name']);
           
              $extension = $details['extension'];
              $resultat = in_array($extension, $liste_extensions); 
              if($resultat == true)
              {
                  move_uploaded_file($_FILES['image_article']['tmp_name'], '../img/'.$details['basename']);
                  $chemin = '../img/'.$details['basename'] ;    
              }
          }
    }

    try{
        $requete=$base->prepare("INSERT INTO articles(titre,descriptionn,contenu,image_article,id_user,id_categorie) values(?,?,?,?,?,?)");
        $result=$requete->execute(array($titre,$description,$content,$chemin,$_SESSION['id_user'],$categorie));
        
        if($requete->rowCount() == 1){
            $result= header('Location:listarticles.php');
        }
    }
    catch(Exception $e){
        echo "La creation de catégorie échouée";
    }
}

$requete2=$base->prepare("SELECT * FROM categories");
$requete2->execute(array());

    

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
    <link rel="stylesheet" href="../css/stylex.css?v=<?php echo time(); ?>">



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
            <span>GG Zone</span>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="#">
                        <span><a href="../HTML/home.php">Home</a></span>
                    </a>
                </li>
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
                        <span><a href="listarticles.php"> My articles</a></span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    <div class="main-content">
        <div class="title">
            Add an article
        </div>
        <div class="content">
            <form action="addarticle.php" method="POST" enctype="multipart/form-data">
                <label for="">Titre</label>
                <input type="text" name="titre" class="inputarea"><br>
                <br>
                <label for="">Description</label>
                <input type="text" name="descriptionn" class="inputarea2"><br>
                <br>
                <label for="">Categorie</label>
                <select name="categorie" id="">
                    <?php while($ligne = $requete2->fetch() ) { ?>
                    <option value="<?php echo $ligne['id_categorie'] ?>"> <?php echo $ligne['intitule_categorie'] ?>
                    </option>
                    <?php  } ?>
                </select>
                <br>

                <label for="file-upload" class="custom-file-upload">
                    <i class="fa fa-cloud-upload"></i> Upload image
                </label>
                <input id="file-upload" type="file" name="image_article">
                <br>
                <textarea name="editor" id="editor"></textarea>
                <br>
                <input type="submit" name="addarticle-btn" class="btn" value="Add"><br>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace('editor');
    </script>
</body>

</html>