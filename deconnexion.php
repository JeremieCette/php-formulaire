<?php session_start(); ?> 

<?php
echo 'veux tu vraiment te déconnecter';
?> 
<!-- Form de deconnexion -->
<form action="">

<p>Es tu sur de vouloir te deco:</p>

<div>
  <input type="radio" id="oui" name="oui" value="oui">
  <label for="oui">Oui</label>
</div>
<div>
  <input type="radio" id="non" name="non" value="non">
  <label for="non">Non</label>
</div>
  <div class="form-example">
    <input type="submit" value="Confirmer">
  </div>
</form>

<?php
// Si il n'est pas vide
if(!empty($_GET))
  {
    //Si $_GET = non
    if(($_GET['non']))
    {
        // Je renvoi sur mon-compte
        header('location:mon-compte.php');
    }
      else
    {
       // Je renvoi sur sessions
        session_destroy(); 
        setcookie('email');
        unset($_COOKIE['email']);
        setcookie('password');
        unset($_COOKIE['password']);
        header('location:sessions.php');
    }
  }


