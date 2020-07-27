<?php
require "../fonctions/fonctions.php";

$db = connexionBase();


$tabuser = [
    "user_nom" => array("Le nom est incorrect", "/^[\\w]{2,50}$/"),
    "user_prénom" => array("Le prénom est incorrect", "/^[\\w]{2,50}$/"),
    "user_mail" => array("Le mail est incorrect", "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/"),
    "user_mdp" => array("Mot de passe non valide", "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/"),
    "user_mdp2" => array("Mot de passe non valide", "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/"),


];

$tabverif = [];
foreach ($tabuser as $id => $verif) {
    if (!check($verif[1], $_POST[$id]) && (empty($_POST[$id]))) {
        array_push($tabverif, [$verif[0]]);
    };

};

if ($_POST["user_mdp"] === $_POST["user_mdp2"]) {
    $hash = password_hash($_POST["user_mdp"], PASSWORD_DEFAULT);
}
else {
    $tabverif['password'] = "Mot de passe non identique";
}

$requete = $db->prepare("INSERT INTO user(user_nom, user_prenom, user_mail,
user_mdp, user_genre) VALUES ( ?, ?, ?, ?, ?)");

if (isset($_POST) && !empty($_POST)) {
    if (sizeof($tabverif) === 0) {

            $result = $requete->execute([

                $_POST["user_nom"],
                $_POST["user_prénom"],
                $_POST["user_mail"],
                $hash,
                $_POST["user_genre"]
            ]);

    } else {
        echo  $tabverif['password'];

}
}



//if ($result = true){
//    header("Location: ../index.php");
//}
//else {
//    echo ("Erreur ! Problème ajout");
//}