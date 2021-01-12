    <?php
session_start();
require_once('model/Manager.php');
include('redirection.php');

?>

    <html>
    <head>
        <title>Profil</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href="public/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <!-- HEADER -->
        <div class="container-fluid">
        <div class="info">
            <img src="images/logo.jpg" id="img-logo-profil" class="img-thumbnail">
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
                <a href="changeprofil.php" class="update">Modifier votre profil</a>
                <br />
                <a href="deconnexion.php" class="deconnexion">Se déconnecter</a>
</div>
            </div>
         
        </div>
</div>
        <hr>
        <!--Fin HEADER -->

        <div class="container-fluid">
            <div class="presentation">
                <h1 class="presentation-title">GBAF</h1>

                <p>Le Groupement Banque Assurance Français (GBAF) est une fédération
                    représentant les 6 grands groupes français :
                <ul>
                    <li> BNP Paribas ;</li>
                    <li>BPCE ;</li>
                    <li> Crédit Agricole ;</li>
                    <li> Crédit Mutuel-CIC ;</li>
                    <li> Société Générale ;</li>
                    <li> La Banque Postale.</li>
                </ul>
                </p>
                <p class="overflow-visible"> Le GBAF est le représentant de la profession bancaire et des assureurs sur
                    tous
                    les axes de la réglementation financière française. Sa mission est de promouvoir
                    l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
                    pouvoirs publics.
                </p>
                <?php
                ?>
            </div>
        </div>

        <hr>
        <div class="container-fluid">
        <div class="section-acteur">
            <h2 class="section-acteur-tiltle">Section acteurs</h2><br>
            <div id="section-acteur-text">
                <div class="container-list-partenaire">
                    <h4>Nos partenaires :</h4>
                    <p>
                    <ul>
                        <li>BNP Paribas </li>
                        <li>BPCE </li>
                        <li> Crédit Agricole </li>
                        <li>Crédit Mutuel-CIC </li>
                        <li>Société Générale </li>
                        <li>La Banque Postale</li>
                    </ul>
                    </p>
                </div>
                <div class="container-list-acteur">
                    <h4>Nos acteurs :</h4>
                    <p>
                    <ul>
                        <li>Formation_co</li>
                        <li>Protectpeople</li>
                        <li>DSA France</li>
                        <li>CDE</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
</div>
        <hr>

        <?php 
        
// Récupérationn des infos de chaques acteurs    
$req = $bdd->query('SELECT * FROM acteur ');

while ($posts = $req->fetch()) 
{
?>
        <div class="details">
            <div class="card mb-3" id="card-partenaire" >
                <div class="row no-gutters">
                    <div class="col-md-4" id="logo-card">
                        <img src="<?= htmlspecialchars($posts['logo']); ?>" class="card-img" alt="logo-partenaire" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title"><?= htmlspecialchars($posts['acteur']); ?></h3>
                            <?php
                                $reduc = htmlspecialchars($posts['description'])
                                ?>
                            <p class="card-text"><?=  substr( $reduc, 0,800 )?></p>

                            <em><a href="pageacteur.php?id=<?= ($posts['id_acteur']); ?>">Lire la suite</a></em>
                        </div>
                    </div>
                </div>
            </div>
<?php   
}
$req->closeCursor();
?>
<hr>
<?php require('footer.php'); ?>
    </body>
    </html>