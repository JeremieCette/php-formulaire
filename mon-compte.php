<?php session_start(); ?> 

<?php

if( isset( $_SESSION['is_connected'] ) &&  $_SESSION['is_connected'] == TRUE ){
    echo 'Bienvenue sur votre profil'.'<br>';
    echo '<a href="deconnexion.php">Me déconnecter</a>'.'<br>';
}elseif( !empty($_COOKIE['email']) && (!empty($_COOKIE['password']) && password_verify('SUPER', $_COOKIE['password']) )){
    echo 'Bienvenue sur votre profil'.'<br>';
    echo '<a href="deconnexion.php">Me déconnecter</a>'.'<br>';
}else{
    echo 'Vous n\'etes pas connecté'.'<br>';
    echo '<a href="sessions.php">Me connecter</a>'.'<br>';
}
?> 
