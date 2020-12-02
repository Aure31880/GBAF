<?php
session_start();
require_once('model/Manager.php');


if(isset($_POST['changePass']))
{
    // on sécurise les entrées
    $pseudo = htmlspecialchars($_POST['username']);
    $question = htmlspecialchars($_POST['question']);
    $answer = htmlspecialchars($_POST['reponse']);

    if(!empty($_POST['username']) AND !empty($_POST['question']) AND !empty($_POST['reponse']))
    {
        //on verifie si l'utilisateur existe
        $requser = $bdd->prepare('SELECT * FROM account WHERE username = ? AND question = ? AND reponse = ?');
        $requser->execute(array($pseudo, $question,$answer));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $memberinfo = $requser->fetch();
                $_SESSION['id_user'] = $memberinfo['id_user'];
                $_SESSION['nom'] = $memberinfo['nom'];
                $_SESSION['prenom'] = $memberinfo['prenom'];
                $_SESSION['username'] = $memberinfo['username'];
            
                header("Location: changepassword.php?id=" .$_SESSION['id_user']);
        }else{
            echo 'Le nom d\'utilisateur n\'existe pas !';
        }
    }else {
        echo 'Tout les champs ne sont pas remplis !';
    }
}else {
    echo 'Erreur !';
}

if(isset($_POST['passmodif']))
{
    // on remplace l'ancien password
    $pseudo = htmlspecialchars($_POST['username']);
    $mdp = htmlspecialchars($_POST['newmdp']);
    $mdp2 = htmlspecialchars($_POST['newmdp2']);

    if(!empty($_POST['username']) AND !empty($_POST['newmdp']) AND !empty($_POST['newmdp2']))
    {
        if($mdp == $mdp2)
        {
            $pass_hash = hash('sha256', $mdp);

          $req = $bdd->prepare('UPDATE account SET mdp = ? WHERE  username = ? ');
          $req->execute(array($pass_hash, $_SESSION['username']));
          
                $_SESSION['username'] = $userinfo['username'];
                header("Location: profil.php?id=".$_SESSION['id_user']);
        }else {
            echo 'Les passwords ne correspondent pas !';
        }
    }else {
        echo 'Tout les champs doivent etre remplis !';
    }
}else {
    echo 'Erreur !';
}
