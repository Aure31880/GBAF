<?php
session_start();
require_once('model/Manager.php');

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
    header("Location: profil.php");
}