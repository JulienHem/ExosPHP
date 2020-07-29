<?php
session_start();

require "fonctions/fonctions.php";


$db = connexionBase();

$requete = $db->query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id");
$stock = $requete->fetchAll(PDO::FETCH_OBJ);


//var_dump($stock);


?>

<html>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Velvet Records</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light bg-dark mb-2">
    <a class="navbar-brand text-light" href="../index.php">Velvet Records</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active text-light" href="#">Liste <span class="sr-only">(current)</span></a>
            <?php
            if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
                ?>
                <a class="nav-item nav-link text-light text-left"
                   href="script/logout_script.php">Déconnexion</a>
                <?php
            } else {
                ?>
                <a class="nav-item nav-link text-light text-left"
                   href="views/sub_form.php">Inscription</a>
                <a class="nav-item nav-link text-light text-left"
                   href="views/login_form.php">Connexion</a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>

<div class="container">

    <div class="row m-0 p-0">
        <div class="col-sm-12 col-md-6 col-xl-6 p-0 d-flex justify-content-center
     justify-content-md-start justify-content-lg-start">
            <p class="h3 font-weight-bold">Liste des disques (<?= count($stock); ?>)</p>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6 p-0 d-flex justify-content-center
     justify-content-md-end justify-content-lg-end mb-2 ">
            <?php
            if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
                ?>
                <a class="btn btn-dark " href="views/add_form.php">Ajouter</a>
            <?php }
            ?>
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
                        <p class="text-center text-md-center text-lg-left mb-n1"><b>Année</b> : <?= $value->disc_year ?>
                        </p>
                        <p class="text-center text-md-center text-lg-left "><b>Genre</b> : <?= $value->disc_genre ?></p>
                        <div class="d-flex justify-content-center justify-content-md-center justify-content-lg-start">
                            <a class="btn btn-dark"
                               href="views/details.php?disc_id=<?= $value->disc_id ?>">Détails</a>
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