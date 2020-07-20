<?php
require "fonctions/fonctions.php";
include("navbar.php");


$db = connexionBase();

$requete = $db->query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id");
$stock = $requete->fetchAll(PDO::FETCH_OBJ);
//var_dump($stock);


?>

<body>
<div class="row">
    <div class="col-6">
        <p class="h3 font-weight-bold">Liste des disques ()</p>
    </div>
    <div class="col-1 offset-5 ">
        <button type="button" class="btn btn-dark">Ajouter</button>
    </div>
</div>


<div class="row">
    <?php
    foreach ($stock

             as $value) {
        ?>

        <div class="col-6">
            <div class="row mb-2">
                <div class="col-6">
                    <img alt="img" src="img/<?php echo $value->disc_picture ?> " class="img-fluid">
                </div>
                <div class="col-6">
                    <p class="h5 pb-n1"><?php echo $value->disc_title ?></p>
                    <p><?php echo $value->artist_name ?></p>
                    <p>Label : <?php echo $value->disc_label ?></p>
                    <p>Year : <?php echo $value->disc_year ?></p>
                    <p>Genre : <?php echo $value->disc_genre ?></p>
                    <button type="button" class="btn btn-dark">Details</button>
                </div>
            </div>
        </div>

        <?php
    }
    ?>

</body>
</div>
</html>