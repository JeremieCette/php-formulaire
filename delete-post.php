<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<?php session_start(); // Démarage des sessions


if(isset($_GET['fichier'])){ 
    if($_SESSION['token'] == $_GET['token']){ 

        ?>
<div class="container">
        <h2 class="green">Formulaire Post</h2>
        <form action="" method="post" class="form-example">
        
        <div>
          <input type="radio" id="yes" name="choice" value="yes"
                 checked>
          <label for="yes">Yes</label>
        </div>
        <div>
          <input type="radio" id="no" name="choice" value="no">
          <label for="no">No</label>
        </div>
          <div class="form-example">
            <input class="btn-green" type="submit" value="Subscribe!">
          </div>
        </form>
</div>     
            <?PHP
        if(isset($_POST['choice'])){
            if($_POST['choice'] =='yes'){
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
            } else {
                header('Location: mon-compte.php');
            }

        }

    } else { 

        echo 'Jeton de sécurité incorrect';
    } 
      
}
    



