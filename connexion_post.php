<?php
session_start();
 require_once('model/Manager.php');
 
if(isset($_POST['username']) && isset($_POST['mdp'])) {
   $pseudo = htmlspecialchars($_POST['username']);
   $password = htmlspecialchars($_POST['mdp']);

      $req = $bdd->prepare("SELECT * FROM account WHERE username = ?");
      $req->execute(array($pseudo));
      $userinfo = $req->fetch();  
      $userexist = $req->rowCount();

      if($userexist == 1) {

         $pass_hash = hash('sha256', $password);
         if($userinfo['mdp'] === $pass_hash) {  

         $_SESSION['id_user'] = $userinfo['id_user'];
         $_SESSION['username'] = $userinfo['username'];
         header("Location: profil.php?id=".$_SESSION['id_user']);
      } else {
         echo "Mauvais mot de passe!";
      }
   } else {
      echo  "Mauvais pseudo !";
   }
}






























