<?php
session_start();
require "fonctions/fonctions.php";

if (file_exists("assets/template/head.php")) {
    include("assets/template/head.php");
};


$db = connexionBase();

$_POST["subpath"] = "views/sub_form.php";


$disc_id = $_GET['disc_id'];
$requete = $db->query("SELECT * FROM disc JOIN artist 
                                ON artist.artist_id = disc.artist_id 
                                WHERE disc.disc_id = $disc_id");
$stock = $requete->fetchObject();

?>
<div class="container">
    <p class="h3 font-weight-bold">Détails</p>

    <form>
        <div class="form-row">
            <div class="col">
                <label for="titre">Titre</label>
                <input type="text" id="titre" class="form-control" value="<?= $stock->disc_title; ?>">
            </div>
            <div class="col">
                <label for="artist">Artist</label>
                <input type="text" class="form-control" value="<?= $stock->artist_name; ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="year">Year</label>
                <input type="text" id="year" class="form-control" value="<?= $stock->disc_year; ?>">
            </div>
            <div class="col">
                <label for="genre">Genre</label>
                <input type="text" id="genre" class="form-control" value="<?= $stock->disc_genre; ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col">
                <label for="label">Label</label>
                <input type="text" id="label" class="form-control" value="<?= $stock->disc_label; ?>">
            </div>
            <div class="col">
                <label for="price">Price</label>
                <input type="text" id="price" class="form-control" value="<?= $stock->disc_price; ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col h3 mt-3">
                <label for="label">Picture</label>
            </div>
        </div>
        <img alt="img" src="assets/img/<?= $stock->disc_picture; ?> " class="img-fluid shadow">


        <div class="mt-3">
            <?php
            if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
                ?>
                <a class="btn btn-dark " href="views/update_form.php?disc_id=<?= $stock->disc_id ?>">Modifier</a>
                <a class="btn btn-dark " href="views/delete_form.php?disc_id=<?= $stock->disc_id ?>">Supprimer</a>
                <?php
            }
            ?>
            <a class="btn btn-dark " href="index.php">Retour</a>
        </div>


    </form>

</div>
</html>
