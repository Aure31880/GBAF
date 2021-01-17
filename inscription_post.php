<?php
require_once('model/Manager.php');

if(isset($_POST['forminscription']))
{
    $name = htmlspecialchars($_POST['nom']);
    $firstName = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['username']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $mdp2 = htmlspecialchars($_POST['mdp2']);
    $question = htmlspecialchars($_POST['question']);
    $answer = htmlspecialchars($_POST['reponse']);

    // on verifie que les champs soient bien remplis
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['question']) AND !empty($_POST['reponse']))
    {
        $nameLenght = strlen($name);
        $firstLenght = strlen($firstName);
        $pseudoLenght = strlen($pseudo);
        $questionLenght = strlen($question);
        $answerLenght = strlen($answer);
        
        if($nameLenght && $firstLenght && $pseudoLenght && $questionLenght && $answerLenght <= 255 )
        {
            //on verifie si le pseudo est unique
            $reqpseudo = $bdd->prepare('SELECT * FROM account WHERE username = ?');
            $reqpseudo->execute(array($pseudo));
            $pseudoexist = $reqpseudo->rowCount();
            if($pseudoexist == 0)
            {
                if($mdp == $mdp2)
                {
                    $pass_hash = hash('sha256', $mdp);

                    if(!empty($question) && !empty($answer))
                    {
                        $req = $bdd->prepare('INSERT INTO account (nom, prenom, username, mdp, question, reponse) VALUES( :nom, :prenom, :username, :mdp, :question, :reponse )');
                        $req->execute(array(
                            'nom' => $name,
                            'prenom' => $firstName,
                            'username' => $pseudo,
                            'mdp' => $pass_hash,
                            'question' => $question,
                            'reponse' => $answer ));
                            echo  "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                    }else {
                        echo 'Oups erreur !';
                    }
                }else {
                    echo 'Les passwords ne correspondent pas !';
                }
            }else {
                echo 'Ce username existe déjà !';
            }
        }else {
            echo 'Oups erreur';
        }
    }
}else {
    echo 'introuvable !';
}