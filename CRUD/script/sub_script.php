<?php
require "../fonctions/fonctions.php";

$db = connexionBase();


$requete = $db->prepare("INSERT INTO user(user_nom, user_prenom, user_mail,
user_mdp, user_genre) VALUES ( ?, ?, ?, ?, ?)");

if (isset($_POST) && !empty($_POST)) {
//    var_dump($_POST);

    $result = $requete->execute([

        $_POST["user_nom"],
        $_POST["user_prénom"],
        $_POST["user_mail"],
        password_hash($_POST["user_mdp"], PASSWORD_DEFAULT),
        $_POST["user_genre"]
    ]);
//    var_dump($requete);

}

$tabUser = [
    "user_nom" => array("Le nom est incorrect", "\"^[a-zA-Zèéàiïôöüê' -]+$\""),
    "user_prénom" => array("Le prénom est incorrect", "\"^[a-zA-Zèéàiïôöüê' -]+$\""),
    "user_mail" => array("Le mail est incorrect", "\"^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)
    *@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\""),
    "user_mdp" => array("Mot de passe non valide", "\"/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/\""),

];


foreach ($tabUser as $id => $verif) {
    check($verif[1], $_POST[$id]);
    };


//if ($result = true){
//    header("Location: ../index.php");
//}
//else {
//    echo ("Erreur ! Problème ajout");
//}