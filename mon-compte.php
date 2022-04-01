<?php session_start(); ?> 

<?php

if( isset( $_SESSION['is_connected'] ) &&  $_SESSION['is_connected'] == TRUE ){
    ?> 
    <div>
        <h3 class="green">Bienvenue sur votre profil<h3>
        <a class="btn btn-green" href="deconnexion.php">Me déconnecter</a>
    </div>
    <?php
    include'back-office.php';
}elseif( !empty($_COOKIE['email']) && (!empty($_COOKIE['password']) && password_verify('SUPER', $_COOKIE['password']) )){
    ?> 
    <div class='row mt-3'>
        <div class="d-flex justify-content-between">
        <h3 class="green">Bienvenue sur votre profil<h3>
        <a class="btn btn-white" href="deconnexion.php">Me déconnecter</a>
        </div>
    </div>
    <?php
    include'back-office.php';
}else{
    echo 'Vous n\'etes pas connecté'.'<br>';
    echo '<a href="sessions.php">Me connecter</a>'.'<br>';
}
?> 
