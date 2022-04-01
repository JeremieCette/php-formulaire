<!-- Suppression dans un formulaire -->
<?php session_start();
// Je recupere le token de session
$token = $_SESSION['token']; ?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<div class="container">
    <form method="post" enctype="multipart/form-data"> 
    
    <div class="form-example mt-3">
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />  <!-- 2 Mo -->  
        <input type="hidden" name="token" value="<?=$token?>"> 
        <input type="file" name="photo" required/>  
    </div>
    <div class="row">
        <div class="form-example col-1">
            <input class="btn btn-green mt-3" type="submit" value="Send!">
        </div>
        <div class="col-1">
            <a class="btn btn-green mt-3" href="mon-compte.php">Retour</a>
        </div>
    </div>
    </form>
    
</div>

<?php
/********************************************************************
***************************  Fonctions  *****************************
*********************************************************************/
//   Fonction pour renvoyer une date
function dateNow(){
    $now = date("m-d-y-His");
    return $now;
}

// Répertoire pour les photos
$uploads_dir = 'uploads';
// Si il n'y a pas de dossier uploads il est créer
if (!is_dir($uploads_dir)) {
    mkdir($uploads_dir, 0777, true);
}

if (isset($_FILES['photo'])){
    // Si $_FILES['photo'] est initialisé
    if (!empty($_FILES['photo']['name'])){
        if (($_FILES['photo']['type'] == 'image/png' || $_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/jpg' || $_FILES['photo']['type'] == 'image/gif')) {
            // Si il y a bien le token de session
            if($_SESSION['token'] == $_POST['token']){
                // Si $_FILES['photo'] est supérieur à 1Ko est inférieur à 7Mo
                if(1000<=($_FILES['photo']['size'])&& ($_FILES['photo']['size'])<=7000000){
                // Je reccupere tmp_name
                $tmp_name = $_FILES["photo"]["tmp_name"];
                // Je recupere le nom de $_FILES['photo']
                $name = basename($_FILES["photo"]["name"]);
                
                // Si le fichier existe déjà
                if (file_exists("$uploads_dir/$name")) {
                // Je recupere l'extension de mon fichier
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                // J'explose $name
                $nameArray = explode('.',$name);
                // J'utilise la premiere partie de $name
                $name = $nameArray[0];
                $date = dateNow();
                // Je renomme mon fichier avec une fonction aleatoire
                $name = $name."_".$date.".".$ext;
                // Je déplace la photo dans mon dossier
                $move = move_uploaded_file($tmp_name, "$uploads_dir/$name");
                } else {
                // Je déplace la photo dans mon dossier
                $move = move_uploaded_file($tmp_name, "$uploads_dir/$name");
                }
                // Je recupere la taille de mes photos
                $taille = getimagesize("$uploads_dir/$name");
                    // Si la taille en longueur et largeur est plus grande que 50Px et plus petite que 8000Px
                    if((50<=$taille[0] && $taille[0]<=8000) && (50<=$taille[1] && $taille[1]<=8000)){
                    // Si $move est initialisé
                        if($move) {
                        echo '<div class="container">';
                        echo '<p>La photo a bien été envoyée.</p>';
                        echo '<img class="img-fluid" src="uploads/' . $name . '">';
                        echo '</div>';
                        }
                    }else{
                        echo '<p>Merci d\'envoyer une image comprise entre 50x50Px et 8000x8000Px</p>';
                    }
                }else{
                    echo '<p>Merci d\'envoyer une image comprise entre 1Ko et 7 Mo</p>';
                    }
            }else{
                echo '<p>Jeton de sécurité incorrect</p>';
            }
        }else{
        echo '<p>Le fichier doit être au format *.jpeg, *.jpg, *.gif ou *.png .</p>';
        }
    }else{
        echo '<p>Il n\'y a rien a envoyé</p>';
    }       
}



        

    

    ?>