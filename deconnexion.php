<?php session_start(); ?> 

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<div class="container">
  <form action="">

  <p class="green mt-3">Es tu sur de vouloir te deconnecter:</p>

  <div>
    <input type="radio" id="oui" name="oui" value="oui">
    <label for="oui">Oui</label>
  </div>
  <div>
    <input type="radio" id="non" name="non" value="non">
    <label for="non">Non</label>
  </div>
    <div class="form-example">
      <input class="btn btn-green mt-3" type="submit" value="Confirmer">
    </div>
  </form>
</div>

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


