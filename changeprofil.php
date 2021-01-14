<?php
session_start();
?>

<html>

<head>
    <title>Modifier profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>
<div class="container-fluid">
    <div class="info">
    <img src="images/logo.jpg" alt="logo-gbaf" class="img-thumbnail" id="img-logo-profil">
        <div class="info-name">
            <h4>
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    <path fill-rule="evenodd"
                        d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                </svg>
                <?= $_SESSION['nom'];?> <?= $_SESSION['prenom']; ?>
            </h4>
            <br>
            <div class="info-button">
            <a class="back-profil" href="profil.php"> Retour au profil</a>
            </div>
            </div>
        </div>
</div>
<hr>

<div id="container">
    <div class="title">
        <h3>Modifier profil</h3>
    </div>
    <br>
    <br>
    
    <div class="update">
    <form method="post" action="changeprofil_post.php">
    <div class="mb-3" id="update-profil">

    <h5>Modifier username</h5>
  <label for="old-username" class="form-label">Ancien username</label>
  <input type="text" class="form-control" id="old-username" name="old-username"  placeholder="Ancien username     ">
</div>
<div class="mb-3" id="update-profil">
  <label for="update-username" class="form-label">Nouveau username</label>
  <input type="text" class="form-control" id="update-username" name="new-username" placeholder="Nouveau username"><br>

  <button type="submit" class="btn btn-success" name="updateusername">Modifier</button>
</div>
</form>

<form method="post" action="updatepass_post.php">
<div class="mb-3" id="update-profil">


    <h5>Modifier password</h5>
  <label for="old-pass" class="form-label">Ancien password</label>
  <input type="text" class="form-control" id="odl-pass" name="old-pass" placeholder="Ancien password     ">
</div>
<div class="mb-3" id="update-profil">
  <label for="update-pass" class="form-label">Nouveau password</label>
  <input type="text" class="form-control" id="update-pass" name="new-pass" placeholder="Nouveau password">
</div>
  <div class="mb-3" id="update-profil">
  <label for="verify-pass" class="form-label">Valider  password</label>
  <input type="text" class="form-control" id="verify-pass" name="verify-pass" placeholder="Verifier password"><br>

  <button type="submit" class="btn btn-success" name="updatepass">Modifier</button>
</div>
</form>
</div>


</body>
<?php require('footer.php'); ?>
</html>