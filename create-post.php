<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<div class="container">
    <form>
        <div class="form-example">
            <label class='green mt-3' for="file">Nom du fichier: </label>
            <input type="text" name="file" id="file" >
        </div>
        <div>
            <label class='green mt-3' for="file">Entrez votre texte: </label>
        </div>
        <div>
            <textarea class="mt-3" id="story" name="story" rows="5" cols="33"></textarea>
        </div>
        <div class="form-example">
            <input class="btn btn-green mt-3" type="submit" />
        </div>
    </form>
</div>

<?php


if(isset($_GET['file'])){
    // Je recupere la valeur du champ renseigné
    $fileName = htmlentities($_GET['file']).'.txt'; 
    // Je recupere la valeur du texte area
    $text = htmlentities($_GET['story']);
    // Je créer un fichier texte qui a le nom de $fileName et je l'ouvre
    $file = fopen('articles/'.$fileName, 'w+'); 
    // Je mets dans mon fichier $file le contenu de $text
    fputs($file,$text);
    // Je ferme le fichier $file
    fclose($file); 
    header('Location: mon-compte.php');
}


