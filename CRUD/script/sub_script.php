<?php
require "../fonctions/fonctions.php";

// ------ FONCTION CONNECTION A LA BASE DE DONNEES ------ //
$db = connexionBase();


$requete = $db->prepare("INSERT INTO user(user_nom, user_prenom, user_mail,
user_mdp, user_genre) VALUES ( ?, ?, ?, ?, ?)");

$mail = $_POST["user_mail"];

//----------------------------------//
//--------- VERIFICATIONS ----------//
//----------------------------------//

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

// ------- VERIFIE SI UN MAIL EXISTE DEJA ------- //
if (isset($mail)) {
    $getmail = $db->prepare("SELECT user_mail FROM user WHERE user_mail = ?");
    $getmail->execute([
        $mail,
    ]);
    $lemail = $getmail->fetch(PDO::FETCH_OBJ);
    if ($lemail === false) {

    } else {
        $tabverif['mail'] = "Mail déjà existant";
    }
}

// -------- VERIFIE SI LES DEUX CHAMPS DU MDP SONT IDENTIQUES -------- //
if ($_POST["user_mdp"] === $_POST["user_mdp2"]) {
    $hash = password_hash($_POST["user_mdp"], PASSWORD_DEFAULT);
} else {
    $tabverif['password'] = "Mot de passe non identique";
}



if (isset($_POST) && !empty($_POST)) {
    if (sizeof($tabverif) === 0) {


// ------SI LES VERIFICATIONS SONT CORRECTS, ON INSERT DANS LA TABLE ------------- //

        $result = $requete->execute([ // VA EXECUTER LA REQUETE D'INSERT

            $_POST["user_nom"],
            $_POST["user_prénom"],
            $_POST["user_mail"],
            $hash,
            $_POST["user_genre"]
        ]);

    } else {
        if (isset($tabverif['password'])) {
            echo $tabverif['password'];
        }
            if (isset($tabverif['mail'])) {
                echo $tabverif['mail'];
            }


    }
}


if ($result = true){
    header("Location: ../index.php");
}
else {
    echo("Erreur ! Problème ajout");
}
