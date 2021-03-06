<?php $title = 'Mot de passe oublié'; ?>
<?php require('header.php'); ?>
<hr>


<?php ob_start(); ?>
<form method="post" action="changepassword_post.php">
    <div class="card text-white bg-dark mb-3" id="card-1" style="max-width: 30rem;">
        <div class="card-title">
            <h1>Password oublié</h1>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="username">Username</label> :
                <input type="text" class="form-control" name="username" id="username" require />
                <label for="question" name="question" id="question">Question</label> : <br>
                <select class="form-control" name="question" value="<?php if(isset($question)) { echo $question; }?>">
                    <option>-Choississez-</option>
                    <option>Quel est le modèle de votre première voiture ?</option>
                    <option>Quel est le nom de votre école primaire ?</option>
                    <option>Quel est le nom de votre premier animal dosmestique ?</option>
                </select>

                <label for="reponse">Réponse</label> :
                <input type="text " class="form-control" name="reponse" id="reponse" require /><br>

                <button type="submit" class="btn btn-success" name="changePass">Envoyez</button>
                <div class="content-card">
                    <p class="contenu texte-blanc">Première visite ? Inscrivez-vous</p>
                    <p class="contenu texte-blanc"><a href="inscription.php" class="bouton-redirection">Inscription</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
<?php require('footer.php'); ?>
