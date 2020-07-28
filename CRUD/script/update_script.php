<?php
session_start();

require "../fonctions/fonctions.php";

$db = connexionBase();


$disc_id = $_GET['disc_id'];

$postrequete = $db->prepare("UPDATE disc SET disc_title = ?, disc_year = ?,
 disc_label = ?, disc_genre = ?, disc_price = ?, artist_id = ? WHERE disc.disc_id = $disc_id");

$idquery = $db->query("SELECT artist_id FROM artist");
$getid = $idquery->fetch();

$filerequest = $db->prepare("UPDATE disc SET disc_picture = ? WHERE 
    disc.disc_id = $disc_id");

$tabdisc = [
    "disc_title" => array("Le titre est incorrect", "/^(\w+\D){1,20}$/"),
    "artist_id" => array("Sélectionnez un artist valide", "/^[\\w]{1,50}$/"),
    "disc_year" => array("Rentrez une année valide", "/^\d{4}$/"),
    "disc_genre" => array("Veuillez entrer un genre valide", "/^(\w+\D){2,20}$/"),
    "disc_label" => array("Veuillez entrer un label valide", "/^(\w+\D){2,20}$/"),
    "disc_price" => array("Veuillez entrer un prix valide", "/^\d+(,\d{1,2})?$/"),

];

$tabupdate = [];
foreach ($tabdisc as $id => $verif) {
    if (!check($verif[1], $_POST[$id]) && (!empty($_POST[$id])) && $getid != $_POST["artist_id"]) {
        $tabupdate[$id] = $verif[0];
    };

};

// On met les types autorisés dans un tableau (ici pour une image)
$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

// On extrait le type du fichier via l'extension FILE_INFO
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $_FILES["disc_picture"]["tmp_name"]);
finfo_close($finfo);



if (isset($_POST) && !empty($_POST)) {
    if (sizeof($tabupdate) === 0) {


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
}


if (is_uploaded_file($_FILES['disc_picture']['tmp_name'])) {


    if (isset($_FILES) && !empty($_FILES)) {
        if (in_array($mimetype, $aMimeTypes)) {
            /* Le type est parmi ceux autorisés, donc OK, on va pouvoir
               déplacer et renommer le fichier */

            $fileresult = $filerequest->execute([

                basename($_FILES["disc_picture"]["name"])

            ]);
        } else {
            echo "Mauvais type de fichier";
        }
    }
    move_uploaded_file($_FILES["disc_picture"]["tmp_name"], "../assets/img/" . $_FILES["disc_picture"]["name"]);

}


if ($postresult = true && $fileresult = true){
    header("Location: ../index.php");
}
else {
    echo ("Erreur ! Problème modif");
}