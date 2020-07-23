<?php
require "../fonctions/fonctions.php";

$db = connexionBase();




$requete = $db->prepare("INSERT INTO user(user_nom, user_prenom, user_mail,
user_mdp, user_genre) VALUES ( ?, ?, ?, ?, ?)");

if (isset($_POST) && !empty($_POST)) {
    var_dump($_POST);

    $result = $requete->execute([

        $_POST["user_nom"],
        $_POST["user_prénom"],
        $_POST["user_mail"],
        password_hash($_POST["user_mdp"], PASSWORD_DEFAULT),
        $_POST["user_genre"]
    ]);
    var_dump($requete);

}

if ($result = true){
    header("Location: ../index.php");
}
else {
    echo ("Erreur ! Problème ajout");
}