<?php
require "../fonctions/fonctions.php";

session_start();

$db = connexionBase();
$getlogin = $db->prepare("SELECT * FROM user WHERE user_mail = ?");

if (isset($_POST) && !empty($_POST)) {

    $getlogin->execute(
        [$_POST["user_mail"]]
    );
    $result = $getlogin->fetch(PDO::FETCH_OBJ);
};

password_verify($_POST["user_mdp"], $result->user_mdp);
