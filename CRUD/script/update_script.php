<?php
require "../fonctions/fonctions.php";

$db = connexionBase();


$disc_id = $_GET['disc_id'];

$postrequete = $db->prepare("UPDATE disc SET disc_title = ?, disc_year = ?,
 disc_label = ?, disc_genre = ?, disc_price = ?, artist_id = ? WHERE disc.disc_id = $disc_id");

if (isset($_POST) && !empty($_POST)) {

    $postresult = $postrequete->execute([

        $_POST["disc_title"],
        $_POST["disc_year"],
        $_POST["disc_label"],
        $_POST["disc_genre"],
        $_POST["disc_price"],
        $_POST["artist_id"]
    ]);

    var_dump($postrequete);
    var_dump($postresult);


}

if (is_uploaded_file($_FILES['disc_picture']['tmp_name'])) {
    $filerequest = $db->prepare("UPDATE disc SET disc_picture = ? WHERE 
    disc.disc_id = $disc_id");

    if (isset($_FILES) && !empty($_FILES)) {

        $fileresult = $filerequest->execute([

            basename($_FILES["disc_picture"]["name"])

        ]);
    }
        move_uploaded_file($_FILES["disc_picture"]["tmp_name"], "../img/".$_FILES["disc_picture"]["name"]);

}





if ($postresult = true && $fileresult = true){
    header("Location: ../index.php");
}
else {
    echo ("Erreur ! Problème modif");
}