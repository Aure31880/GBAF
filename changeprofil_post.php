<?php
session_start();
require_once('model/Manager.php');

if(isset($_POST['updateusername'])) 
{
    $oldusername = htmlspecialchars($_POST['old-username']);
    $newusername = htmlspecialchars($_POST['new-username']);

    if(isset($_POST['old-username'], $_POST['new-username']) && !empty($_POST['old-username']) && !empty($_POST['new-username'])) 
    {
        $req = $bdd->prepare('SELECT * FROM account WHERE username = ?');
        $req->execute(array($oldusername));
        $requser = $req->rowCount();

        if($requser == 1) 
        {

        $update = $bdd->prepare('UPDATE account SET username = ? WHERE id_user = ?');
        $update->execute(array($newusername, $_SESSION['id_user']));

        ?>
        <script>window.alert("Alerte ! Votre username à bien été modifier !")</script>
        <a href="javascript:window.history.go(-1)">[ Retour ]</a>
        <?php

    }else {
        echo 'Cet username n\'existe pas !';
    }
}else {
    header('Location: profil.php?id=' .$_SESSION['id_user']);
}
}else {
    echo 'Vous n\'avez pas modifier votre username !';
}

if(isset($_POST['updatepass'])) 
{
    $oldpass = htmlspecialchars($_POST['old-pass']);
    $newpass =htmlspecialchars($_POST['new-pass']);
    $verifypass = htmlspecialchars($_POST['verify-pass']);

    if(isset($_POST['old-pass'], $_POST['new-pass'], $_POST['verify-pass']) && !empty($_POST['old-pass']) && !empty($_POST['new-pass']) && !empty($_POST['verify-pass'])) 
    {
        $req = $bdd->prepare('SELECT * FROM account WHERE id_user = ?');
        $req->execute(array($_SESSION['id_user']));
        $userinfo = $req->fetch(); 
        $reqpass = $req->rowCount();

        $oldpass_hash = hash('sha256', $oldpass);
        if($userinfo['mdp'] == $oldpass_hash) 
        {
            if($newpass ===  $verifypass)
            {

            $pass_hash = hash('sha256', $newpass);

            $update = $bdd->prepare('UPDATE account SET mdp = ? WHERE id_user = ?');
            $update->execute(array($pass_hash, $_SESSION['id_user']));

            ?>
            <script>window.alert("Alerte ! Votre password à bien été modifier !")</script>
            <a href="javascript:window.history.go(-1)">[ Retour ]</a>
            <?php
            
            }else {
                echo 'Vos passwords ne correspondent pas !';
            }
        }else {
            echo 'Mauvais password !';
        }
    }else {
        echo 'Remplir tout les champs !';
    }
}else {
    header("Location: profil.php?id=" .$_SESSION['id_user']);
}