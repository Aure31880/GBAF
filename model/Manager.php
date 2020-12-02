<?php
try
{
    // Connexion à la base de donnée.
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $bdd;
}
catch(Exeption $e)
{
    die('Erreur:' .$e->getMessage());
} 
