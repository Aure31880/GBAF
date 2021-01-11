<?php $title = 'Inscription'; ?>
<?php     require('header.php'); ?>
<hr>
<?php ob_start(); ?>
<div class="card text-white bg-dark mb-3" style="max-width: 30%;">
    <div class="card-body">
        <h2 class="card-title">Inscription</h2>
        <form method="post" action="inscription_post.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom</label> :
                <input type="text" class="form-control" name="nom" id="nom" required />

                <label for="first_name">Prénom</label> :
                <input type="text" class="form-control" name="prenom" id="prenom" required />

                <label for="username">Pseudo</label> :
                <input type="text" class="form-control" name="username" id="username" required />

                <label for="mdp">Mot de passe</label> :
                <input type="password" class="form-control" name="mdp" id="mdp" required />

                <label for="mdp2">Verifier mot de passe</label> :
                <input type="password" class="form-control" name="mdp2" id="mdp2" required />

                <label for="question" name="question" id="question">Question</label> : <br>
                <select class="form-control" name="question" value="<?php if(isset($question)) { echo $question; }?>">
                    <option>-Choississez-</option>
                    <option>Quel est le modèle de votre première voiture ?</option>
                    <option>Quel est le nom de votre école primaire ?</option>
                    <option>Quel est le nom de votre premier animal dosmestique ?</option>
                </select>

                <label for="reponse">Réponse</label> :
                <input type="text " class="form-control" name="reponse" id="reponse" required /><br>

            <button type="submit" class="btn btn-success" name="forminscription">Envoyez</button>
            </div>
        </form>
    </div>
    <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php  require('view/frontend/template.php'); ?>
<?php require('footer.php'); ?>
