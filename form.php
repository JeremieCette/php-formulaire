<!-- Suppression dans un formulaire -->
<?php session_start();
// Je recupere le token de session
$token = $_SESSION['token']; ?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<div class="container">
    <form method="post">
    
    <div class="form-example">
        <label class='green mt-3'for="file">Nom du fichier: </label>
        
        <input type="hidden" name="deletePost" />  
        <!-- Je recupere la valeur deletePost en post -->
        <input type="text" name="fichier" id="fichier" >
        <!-- Je recupere la valeur du fichier a supprimer -->
        <input type="hidden" name="token" value="<?=$token?>" />
        <!-- Je recupere la valeur le token en post -->
    </div>
    <div class="form-example">
        <input class="btn btn-green mt-3" type="submit" value="Subscribe!">
    </div>
    </form>
</div>
<?php

if(isset($_POST['deletePost'])){ // Si on a demandé à supprimer le post

    // Pour récuperer mes fichiers existants
    $scandir = scandir("C:\wamp64\www\php-procedural\9-cookies-et-sessions\articles");
    
    $scandir = array_diff($scandir, array('..', '.'));
    
    // Je stocke la valeur de ce que je veux supprimer
    $delete = "articles/".$_POST['fichier'];
 
    // Je boucle sur tout mes fichiers
    foreach($scandir as $fichier){
        // Si mon fichier renseigné est égale à l'un des fichiers ou je boucle je passe à l'autre test
        
        if($fichier == $_POST['fichier'] ){
            
            if($_SESSION['token'] == $_POST['token']){ // Si le token reçu est le même que celui stocké en session
                
                if(unlink($delete)){
                    echo '<div class="container">';
                    echo '<p class="green mt-3">Le fichier a bien été supprimé</p>'.'<br/>';
                    echo '<a class="btn btn-green mt-3" href="mon-compte.php">Retour</a>';
                    echo '</div>';
                    die;
                }else{
                    echo '<div class="container">';
                    echo '<p class="green mt-3">Erreur</p>'.'<br/>';
                    echo '<a class="btn btn-green mt-3" href="mon-compte.php">Retour</a>';
                    echo '</div>';
                    die;
                }
        
            }else{ // Si le token reçu et le token stocké en session sont différents
        
                echo 'Jeton de sécurité incorrect';
            }
        } else{ // Si le fichier n'est pas présent
            echo 'Ce fichier n\'est pas présent dans la base';
            die;
        }
    }
 
      
}



    
    

    ?>  