<?php
session_start();
require_once('model/MAnager.php');


if(isset($_SESSION['id_user']) && !empty($_SESSION['id_user']))
{
   
    $req = $bdd->prepare("SELECT * FROM  account WHERE id_user = ? ");
    $req->execute(array($_SESSION['id_user'])); 
    $userinfo = $req->fetch();

?>
<html>

<head>
    <title>Profil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>

    <!-- HEADER -->
    <div class="info">
        <img src="images/logo.jpg" width="150" height="150">
        <div class="info-name">
            <h4>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    <path fill-rule="evenodd"
                        d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                </svg>

                <?= $userinfo['nom'];?> <?= $userinfo['prenom']; ?>
            </h4>
            <br>
            <a href="profil.php?id=<?php echo $_SESSION['id_user']; ?>"> Retour à la page
                profil</a></em>
        </div>
        <?php
         if(isset($_SESSION['id']) AND $userinfo['id_user'] == $_SESSION['id_user ']) {
         }      
}
         ?>
    </div>
    <hr>

    <?php

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $getid = htmlspecialchars($_GET['id']);

    $req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = ?');
    $req->execute(array($getid));
    while($posts = $req->fetch()) {
        ?>

    <div class="section-presentation">
        <div class="logo-profil">
            <img src="<?= htmlspecialchars($posts['logo']); ?>" alt="logo-partenaire" />
        </div>
        <br>
        <div class="title-acteur">
            <h2><?= htmlspecialchars($posts['acteur']); ?></h2>
        </div>
        <div class="text-acteur">
            <p class="content-acteur"><?= nl2br(htmlspecialchars($posts['description'])); ?>
        </div>
        <hr>

        <?php 
        $req->closeCursor();

        $getcomment = $bdd->prepare('SELECT * FROM post WHERE id_acteur = ?');

                if(isset($_POST['formcomment'])) {

                        if(isset($_POST['name'], $_POST['comment']) && !empty($_POST['name']) AND !empty($_POST['comment'])) {
                                $name = htmlspecialchars($_POST['name']);
                                $comment = htmlspecialchars($_POST['comment']);

                                $addcomment = $bdd->prepare('INSERT INTO post (id_post, name, id_user, id_acteur, post, date_add)VALUES (?, ?, ?, ?, ?, NOW() ');
                                $addcomment->execute(array($name,$userinfo['id_user'],$getid, $comment));
                                echo 'votre commentaire à été posté !';
                        }else {
                                echo 'Tous les champs doivent etre complété !';
                        }
                }else {
                        echo 'erreur formulaire !';
                }
?>
        <div class="section-commentaire">
            <h3>Commentaires</h3>
            <div class="button-comment">
                <a href="#" class="js-modal">Ajouter un commentaire</a> 
            </div>

            <div class="btn-group">
                <a href="#" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-thumbs-up">
                        <path
                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                        </path>
                    </svg></a>
                <a href="#" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-thumbs-down">
                        <path
                            d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17">
                        </path>
                    </svg></a>
            </div>
            <div class="comment">
                <?php 
                          while($data = $getcomment->fetch())
                          {
                              ?>
                <p><?= htmlspecialchars($data['post']);?></p>
            </div>
        </div>
        <?php
    }
    }
}
    ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript" src="app.js"></script>
</body>