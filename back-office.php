<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Document</title>
</head>
<?php 
    $token = base_convert(hash('sha256', time() . mt_rand()), 16, 36);
    $_SESSION['token'] = $token;
    ?>
<body class="container">
    <div>
        <h3 class="green">Mes articles</h3>
        <a href="create-post.php" class="btn btn-success mt-4 mx-2"><i class="fa-solid fa-pen"> </i> Create post</a>
        <a href="form.php" class="btn btn-success mt-4 mx-2">Delete with form</a>
        <a href="fileForm.php" class="btn btn-success mt-4 mx-2">Send image</a>
    </div>
    <br>
    
<?php 

$scandir = scandir("C:\wamp64\www\php-procedural\9-cookies-et-sessions\articles");
foreach($scandir as $fichier){
    if($fichier !='.' && $fichier !='..'){
        echo "<a href='articles/$fichier' class='btn-green mx-2 text-decoration-none'>$fichier</a><br/>".'  '.
        "<a href='rename-post.php?fichier=$fichier' class='mt-4 mx-2 btn btn-primary'><i class='fa-solid fa-file-pen light'></i>Rename</a> ".'  '.
        "<a href='modify-post.php?fichier=$fichier' class='mt-4 mx-2 btn btn-warning'><i class='fa-solid fa-book-open-reader'></i>Modify</a> ".'  '.
        "<a href='delete-post.php?fichier=$fichier&token=$token' class='mt-4 mx-2 btn btn-danger'><i class='fa-solid fa-trash-can'></i>Delete</a><br/><hr/>";
    } 
}
?>


</body>
</html>

