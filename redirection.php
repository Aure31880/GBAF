<?php

if(isset($_SESSION['username']) === false) {
    ?>
    <script>alert('acces restreint');
document.location.href='connexion.php';</script>
<?php
}