<?php $title = 'Modifier password'; ?>
<?php require('header.php'); ?>
<hr>


<?php ob_start(); ?>
<form method="post" action="changepassword_post.php">
    <div class="card text-white bg-dark mb-3" id="card-1" style="max-width: 30rem;">
        <div class="card-title">
            <h1>Nouveau password</h1>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="username">Username</label> :
                <input type="text" class="form-control" name="username" id="username" require /><br>
                <label for="newmdp">Password</label> :
                <input type="password" class="form-control" name="newmdp" id="newmdp" require /><br>
                <label for="newmdp2">Confirmer password</label> :
                <input type="password" class="form-control" name="newmdp2" id="newmdp2" require /><br>

                <button type="submit" class="btn btn-success" name="passmodif">Envoyez</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
<?php require('footer.php'); ?>