<?php
require "../fonctions/fonctions.php";

session_start();


$db = connexionBase();
$getlogin = $db->prepare("SELECT * FROM user WHERE user_mail = ?");

$tabuser = [
    "user_mail" => array("Le mail est incorrect", "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/"),
    "user_mdp" => array("Mot de passe non valide", "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/"),

];

$tabverif = [];
foreach ($tabuser as $id => $verif) {
    if (!check($verif[1], $_POST[$id]) && (!empty($_POST[$id]))) {
        $tabverif[$id] = $verif[0];
    }
};


if (isset($_POST["user_mail"]) && !empty($_POST["user_mail"])  && isset($_POST["user_mdp"]) &&
    !empty($_POST["user_mdp"])) {
    if (sizeof($tabverif) === 0) {


        $getlogin->execute(
            [$_POST["user_mail"]]
        );
        $result = $getlogin->fetch(PDO::FETCH_OBJ);
        password_verify($_POST["user_mdp"], $result->user_mdp);
        $_SESSION["login"] = $_POST["user_mail"];
        redirect($tabverif, "../index.php");

    }
}else {
    redirect($tabverif, "../views/login_form.php");

};




