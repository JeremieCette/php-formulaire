<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<div class="container">
<form method="post">
    <div class="form-example">
        <label class='green mt-3' for="file">Nom du fichier après renommage: </label>
        <input type="text" name="fileR" id="fileR" >
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

if(isset($_POST['fileR'])){
    $fileR = $_POST['fileR'].'.txt';  
    $oldFile = $_GET['fichier'];
    rename("articles/$oldFile", "articles/$fileR");   
    header('Location: mon-compte.php');
}

?>