<?php $title = 'Inscription'; ?>
<?php     require('header.php'); ?>
<hr>
<?php ob_start(); ?>
<div class="card text-white bg-dark mb-3" style="max-width: 30rem;">
    <div class="card-body">
        <h2 class="card-title">Inscription</h2>
        <form method="post" action="inscription_post.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom</label> :
                <input type="text" class="form-control" name="nom" id="nom" require />

                <label for="first_name">Prénom</label> :
                <input type="text" class="form-control" name="prenom" id="prenom" require />

                <label for="username">Pseudo</label> :
                <input type="text" class="form-control" name="username" id="username" require />

                <label for="mdp">Mot de passe</label> :
                <input type="password" class="form-control" name="mdp" id="mdp" require />

                <label for="mdp2">Verifier mot de passe</label> :
                <input type="password" class="form-control" name="mdp2" id="mdp2" require />

                <label for="question" name="question" id="question">Question</label> : <br>
                <select class="form-control" name="question" value="<?php if(isset($question)) { echo $question; }?>">
                    <option>-Choississez-</option>
                    <option>Quel est le modèle de votre première voiture ?</option>
                    <option>Quel est le nom de votre école primaire ?</option>
                    <option>Quel est le nom de votre premier animal dosmestique ?</option>
                </select>

                <label for="reponse">Réponse</label> :
                <input type="text " class="form-control" name="reponse" id="reponse" require /><br>

            <button type="submit" class="btn btn-primary" name="forminscription">Envoyez</button>
            </div>
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('footer.php'); ?>
<?php  require('view/frontend/template.php'); ?>
