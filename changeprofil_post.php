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
    header('Location: profil.php');
}
}else {
    echo 'Vous n\'avez pas modifier votre username !';
}
