<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<div class="container">
    <form method="post">
        <div>
            <h3 class='green mt-3'>Entrer votre texte</h3>
            <textarea id="storyR" name="storyR" rows="5" cols="33"><?php 
            $fichier = $_GET['fichier'];
            $fichierL = file_get_contents('articles/'.$fichier,FILE_USE_INCLUDE_PATH);
            echo "$fichierL"; ?></textarea>
        </div>
        <div class="form-example">
            <input class="btn btn-green mt-3" type="submit" />
        </div>
    </form>
</div>



<?PHP


if(isset($_POST['storyR'])){
    
    $fileName =$_GET['fichier']; 
    $file = fopen('articles/'.$fileName, 'w+'); 
    $text = $_POST['storyR'];
    fputs($file,$text);
    fclose($file); 
    header('Location: mon-compte.php');
} 