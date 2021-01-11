<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="title-home">
    <h1>Bienvenue sur l'application dédiée à la présentation des produits financiers du groupe ?</h1>
    <hr>
</div>
    <div class="card-2 text-white bg-dark mb-3" style="max-width: 18rem;max-height: 25rem;">
        <div class="card-body">
            <h3 class="card-title">Bienvenue</h3><br>
            <p>Connectez vous à votre espace</p>
            <p><a href="connexion.php" >Connexion</a></p><br>
            <p>Première visite ? Inscrivez-vous</p>
            <p><a href="inscription.php">Inscription</a></p> 
        </div>
    </div>
    <?php require 'footer.php';?>
</body>

</html>