  <?php
  session_start();
  require_once('model/Manager.php');

        if(isset($_GET['id'])&& !empty($_GET['id']))
        {
                $getid = htmlspecialchars($_GET['id']);

                $req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = ?');
                $req->execute(array($getid));
                $reqacteur = $req->rowCount();

                    $reqcomt = $bdd->prepare('SELECT id_post, names, id_user, id_acteur, post, date_add  FROM post WHERE id_acteur = ?');
                    $reqcomt->execute(array($getid));
                    $reqcomt = $reqcomt->fetch();
                   
                   
                        if(isset($_POST['textcomment']) && !empty ($_POST['textcomment'])) 
                        {
                            $nameuser = htmlspecialchars($_SESSION['prenom']);
                            $comment = htmlspecialchars($_POST['textcomment']);
                            if($reqcomt == 0){

                            $addcomment = $bdd->prepare('INSERT INTO post(names, id_user, id_acteur, post, date_add) VALUES (?, ?, ?, ?,  NOW() )');
                            $addcomment->execute(array($name, $user, $getid, $comment));
                            $addcomment = $addcomment->rowCount();

                            header("Location : comment.php?id=" .$_GET['id']);

                        }else {
                            //header("Location : comment.php?id=" .$_GET['id']);
                            ?>
                        <script>window.alert("interdit d'acces ! Vous ne pouvez commenter qu\'une seul fois !")</script>
                    <?php
                        }
                    }else {
                        header("Location : comment.php?id=" .$_GET['id']);
                    }
                }else {
                    echo 'Selectionner un acteur  !';
                }



$getcomment = $bdd->prepare('SELECT * FROM post WHERE id_acteur = ?');
$getcomment->execute(array($getid));

$getlikes = $bdd->prepare('SELECT COUNT(*) AS like_count FROM vote WHERE id_acteur = :acteur AND vote = :Likes_');
$getlikes->execute(array('acteur' => $getid, 'Likes_' => 'Likes'));
$getlikes = $getlikes->fetch();
$like_count = $getlikes['like_count'];

$getdislikes = $bdd->prepare('SELECT COUNT(*) AS dislike_count FROM vote WHERE id_acteur = :acteur AND vote = :Dislikes_');
$getdislikes->execute(array('acteur' => $getid, 'Dislikes_' => 'Dislikes'));
$getdislikes = $getdislikes->fetch();
$dislike_count = $getdislikes['dislike_count'];

require('pageacteur.php');

