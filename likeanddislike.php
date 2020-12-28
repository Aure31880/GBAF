<?php
session_start();
require_once('model/Manager.php');

if(isset($_GET['t'], $_GET['id'], $_SESSION['id_user']) && !empty($_GET['t'])  && !empty($_GET['id']) AND !empty($_SESSION['id_user']))
{
    $user = (int) $_SESSION['id_user'];
    $getid = (int) $_GET['id'];
    $getavis = (int) $_GET['t'];

    $getvote = $bdd->prepare('SELECT vote FROM vote WHERE id_user = ? AND id_acteur = ?');
    $getvote->execute(array($user, $getid));
    $getvote = $getvote->fetch();

    if($getvote == 0)
    {

    if($getavis == 1)
    {
        $getavis = 'Likes';
        $insertelike = $bdd->prepare('INSERT INTO vote (id_user, id_acteur, vote)VALUES (:id_user, :id_acteur, :vote)');
        $insertelike->execute(array(
            'id_user' => $user,
            'id_acteur' => $getid,
            'vote' => $getavis ));
            $insertelike->closeCursor();
        header('Location: '.$_SERVER['HTTP_REFERER']);

    } elseif($getavis == 2) {
        $getavis2 = 'Dislikes';
        $inserdislike = $bdd->prepare('INSERT INTO vote (id_user, id_acteur, vote)VALUES (:id_user, :id_acteur, :vote)');
        $inserdislike->execute(array(
        'id_user' => $user,
        'id_acteur' => $getid,
        'vote' => $getavis ));
        $inserdislike->closeCursor();
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
} else {?>
    <p>Vous ne pouvez liker et disliker une seul fois !</p>
    <script>window.alert("interdit d'acces !")</script>
    <a href="javascript:window.history.go(-1)">Retour</a>
<?php
    }
}
 