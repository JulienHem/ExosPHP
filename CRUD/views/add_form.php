<?php
require ("../fonctions/fonctions.php");

$_POST["subpath"] = "sub_form.php";
$_POST["connexionpath"] = "login_form.php";

if(file_exists("../assets/template/head.php")) {
    include("../assets/template/head.php");
};



$db = connexionBase();

$requete = $db->query("SELECT * FROM artist");
$stock = $requete->fetchAll(PDO::FETCH_OBJ);
//var_dump($stock);
?>


<div class="container">

    <body>

    <p class="h3 font-weight-bold">Ajouter un vinyle</p>
    <form action="../script/add_script.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" name="disc_title" class="form-control" id="title" placeholder="Enter title">
    </div>

    <div class="form-group">
        <label for="artist">Artist</label>
        <select class="form-control" name="artist_id" id="artist">
            <?php
            foreach ($stock as $value) { ?>
            <option value="<?= $value->artist_id?>"><?php echo $value->artist_name ?></option>
            <?php }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="year">Year</label>
        <input type="text" name="disc_year" class="form-control" id="year" placeholder="Enter year">
    </div>

    <div class="form-group">
        <label for="Genre">Genre</label>
        <input type="text" name="disc_genre" class="form-control" id="title" placeholder="Enter genre (Rock, Pop, Prog ...)">
    </div>
    <div class="form-group">
        <label for="label">Label</label>
        <input type="text" name="disc_label" class="form-control" id="label"
               placeholder="Enter label (Emi, Warner, PolyGram, Universal ...)">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="disc_price" class="form-control" id="price">
    </div>

    <div class="form-group">
        <label for="picture">Picture</label>
        <div>
            <input name="disc_picture" id="picture" type="file">
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-dark">Ajouter</button>
        <a class="btn btn-dark " href="../index.php">Retour</a>

    </div>
    </form>

    </body>

</div>
</html>