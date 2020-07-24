<?php
session_start();

require "../fonctions/fonctions.php";

$db = connexionBase();

$disc_id = $_GET['disc_id'];
$requete = $db->prepare("DELETE FROM disc WHERE disc.disc_id = $disc_id");
$requete->execute();


if ($result = true){
    header("Location: ../index.php");
}
else {
    echo ("Erreur ! Problème ajout");
}