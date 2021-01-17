<?php
session_start();
 require_once('model/Manager.php');
 
if(isset($_POST['username']) && isset($_POST['mdp'])) {
   $pseudo = htmlspecialchars($_POST['username']);
   $password = htmlspecialchars($_POST['mdp']);

      // Vérifie si l'utilisateur  existe
      $req = $bdd->prepare("SELECT * FROM account WHERE username = ?");
      $req->execute(array($pseudo));
      $userinfo = $req->fetch();  
      $userexist = $req->rowCount();

      if($userexist == 1) {

      $pass_hash = hash('sha256', $password);
      if($userinfo['mdp'] === $pass_hash) {  
         
         $_SESSION['id_user'] = $userinfo['id_user'];
         $_SESSION['username'] = $userinfo['username'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['prenom'] = $userinfo['prenom'];

         header("Location: profil.php");
      } else {
         ?>
         <script>window.alert("Alerte ! Mauvais password !")</script>
         <a href="javascript:window.history.go(-1)">[ Retour ]</a>
         <?php
      }
   } else {
      ?>
         <script>window.alert("Alerte ! Mauvais username !")</script>
         <a href="javascript:window.history.go(-1)">[ Retour ]</a>
         <?php
   }
}






























