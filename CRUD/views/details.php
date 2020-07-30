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
$stock = $requete->fetchObject(); // ON RECUPERER LES VALEURS EN TANT QU'OBJET

$idcount = $requete -> rowCount();// ROWCOUNT RETOURNE 0 SI LE RESULTAT EST FAUX

if ($idcount === 0) { // SI CEST 0 ALORS L'ERREUR S'AFFICHE
    echo "Cet id ne correspond pas";
}
else {
    ?>
    <div class="container">
        <h1>Détails</h1>
        <form>
            <div class="form-row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  ">
                    <h3>Title</h3>
                    <div class="bg-light rounded "><p id="titre" class="p-2"><?= $stock->disc_title; ?></p>
                    </div>
                    <h3>Année</h3>
                    <div class="bg-light rounded "><p id="titre" class="p-2"><?= $stock->disc_year; ?></p>
                    </div>
                    <h3>Label</h3>
                    <div class="bg-light rounded "><p id="titre" class="p-2"><?= $stock->disc_label; ?></p>
                    </div>


                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-2 ">

                    <h3>Artiste</h3>
                    <div class="bg-light rounded ">
                        <p class="p-2" id="artiste"><?= $stock->artist_name; ?></p>
                    </div>
                    <h3>Genre</h3>
                    <div class="bg-light rounded ">
                        <p class="p-2" id="artiste"><?= $stock->disc_genre; ?></p>
                    </div>

                    <h3>Prix</h3>
                    <div class="bg-light rounded ">
                        <p class="p-2" id="artiste"><?= $stock->disc_price; ?></p>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  ">
                    <h3>Photo</h3>
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
<?php } ?>
    </html>
