<?php
require "../fonctions/fonctions.php";

$db = connexionBase();

$requete = $db->prepare("INSERT INTO user(user_nom, user_prenom, user_mail,
user_mdp, user_genre) VALUES ( ?, ?, ?, ?, ?)");

$tabuser = [
    "user_nom" => array("Le nom est incorrect", "/^(\w+\D){2,20}$/"),
    "user_prénom" => array("Le prénom est incorrect", "/^(\w+\D){2,20}$/"),
    "user_mail" => array("Le mail est incorrect", "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/"),
    "user_mdp" => array("Mot de passe non valide", "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/"),
    "user_mdp2" => array("Mot de passe non valide", "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/"),

];

$tabverif = [];
foreach ($tabuser as $id => $verif) {
    if (!check($verif[1], $_POST[$id]) && (empty($_POST[$id]))) {
        $tabverif[$id] = $verif[0];

    };

};
var_dump($tabverif);

if ($_POST["user_mdp"] === $_POST["user_mdp2"]) {
    $hash = password_hash($_POST["user_mdp"], PASSWORD_DEFAULT);
}
else {
    $tabverif['password'] = "Mot de passe non identique";
}



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
        echo $tabverif['password'];

}



//if ($result = true){
//    header("Location: ../index.php");
//}
//else {
//    echo ("Erreur ! Problème ajout");
}