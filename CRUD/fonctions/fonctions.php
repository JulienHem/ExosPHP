<?php


/**
 * @return PDO
 */
function connexionBase()
{
    // Paramètre de connexion serveur

    $host = "localhost:3306";
    $login = "root";  // Votre login d'accès au serveur de BDD
    $password = "";    // Le Password pour vous identifier auprès du serveur
    $base = "velvet";  // La bdd avec laquelle vous voulez travailler

    try {
        return new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $base, $login, $password);
    } catch (Exception $e) {
        echo  $e->getMessage();
        echo  $e->getCode();
        die('Connexion au serveur impossible.');
    }
}


function check($regex, $id) // FONCTION QUI VA PERMETTRE LES VERIFICATIONS DES CHAMPS
    // QUE L'ON APPELLE DANS LES SCRIPTS POUR POUVOIR LANCER CETTE DERNIERE
{
    preg_match($regex, $id);
    if (preg_match($regex, $id)) {
        return true; // SI TRUE ALORS ON ENVOIE
    } else {
        return false; // SI FALSE ON AFFICHE LES ERREURS
    };
}

function redirect ($errortab, $page) { // PERMET DE REDIRIGER L'UTIISATEUR
    if (sizeof($errortab) === 0){ // SI IL N'Y A PAS D'ERREUR ALORS ON REDIRIGE
        header("Location:".$page);
    } else {
        foreach ($errortab AS $errorMsg) {
            echo $errorMsg. "<br>"; // SI IL Y'A UNE ERREUR ALORS ON AFFICHE LE MSG D'ERREUR
        }
    }
}

?>