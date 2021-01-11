<?php 
session_start();
require_once('model/Manager.php');



if(isset($_SESSION['id_user'])&& !empty($_SESSION['id_user']))
{
        $user = htmlspecialchars($_SESSION['id_user']);

        $requser = $bdd->prepare('SELECT * FROM account WHERE id_user = ?');
        $requser->execute(array($_SESSION['id_user']));
        $userinfo = $requser->fetch();
        
        if(isset($_GET['id'])&& !empty($_GET['id'])){
                $getid = htmlspecialchars($_GET['id']);
                $req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = ?');
                $req->execute(array($getid));
            
                    if(isset($_POST['name'], $_POST['textcomment']) && !empty ($_POST['name']) && !empty ($_POST['textcomment'])) 
                    {
                    $name = htmlspecialchars($_POST['name']);
                    $comment = htmlspecialchars($_POST['textcomment']);
                    
                        $addcomment = $bdd->prepare('INSERT INTO post(name, id_user, id_acteur, post, date_add) VALUES (?, ?, ?, ?,  NOW() )');
                        $addcomment->execute(array($name,$user, $getid, $comment));
            
                        header("Location : comment.php?id=" . $_GET['id']);
              
                        }else {
                        echo 'remplir tout les champs !';
                        }
                
                }else {
                    echo 'Selectionner un acteur  !';
                }
}else {
    echo 'Vous devez vous connectez !';
}


$getcomment = $bdd->prepare('SELECT * FROM post WHERE id_acteur = ?');
$getcomment->execute(array($getid));

$getvote = $bdd->prepare('SELECT * FROM vote WHERE id_acteur = ?');
$getvote->execute(array($getid));


?>