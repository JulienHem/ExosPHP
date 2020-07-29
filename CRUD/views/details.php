<?php
session_start();
require "../fonctions/fonctions.php";

if (file_exists("head.php")) {
    include("head.php");
};


$db = connexionBase();

$disc_id = $_GET['disc_id'];
$requete = $db->query("SELECT * FROM disc JOIN artist 
                                ON artist.artist_id = disc.artist_id 
                                WHERE disc.disc_id = $disc_id");
$stock = $requete->fetchObject();

?>
<div class="container">
    <p class="h3 font-weight-bold">Détails</p>

    <form>
        <div class="form-row pb-2">

            <div class="col">
                <label for="titre">Titre</label>
                <div class="bg-light border border-secondary rounded ">
                    <p id="titre" class="mb-n1"><?= $stock->disc_title; ?></p>
                </div>
            </div>
            <div class="col">
                <label for="artiste">Artiste</label>
                <div class="bg-light border border-secondary rounded ">
                    <p id="artiste"><?= $stock->artist_name; ?></p>
                </div>
            </div>
        </div>


        <div class="form-row pb-2">

            <div class="col">
                <label for="année">Année</label>
                <div class="bg-light border border-secondary rounded ">
                    <p id="année"><?= $stock->disc_year; ?></p>
                </div>
            </div>
            <div class="col">
                <label for="genre">Genre</label>
                <div class="bg-light border border-secondary rounded ">
                    <p id="genre"><?= $stock->disc_genre; ?></p>
                </div>
            </div>
        </div>


        <div class="form-row pb-1">

            <div class="col">
                <label for="label">Label</label>
                <div class="bg-light border border-secondary rounded ">
                    <p id="label"><?= $stock->disc_label; ?></p>
                </div>
            </div>
            <div class="col">
                <label for="prix">Prix</label>
                <div class="bg-light border border-secondary rounded ">
                    <p id="prix"><?= $stock->disc_price; ?></p>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col h3 mt-3">
                <label for="label">Picture</label>
            </div>
        </div>
        <img alt="img" src="../assets/img/<?= $stock->disc_picture; ?> " class="img-fluid shadow">


        <div class="mt-3">
            <?php
            if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
                ?>
                <a class="btn btn-dark " href="update_form.php?disc_id=<?= $stock->disc_id ?>">Modifier</a>
                <a class="btn btn-dark " href="delete_form.php?disc_id=<?= $stock->disc_id ?>">Supprimer</a>
                <?php
            }
            ?>
            <a class="btn btn-dark " href="../index.php">Retour</a>
        </div>


    </form>

</div>
</html>
