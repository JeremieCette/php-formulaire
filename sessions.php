<?php session_start(); ?> <!-- Demarrage de la session (Crée le PHPSESSID) -->

<?php // VOUS N'AVEZ PAS BESOIN DE CA
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
// VOUS N'AVEZ PAS BESOIN DE CA ?>


<!-- Traitement des données --> <?php 
    if( isset( $_SESSION['is_connected'] ) &&  $_SESSION['is_connected'] == TRUE ) {

        echo 'La personne a reussi à se connecter'.'<br>';
        echo '<a href="mon-compte.php">Connecte moi</a>';

        // Vérification si cookie ok
    }  elseif( isset( $_POST['email'] ) 
    && $_POST['email'] == 'contact@agence-upgrade.fr' 
    && isset( $_POST['password'] ) 
    && $_POST['password'] == 'SUPER' 
    && isset( $_POST['oui'] )){

        header('location:mon-compte.php');
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // Parametrage des cookies
        setcookie( 'email', $email,['expires' => time()+365*24*3600, 'secure' => true, 'httponly' => true]);
        setcookie( 'password', $password ,['expires' => time()+365*24*3600, 'secure' => true, 'httponly' => true]);

        
        
        // Connection avec cookie
    }elseif( !empty( ($_COOKIE['email'])) 
    && $_COOKIE['email'] == 'contact@agence-upgrade.fr'  
    && (!empty($_COOKIE['password']) && password_verify('SUPER', $_COOKIE['password']) ) ) {
        
        header('location:mon-compte.php');

        // Connection sans cookie
    }elseif(isset( $_POST['email'] ) 
    && $_POST['email'] == 'contact@agence-upgrade.fr' 
    && isset( $_POST['password'] ) 
    && $_POST['password'] == 'SUPER'){

        $_SESSION['is_connected'] = TRUE;
        header('location:mon-compte.php');
        
        // Si email nok
    } elseif (!empty($_POST['email']) && $_POST['email'] != 'contact@agence-upgrade.fr'  ){
       // Affichage du formulaire
        displayForm();
        ?>
        <div class="container">
             <div class="alert alert-light d-flex align-items-center col-3 mt-3" role="alert">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                 <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                 </svg>
            <div>
                 Email incorrect
            </div>
        </div>
        </div>
        <?php
        // Si MDP nok
    } elseif (!empty($_POST['password']) && $_POST['password'] != 'SUPER'){
        // Affichage du formulaire
        displayForm();
        ?>
        <div class="container">
             <div class="alert alert-light d-flex align-items-center col-3 mt-3" role="alert">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                 <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                 </svg>
            <div>
                 Mot de passe incorrect
            </div>
        </div>
        </div>
        <?php
        
        // Sinon
    } else {
        // Affichage du formulaire
        displayForm();   
    }
    ?>
    <?php
    function displayForm(){
        ?>
     <!DOCTYPE html>
     <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <div class="container">
        <h2 class="green">Formulaire de connexion</h2>
    <form method="post">
         <div class="form-example">
            <label for="email">Entrez votre email: </label>
            <input class="mt-3" type="email" name="email" id="email" >
        </div>
        <div class="form-example">
            <label for="password">Entrez votre mot de passe: </label>
            <input class="mt-3" type="password" name="password" id="password" >
        </div>
        <div class="form-example">
            <input class="mt-3" type="checkbox" id="oui" name="oui" value="oui">
            <label for="oui">Rester connecté</label>
            </div>
        <div class="form-example">
            <input class="btn btn-green mt-3  p-2" type="submit" />
        </div>
    </form>
    </div>
    </html>
<?php
    }
    ?>