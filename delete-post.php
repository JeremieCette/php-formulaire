<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<?php session_start(); // Démarage des sessions


if(isset($_GET['fichier'])){ 

    if($_SESSION['token'] == $_GET['token']){ 
        $delete = "articles/".$_GET['fichier'];
        if(unlink($delete)){
            echo '<div class="container">';
            echo '<p class="green mt-3">Le fichier a bien été supprimé</p>'.'<br/>';
            echo '<a class="btn btn-green mt-3" href="mon-compte.php">Retour</a>';
            echo '</div>';
        }else{
            echo '<div class="container">';
            echo '<p class="green mt-3">Erreur</p>'.'<br/>';
            echo '<a class="btn btn-green mt-3" href="mon-compte.php">Retour</a>';
            echo '</div>';
        }

    }else{ 

        echo 'Jeton de sécurité incorrect';
    } 
      
}
    



