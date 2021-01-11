<?php
session_start();
?>
<?php $title = 'Connexion'; ?>
<?php require('header.php'); ?>
<hr>

<?php ob_start(); ?>
    <div class="card text-white bg-dark mb-3" style="max-width: 30%;">
        <form method="post" action="connexion_post.php">
            <h2 class="card-title">Connexion</h2>
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label> :
                    <input type="text" class="form-control" name="username" id="username" require />

                    <label for="mdp">Password</label> :
                    <input type="password" class="form-control" name="mdp" id="mdp" require /><br>
                    <button type="submit" class="btn btn-success" name="forminscription">Envoyez</button><br>
                    <div class="content-card">
                        <p class="contenu texte-blanc">Mot de passe oublié ?</p>
                        <p class="contenu texte-blanc"><a href="verifyuser.php" class="bouton blanc large">Modifer mot
                                de passe</a></p>
                        <p class="contenu texte-blanc">Première visite ? Inscrivez-vous</p>
                        <p class="contenu texte-blanc"><a href="inscription.php"
                                class="bouton blanc large">Inscription</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
<?php require('footer.php'); ?>