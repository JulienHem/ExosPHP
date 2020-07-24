<?php

require "../fonctions/fonctions.php";

$_POST["connexionpath"] = "login_form";

if(file_exists("../assets/template/head.php")) {
    include("../assets/template/head.php");
};

$db = connexionBase();

?>


<div class="container">
    <p class="h3 font-weight-bold text-center">Inscription</p>

    <form action="../script/sub_script.php" method="post" enctype="multipart/form-data">
        <div class="form-row" >
            <div class="col">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="user_nom" class="form-control" placeholder="Ex : Dupont"><p id="nom_error"></p>
            </div>
        </div>
        <div class="form-row">

            <div class="col">
                <label for="prénom">Prénom</label>
                <input type="text" id="prenom" name="user_prénom" class="form-control" placeholder="Ex : Julien">
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="mail">Mail</label>
                <input type="text" id="mail" name="user_mail" class="form-control" placeholder="Ex : SauronOnFleek@gmail.com" ">
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="mdp">Mot de passe</label>
                <input type="text" id="mdp" name="user_mdp" class="form-control">
            </div>
        </div>


        <div class="form-check form-check-inline">
            <input class="form-check-input" name="user_genre" type="checkbox" id="monsieur" value="monsieur">
            <label class="form-check-label" for="monsieur">Monsieur</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name="user_genre" type="checkbox" id="madame" value="madame">
            <label class="form-check-label" for="madame">Madame</label>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-dark">S'inscrire</button>
            <button type="reset" class="btn btn-dark">Reset</button>
            <a class="btn btn-dark " href="../index.php">Retour</a>

        </div>


    </form>