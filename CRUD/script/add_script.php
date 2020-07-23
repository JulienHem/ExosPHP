<?php
require "../fonctions/fonctions.php";

$db = connexionBase();



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

if ($result = true){
    header("Location: ../index.php");
}
else {
    echo ("Erreur ! Problème ajout");
}