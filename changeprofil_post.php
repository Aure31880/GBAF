<?php
session_start();
require_once('model/Manager.php');

if(isset($_POST['updatepass'])) 
{
    $oldusername = htmlspecialchars($_POST['old-username']);
    $newusername = htmlspecialchars($_POST['new-username']);

    // Si les champs sont remplis ont verifie dans la bdd si les informations sont corrects 
    if(isset($_POST['old-username'], $_POST['new-username']) || isset($_POST['old-pass'], $_POST['new-pass'], $_POST['verify-pass']) && !empty($_POST['old-username']) && !empty($_POST['new-username']) || !empty($_POST['old-pass']) && !empty($_POST['new-pass']) && !empty($_POST['verify-pass']))
    {
        $req = $bdd->prepare('SELECT * FROM account WHERE username = ?');
        $req->execute(array($oldusername));
        $requser = $req->rowCount();

        if($requser == 1) 
        {
        
        // Si l'utilisateur existe alors on modifie son username
        $update = $bdd->prepare('UPDATE account SET username = ? WHERE id_user = ?');
        $update->execute(array($newusername, $_SESSION['id_user']));

        ?>
        <script>window.alert("Alerte ! Votre username à bien été modifier !")</script>
        <a href="connexion.php">[ Retour ]</a>
        <?php
        } elseif (isset($_POST['updatepass'])) 
        {
            $oldpass = htmlspecialchars($_POST['old-pass']);
            $newpass =htmlspecialchars($_POST['new-pass']);
            $verifypass = htmlspecialchars($_POST['verify-pass']);
        
           
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
                    
                    // Si les informations sont corrects alors on modifie le password
                    $update = $bdd->prepare('UPDATE account SET mdp = ? WHERE id_user = ?');
                    $update->execute(array($pass_hash, $_SESSION['id_user']));
        
                    ?>
                    <script>window.alert("Alerte ! Votre password à bien été modifier !")</script>
                    <a href="connexion.php">[ Retour ]</a>
                    <?php
                    
                    }else {
                        echo 'Vos passwords ne correspondent pas !';
                    }
                }else {
                    echo 'Mauvais password !';
                }
        }else {
            header("Location: profil.php");
        }
    }else {
        echo 'Cet username n\'existe pas !';
    }
}else {
    header('Location: profil.php');
}
