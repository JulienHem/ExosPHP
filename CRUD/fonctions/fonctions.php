<?php


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
        echo 'Erreur : ' . $e->getMessage() . '<br>';
        echo 'N° : ' . $e->getCode() . '<br>';
        die('Connexion au serveur impossible.');
    }
}


?>