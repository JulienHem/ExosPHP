<?php

require "../fonctions/fonctions.php";


if (file_exists("head.php")) {
    include("head.php");
};

$db = connexionBase();

?>

<body>
<div class="container">
    <p class="h3 font-weight-bold text-center">Inscription</p>

    <form id="sub-form" action="../script/sub_script.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col">
                <label for="user_nom">Nom</label>
                <input type="text" id="user_nom" name="user_nom" class="form-control" placeholder="Ex : Dupont">
                <p id="nom_error"></p>
            </div>
        </div>
        <div class="form-row">

            <div class="col">
                <label for="user_prénom">Prénom</label>
                <input type="text" id="user_prénom" name="user_prénom" class="form-control" placeholder="Ex : Julien">
                <p id="prénom_error"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="user_mail">Mail</label>
                <input type="text" id="user_mail" name="user_mail" class="form-control"
                       placeholder="Ex : SauronOnFleek@gmail.com"><p id="mail_error"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="user_mdp">Mot de passe</label>
                <input type="password" id="user_mdp" name="user_mdp" class="form-control">
                <p id="mdp_error"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="user_mdp2">Confirmation du Mot de Passe</label>
                <input type="password" id="user_mdp2" name="user_mdp2" class="form-control">
                <p id="mdp2_error"></p>
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
            <button type="submit" id="subbutton" class="btn btn-dark">S'inscrire</button>
            <button type="reset" class="btn btn-dark">Reset</button>
            <a class="btn btn-dark " href="../index.php">Retour</a>

        </div>


    </form>
</div>
<script src="../script/js/fonctions.js"></script>
<script src="../script/js/check_subform.js"></script>

</body>
</html>