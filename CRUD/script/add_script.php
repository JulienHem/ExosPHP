<?php
session_start();

require "../fonctions/fonctions.php";

$db = connexionBase();

if ($_SESSION["login"])
{
    echo"Vous êtes autorisé à voir cette page.";
}
else
{
    echo"Cette page nécessite une identification.";
}

$tabdisc = [
    "disc_title" => array("Le titre est incorrect", "/^[\\w]{2,50}$/"),
    "artist_id" => array("Sélectionnez un aritst valide", "/^[\\w]{2,50}$/"),
    "disc_year" => array("Rentrez une année valide", "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/"),
    "disc_genre" => array("Veuillez entrer un genre valide", "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/"),
    "disc_label" => array("Veuillez entrer un label valide", "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/"),
    "disc_price" => array("Veuillez entrer un prix valide", "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/"),

];

$tabverif = [];
foreach ($tabuser as $id => $verif) {
    if (!check($verif[1], $_POST[$id]) && (empty($_POST[$id]))) {
        array_push($tabverif, [$verif[0]]);
    };

};


$requete = $db->prepare("INSERT INTO disc(disc_title, disc_year, disc_picture,
 disc_label, disc_genre, disc_price, artist_id) VALUES ( ?, ?, ?, ?, ?, ?, ?)");

if (isset($_POST) && !empty($_POST)) {
    var_dump($_POST);

    $result = $requete->execute([

        $_POST["disc_title"],
        $_POST["disc_year"],
        $_FILES["disc_picture"]["name"],
        $_POST["disc_label"],
        $_POST["disc_genre"],
        $_POST["disc_price"],
        $_POST["artist_id"]

    ]);

    var_dump($requete);
    var_dump($result);
    move_uploaded_file($_FILES["disc_picture"]["tmp_name"], "../img/".$_FILES["disc_picture"]["name"]);

}

if ($result){
    header("Location: ../index.php");
}
else {
    echo ("Erreur ! Problème ajout");
}