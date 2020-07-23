<?php
session_start();

require "fonctions/fonctions.php";

$_POST["subpath"] = "views/sub_form.php";
$_POST["connexionpath"] = "views/login_form.php";

if (file_exists("assets/template/head.php")) {
    include("assets/template/head.php");

};


$db = connexionBase();

$requete = $db->query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id");
$stock = $requete->fetchAll(PDO::FETCH_OBJ);


//var_dump($stock);


?>
<div class="container">

    <div class="row m-0 p-0">
        <div class="col-sm-12 col-md-6 col-xl-6 p-0 d-flex justify-content-center
     justify-content-md-start justify-content-lg-start">
            <p class="h3 font-weight-bold">Liste des disques (<?= count($stock); ?>)</p>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6 p-0 d-flex justify-content-center
     justify-content-md-end justify-content-lg-end mb-2 ">
            <a class="btn btn-dark " href="views/add_form.php">Ajouter</a>
        </div>
    </div>


    <div class="row">
        <?php
        foreach ($stock

                 as $value) {
            ?>

            <div class="col-sm-12 col-md-6">
                <div class="row m-0 p-0 mb-2">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
                        <img alt="img" src="assets/img/<?= $value->disc_picture ?> " class="w-100 shadow">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
                        <p class="h5 text-center font-weight-bold text-md-center text-lg-left mt-3 mb-n1"><?= $value->disc_title ?></p>
                        <p class="font-weight-bold text-center text-md-center text-lg-left mt-4 mb-n1"><?= $value->artist_name ?></p>
                        <p class="text-center text-md-center text-lg-left mb-n1"><b>Label</b>
                            : <?= $value->disc_label ?></p>
                        <p class="text-center text-md-center text-lg-left mb-n1"><b>Year</b> : <?= $value->disc_year ?>
                        </p>
                        <p class="text-center text-md-center text-lg-left "><b>Genre</b> : <?= $value->disc_genre ?></p>
                        <div class="d-flex justify-content-center justify-content-md-center justify-content-lg-start">
                            <a class="btn btn-dark"
                               href="details.php?disc_id=<?= $value->disc_id ?>">Details</a>
                        </div>
                    </div>

                </div>
            </div>

            <?php
        }
        ?>
    </div>
</div>
</body>

</html>