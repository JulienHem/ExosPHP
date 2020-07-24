<?php
session_start();
require "../fonctions/fonctions.php";

$_POST["subpath"] = "sub_form.php";

$_POST["connexionpath"] = "#";

if (file_exists("../assets/template/head.php")) {
    include("../assets/template/head.php");
};

$db = connexionBase();

?>


<div class="container">
    <p class="h3 font-weight-bold text-center">Connexion</p>

    <form action="../script/login_script.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col">
                <label for="nom">Login</label>
                <input type="text" id="nom" name="user_mail" class="form-control"
                       placeholder="Veuillez entrer votre mail">
            </div>
        </div>
        <div class="form-row">

            <div class="col">
                <label for="prénom">Mot de passe</label>
                <input type="text" id="prénom" name="user_mdp" class="form-control" placeholder="Veuillez entrer votre mot de passe">
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-dark">Se connecter</button>
            <a class="btn btn-dark " href="../index.php">Retour</a>

        </div>