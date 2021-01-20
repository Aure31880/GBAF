<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>
    <?php require('header.php'); ?>
    <hr>
    <div class="home">
    <div class="title-home">
    <h1>Bienvenue sur l'application dédiée à la présentation des produits financiers du groupe</h1>
</div>
    <div class="card-2 text-white bg-dark mb-3" style="max-width: 25rem;">
        <div class="card-body">
            <h3 class="card-title">Bienvenue</h3><br>
            <p>Connectez vous à votre espace</p>
            <p><a href="connexion.php" class="bouton-redirection">Connexion</a></p><br>
            <p>Première visite ? Inscrivez-vous</p>
            <p><a href="inscription.php" class="bouton-redirection">Inscription</a></p>
        </div>
    </div>
</div>
    <div class="footer-class">
    <div class=footer-content-index>
    <p>Copyright | <a href="#" >Mentions légales </a></p>
    </div>
    </div>
   
</body>
</html>