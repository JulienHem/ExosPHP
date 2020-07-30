<?php
session_start();
include("head.php");
require "../fonctions/fonctions.php";


$db = connexionBase();

if (isset($_SESSION["login"])) {

$disc_id = $_GET['disc_id'];
$requete = $db->query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc.disc_id = $disc_id ");
$requete2 = $db->query("SELECT * FROM artist");

$stock = $requete->fetchObject();
$stock2 = $requete2->fetchAll(PDO::FETCH_OBJ);


$idcount = $requete->rowCount(); // COMPTE LE NOMBRE DE LIGNES DANS LA COLONNE user_id DE LA BDD

if ($idcount === 0) { // PERMET DE NE PAS NAVIGUER DANS UN ID NE CORRESPONDANT PAS A LA BASE DE DONNEES //

    echo "Cet id ne correspond pas";
}
else {
?>

<div class="container">

    <body>

    <p class="h3 font-weight-bold">Supprimer</p>
    <form action="../script/delete_script.php?disc_id=<?= $disc_id ?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="disc_title" class="form-control" id="title" value="<?= $stock->disc_title; ?>">
        </div>

        <div class="form-group">
            <label for="artist">Artist</label>
            <select class="form-control" name="artist_id" id="artist">
                <option selected value="<?= $stock->artist_id ?>"><?= $stock->artist_name ?></option>
                <?php
                foreach ($stock2 as $value) { ?>
                    <option value="<?= $value->artist_id ?>"><?= $value->artist_name ?></option>
                <?php }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="disc_year" class="form-control" id="year" value="<?= $stock->disc_year; ?>">
        </div>

        <div class="form-group">
            <label for="Genre">Genre</label>
            <input type="text" name="disc_genre" class="form-control" id="title" value="<?= $stock->disc_genre; ?>">
        </div>
        <div class="form-group">
            <label for="label">Label</label>
            <input type="text" name="disc_label" class="form-control" id="label"
                   value="<?= $stock->disc_label; ?>">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="disc_price" class="form-control" id="price" value="<?= $stock->disc_price; ?>">
        </div>

        <div class="form-group">
            <label for="picture">Picture</label>
            <div>
                <div>
                    <img alt="img" src="../assets/img/<?= $stock->disc_picture; ?> " class="img-fluid shadow mt-3">
                </div>

            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-dark">Supprimer</button>
            <a class="btn btn-dark " href="../index.php">Retour</a>

        </div>
    </form>
    </body><?php
    }
// ------ SI L'UTILISATEUR N'EST PAS CONNECTE IL NE PEUT PAS ACCEDER A LA PAGE ------ //
    } else {
        echo "Cette page nécessite une identification.";
    }
    ?>
