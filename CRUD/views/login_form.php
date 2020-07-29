<?php
session_start();
require "../fonctions/fonctions.php";


if (file_exists("head.php")) {
    include("head.php");
};

$db = connexionBase();
?>

<body>
<div class="container">
    <p class="h3 font-weight-bold text-center">Connexion</p>

    <form id="log-form" action="../script/login_script.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col">
                <label for="nom">Login</label>
                <input type="text" id="user-mail" name="user_mail" class="form-control"
                       placeholder="Veuillez entrer votre mail"><p id="mail-error"></p>
            </div>
        </div>
        <div class="form-row">

            <div class="col">
                <label for="mdp">Mot de passe</label>
                <input type="password" id="user-mdp" name="user_mdp" class="form-control"
                       placeholder="Veuillez entrer votre mot de passe">
                <p id="mdp-error"></p>
            </div>

        </div>

        <div class="mt-3">
            <button type="submit" id="logbutton" class="btn btn-dark">Se connecter</button>
            <a class="btn btn-dark " href="../index.php">Retour</a>

        </div>

        <script src="../script/js/fonctions.js"></script>
        <script src="../script/js/check_loginform.js"></script>
</body>