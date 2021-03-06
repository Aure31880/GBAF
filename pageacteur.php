<?php

session_start();
require_once('model/Manager.php');
include('redirection.php');

      if(isset($_GET['id'])&& !empty($_GET['id']))
      {
              $getid = htmlspecialchars($_GET['id']);

              //Répération des données de l'acteur selectionné
              $req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = ?');
              $req->execute(array($getid));
              $reqacteur = $req->rowCount();

                //Récupération des commentaires correspondant à l'acteur
                  $reqcomt = $bdd->prepare('SELECT * FROM post WHERE id_user = ? AND id_acteur = ?');
                  $reqcomt->execute(array($_SESSION['id_user'], $getid));
                  $reqcomt = $reqcomt->fetch();
                 
                 
                      if(isset($_POST['textcomment']) && !empty ($_POST['textcomment'])) 
                      {
                          
                          $comment = htmlspecialchars($_POST['textcomment']);
                          if($reqcomt == 0){

                          $addcomment = $bdd->prepare('INSERT INTO post(id_user, id_acteur, post, date_add) VALUES (?, ?, ?,  NOW() )');
                          $addcomment->execute(array($_SESSION['id_user'], $getid, $comment));
                          $addcomment = $addcomment->rowCount();

                          header("Location : pageacteur.php?id=" .$_GET['id']);

                      }else {
                          ?>
<script>
window.alert("interdit d'acces ! Vous ne pouvez commenter qu\'une seul fois !");
</script>
<?php
                      }
                  }else {
                      header("Location : pageacteur.php?id=" .$_GET['id']);
                  }
              }else {
                  echo 'Selectionner un acteur  !';
              }

// Récupération du nombre de commentaire
$getcountcomment = $bdd->prepare('SELECT COUNT(*) AS comment_count FROM post a WHERE id_acteur  = :acteur ');
$getcountcomment->execute(array('acteur' =>$getid));
$getcountcomment = $getcountcomment->fetch();
$countcomment = $getcountcomment['comment_count'];

// Récupération des commentaires 
$getcomment = $bdd->prepare('SELECT *, DATE_FORMAT(p.date_add, \'%d-%m-%Y\')  AS date_add FROM post p INNER JOIN account a ON a.id_user = p.id_user WHERE id_acteur  = ? ORDER BY date_add DESC');
$getcomment->execute(array($getid));

// Reéupération des votes 
$getlikes = $bdd->prepare('SELECT COUNT(*) AS like_count FROM vote WHERE id_acteur = :acteur AND vote = :Likes_');
$getlikes->execute(array('acteur' => $getid, 'Likes_' => 'Likes'));
$getlikes = $getlikes->fetch();
$like_count = $getlikes['like_count'];

$getdislikes = $bdd->prepare('SELECT COUNT(*) AS dislike_count FROM vote WHERE id_acteur = :acteur AND vote = :Dislikes_');
$getdislikes->execute(array('acteur' => $getid, 'Dislikes_' => 'Dislikes'));
$getdislikes = $getdislikes->fetch();
$dislike_count = $getdislikes['dislike_count'];
?>
<html lang="fr">

<head>
    <title>Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>

    <!-- HEADER -->
    <header class="user-info">
        <div class="info">
            <img src="images/logo.jpg" id="img-logo-profil" alt="..." class="img-thumbnail">
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
                    <?= $_SESSION['nom'];?> <?= $_SESSION['prenom']; ?>
                </h4>
                <br>
                <div class="info-button">
                    <a class="back-profil" href="profil.php"> Retour à la page
                        profil</a>
                </div>
            </div>
            </div>
    <?php
while($infoacteur = $req->fetch())
{
?>
    </header>
    <hr>

    <!-- Section acteurs -->
    <section class="acteur">
        <article>
            <div class="logo-profil">
                <img src="<?= htmlspecialchars($infoacteur['logo']); ?>" class="rounded mx-auto d-block"
                    id="logo-acteur" alt="logo-acteur">
            </div>
            <br>
            <div class="title-acteur">
                <h1><?= htmlspecialchars($infoacteur['acteur']); ?></h1>
            </div>
            <div class="content-acteur">
                <p><?= nl2br(htmlspecialchars($infoacteur['description'])); ?>
            </div>
            </div>
        </article>
    </section>
    <hr>
    <?php
}
$req->closeCursor();
?>
    <!-- Section commentaire -->
    <section class="notice" id="comment-add">
        <h3><?= $countcomment; ?> Commentaires</h3>
        <asside>
            <div class="add-comment">
                <a href="#text-comment" class="js-modal">Ajouter un commentaire</a>
            </div>
        </asside>
        <asside>
            <div class="add-notice">
                <a href="likeanddislike.php?t=1&id=<?= $getid ?> " class="likes"><svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" width="24" height="24">
                        <path fill-rule="evenodd"
                            d="M12.596 2.043c-1.301-.092-2.303.986-2.303 2.206v1.053c0 2.666-1.813 3.785-2.774 4.2a1.866 1.866 0 01-.523.131A1.75 1.75 0 005.25 8h-1.5A1.75 1.75 0 002 9.75v10.5c0 .967.784 1.75 1.75 1.75h1.5a1.75 1.75 0 001.742-1.58c.838.06 1.667.296 2.69.586l.602.17c1.464.406 3.213.824 5.544.824 2.188 0 3.693-.204 4.583-1.372.422-.554.65-1.255.816-2.05.148-.708.262-1.57.396-2.58l.051-.39c.319-2.386.328-4.18-.223-5.394-.293-.644-.743-1.125-1.355-1.431-.59-.296-1.284-.404-2.036-.404h-2.05l.056-.429c.025-.18.05-.372.076-.572.06-.483.117-1.006.117-1.438 0-1.245-.222-2.253-.92-2.941-.684-.675-1.668-.88-2.743-.956zM7 18.918c1.059.064 2.079.355 3.118.652l.568.16c1.406.39 3.006.77 5.142.77 2.277 0 3.004-.274 3.39-.781.216-.283.388-.718.54-1.448.136-.65.242-1.45.379-2.477l.05-.384c.32-2.4.253-3.795-.102-4.575-.16-.352-.375-.568-.66-.711-.305-.153-.74-.245-1.365-.245h-2.37c-.681 0-1.293-.57-1.211-1.328.026-.243.065-.537.105-.834l.07-.527c.06-.482.105-.921.105-1.25 0-1.125-.213-1.617-.473-1.873-.275-.27-.774-.455-1.795-.528-.351-.024-.698.274-.698.71v1.053c0 3.55-2.488 5.063-3.68 5.577-.372.16-.754.232-1.113.26v7.78zM3.75 20.5a.25.25 0 01-.25-.25V9.75a.25.25 0 01.25-.25h1.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25h-1.5z">
                        </path>
                    </svg>J'aime</a><?= '(' . $like_count .')' ?>
                <a href="likeanddislike.php?t=2&id=<?= $getid ?>" class="dislikes"><svg
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill-rule="evenodd"
                            d="M12.596 21.957c-1.301.092-2.303-.986-2.303-2.206v-1.053c0-2.666-1.813-3.785-2.774-4.2a1.864 1.864 0 00-.523-.13A1.75 1.75 0 015.25 16h-1.5A1.75 1.75 0 012 14.25V3.75C2 2.784 2.784 2 3.75 2h1.5a1.75 1.75 0 011.742 1.58c.838-.06 1.667-.296 2.69-.586l.602-.17C11.748 2.419 13.497 2 15.828 2c2.188 0 3.693.204 4.583 1.372.422.554.65 1.255.816 2.05.148.708.262 1.57.396 2.58l.051.39c.319 2.386.328 4.18-.223 5.394-.293.644-.743 1.125-1.355 1.431-.59.296-1.284.404-2.036.404h-2.05l.056.429c.025.18.05.372.076.572.06.483.117 1.006.117 1.438 0 1.245-.222 2.253-.92 2.942-.684.674-1.668.879-2.743.955zM7 5.082c1.059-.064 2.079-.355 3.118-.651.188-.054.377-.108.568-.16 1.406-.392 3.006-.771 5.142-.771 2.277 0 3.004.274 3.39.781.216.283.388.718.54 1.448.136.65.242 1.45.379 2.477l.05.385c.32 2.398.253 3.794-.102 4.574-.16.352-.375.569-.66.711-.305.153-.74.245-1.365.245h-2.37c-.681 0-1.293.57-1.211 1.328.026.244.065.537.105.834l.07.527c.06.482.105.922.105 1.25 0 1.125-.213 1.617-.473 1.873-.275.27-.774.456-1.795.528-.351.024-.698-.274-.698-.71v-1.053c0-3.55-2.488-5.063-3.68-5.577A3.485 3.485 0 007 12.861V5.08zM3.75 3.5a.25.25 0 00-.25.25v10.5c0 .138.112.25.25.25h1.5a.25.25 0 00.25-.25V3.75a.25.25 0 00-.25-.25h-1.5z">
                        </path>
                    </svg>J'aime pas</a> <?= '(' . $dislike_count .')' ?>
            </div>
        </asside>
        </div>
    </section>
    <br>

    <?php

    while($reqcomment = $getcomment->fetch())
        {
                ?>
    <section class="comment">
        <div class="card bg-light mb-3" id="card-mb3">
            <div class="card-header">De <?= htmlspecialchars($reqcomment['username']); ?> le :
                <?= htmlspecialchars($reqcomment['date_add']);?></div>
            <div class="card-body" id="card-body">
                <p class="text-justify"><?= htmlspecialchars($reqcomment['post']);?></p>
            </div>
        </div>
        </div>
    </section>

    <?php
        }
        $getcomment->closeCursor();
        ?>

    <section>
        <div class="card text-dark bg-light mb-3" id="card-mb3">
            <form method="post">

                <label for="names" class="form-label" id="formComment">Poster un commentaire en tant que :</label>
                <p><?= $_SESSION['username']; ?></p>
                <textarea class="form-control" id="text-comment" name="textcomment" rows="8" required></textarea>
                <input type="hidden" name="prenom" value="<?= htmlspecialchars($_SESSION['username']);?>">
                <button type="submit" id="button-comment" class="btn btn-success" value="formenvoie">Envoyez</button>
            </form>
        </div>
        </div>
    </section>

    <?php 
require('footer.php');
?>
</body>

</html>