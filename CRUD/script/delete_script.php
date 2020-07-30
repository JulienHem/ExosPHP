<?php
session_start();

require "../fonctions/fonctions.php";

if (isset($_SESSION["login"])) {

$db = connexionBase();

$disc_id = $_GET['disc_id'];
$requete = $db->prepare("DELETE FROM disc WHERE disc.disc_id = $disc_id");
$requete->execute(); // EXECUTE LA REQUETE POUR SUPPRIMER DE LA BASE


if ($result = true){
    header("Location: ../index.php");
}
else {
    echo ("Erreur ! Problème ajout");
}
}
else {
    echo "Cette page nécessite une identification.";
}
