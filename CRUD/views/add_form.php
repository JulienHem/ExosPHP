<?php
session_start();

require("../fonctions/fonctions.php");




if (file_exists(".head.php")) {
    include("head.php");
};


if (isset($_SESSION["login"]) && !empty($_SESSION["login"])) {
    $db = connexionBase();

    $requete = $db->query("SELECT * FROM artist");
    $stock = $requete->fetchAll(PDO::FETCH_OBJ);
    ?>
    <body>
    <div class="container">


        <p class="h3 font-weight-bold">Ajouter un vinyle</p>
        <form id="add-form" action="../script/add_script.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="disc_title" class="form-control" id="disc_title" placeholder="Enter title">
                <p class="text-danger" id="title-error"></p>
            </div>

            <div class="form-group">
                <label for="artist">Artist</label>
                <select class="form-control" name="artist_id" id="artist_id">
                    <option id="empty"></option>
                    <?php
                    foreach ($stock as $value) { ?>
                        <option value="<?= $value->artist_id ?>"><?php echo $value->artist_name ?></option>
                    <?php }
                    ?>
                </select>
                <p class="text-danger" id="artist-error"></p>

            </div>

            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" name="disc_year" class="form-control" id="disc_year" placeholder="Enter year">
                <p class="text-danger" id="year-error"></p>
            </div>

            <div class="form-group">
                <label for="Genre">Genre</label>
                <input type="text" name="disc_genre" class="form-control" id="disc_genre"
                       placeholder="Enter genre (Rock, Pop, Prog ...)">
                <p class="text-danger" id="genre-error">

            </div>
            <div class="form-group">
                <label for="label">Label</label>
                <input type="text" name="disc_label" class="form-control" id="disc_label"
                       placeholder="Enter label (Emi, Warner, PolyGram, Universal ...)">
            </div>
            <p class="text-danger" id="label-error"></p>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="disc_price" class="form-control" id="disc_price">
                <p class="text-danger" id="price-error"></p>
            </div>

            <div class="form-group">
                <label for="picture">Picture</label>
                <div>
                    <input name="disc_picture" id="disc_picture" type="file">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" id="add" class="btn btn-dark">Ajouter</button>
                <a class="btn btn-dark " href="../index.php">Retour</a>

            </div>
        </form>


    </div>
    <script src="../script/js/fonctions.js"></script>

    <script src="../script/js/check_addform.js"></script>

    </body>
    </html>
    <?php
} else {
    echo "Cette page nécessite une identification.";
}


//var_dump($stock);
?>