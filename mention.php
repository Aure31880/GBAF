<?php $title = 'Mentions légales'; ?>
<?php require('header.php'); ?>
<hr>

<?php ob_start(); ?>
<div class="container-fluid">
    <div class="mentions-content">
    <h1>Mentions légales</h1><br>
        <h2>Qui sommes-nous&nbsp;?</h2>
            <p>L’adresse de notre site Web est : http://aurelien-b.fr/gbaf.</p>

            <h2>Utilisation des données personnelles collectées</h2>
            <h3>commentaires</h3>
            <p>Quand vous laissez un commentaire sur notre site web, les données inscrites dans le formulaire de
            commentaire, mais aussi votre adresse IP et l’agent utilisateur de votre navigateur sont collectés pour nous
            aider à la détection des commentaires indésirables.</p>

            <p>Une chaîne anonymisée créée à partir de votre adresse de messagerie (également appelée hash) peut être
            envoyée au service Gravatar pour vérifier si vous utilisez ce dernier. Les clauses de confidentialité du
            service Gravatar sont disponibles ici : https://automattic.com/privacy/. Après validation de votre
            commentaire, votre photo de profil sera visible publiquement à coté de votre commentaire.</p>

            <h3>Médias</h3>
            <p>Si vous êtes un utilisateur ou une utilisatrice enregistré·e et que vous téléversez des images sur le site
            web, nous vous conseillons d’éviter de téléverser des images contenant des données EXIF de coordonnées GPS.
            Les visiteurs de votre site web peuvent télécharger et extraire des données de localisation depuis ces
            images.</p>


            <h3>Contenu embarqué depuis d’autres sites</h3>
            <p>Les articles de ce site peuvent inclure des contenus intégrés (par exemple des vidéos, images, articles…).
            Le contenu intégré depuis d’autres sites se comporte de la même manière que si le visiteur se rendait sur
            cet autre site.</p>

            <p>Ces sites web pourraient collecter des données sur vous, utiliser des cookies, embarquer des outils de
            suivis tiers, suivre vos interactions avec ces contenus embarqués si vous disposez d’un compte connecté sur
            leur site web.</p>

            <h3>Statistiques et mesures d’audience</h3>
            <h3>Utilisation et transmission de vos données personnelles</h3>
            <h2>Durées de stockage de vos données</h2>
            <p>Si vous laissez un commentaire, le commentaire et ses métadonnées sont conservés indéfiniment. Cela permet
            de reconnaître et approuver automatiquement les commentaires suivants au lieu de les laisser dans la file de
            modération.</p>

            <p>Pour les utilisateurs et utilisatrices qui s’inscrivent sur notre site (si cela est possible), nous stockons
            également les données personnelles indiquées dans leur profil. Tous les utilisateurs et utilisatrices
            peuvent voir, modifier ou supprimer leurs informations personnelles à tout moment (à l’exception de leur nom
            d’utilisateur·ice). Les gestionnaires du site peuvent aussi voir et modifier ces informations.</p>

            <h2>Les droits que vous avez sur vos données</h2>
            <p>Si vous avez un compte ou si vous avez laissé des commentaires sur le site, vous pouvez demander à recevoir
            un fichier contenant toutes les données personnelles que nous possédons à votre sujet, incluant celles que
            vous nous avez fournies. Vous pouvez également demander la suppression des données personnelles vous
            concernant. Cela ne prend pas en compte les données stockées à des fins administratives, légales ou pour des
            raisons de sécurité.</p>

            <h2>Transmission de vos données personnelles</h2>
            <p>Les commentaires des visiteurs peuvent être vérifiés à l’aide d’un service automatisé de détection des
            commentaires indésirables.</p>

            <h2>Informations de contact</h2>
            <h2>Informations supplémentaires</h2>
            <h3>Comment nous protégeons vos données</h3>
            <h3>Procédures mises en œuvre en cas de fuite de données</h3>
            <h3>Les services tiers qui nous transmettent des données</h3>
            <h3>Opérations de marketing automatisé et/ou de profilage réalisées à l’aide des données personnelles</h3>
            <h3>Affichage des informations liées aux secteurs soumis à des régulations spécifiques</h3>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>
<?php require('footer.php'); ?>