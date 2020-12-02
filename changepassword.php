<?php $title = 'Modifier password'; ?>
<?php require('header.php'); ?>
<hr>


<?php ob_start(); ?>
<form method="post" action="changePassword_post.php">
    <div class="card text-white bg-dark mb-3" style="max-width: 30rem;">
        <h2 class="card-title">Nouveau password</h2>
        <div class="card-body">
            <div class="form-group">
                <label for="username">Username</label> :
                <input type="text" class="form-control" name="username" id="username" require /><br>
                <label for="newmdp">Password</label> :
                <input type="password" class="form-control" name="newmdp" id="newmdp" require /><br>
                <label for="newmdp2">Confirmer password</label> :
                <input type="password" class="form-control" name="newmdp2" id="newmdp2" require /><br>

                <button type="submit" class="btn btn-primary" name="passmodif">Envoyez</button>
                <div class="content-card">
                    <p class="contenu texte-blanc">Première visite ? Inscrivez-vous</p>
                    <p class="contenu texte-blanc"><a href="inscription.php" class="bouton blanc large">Inscription</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('footer.php'); ?>
<?php require('view/frontend/template.php'); ?>