<?php
session_start();

require "../fonctions/fonctions.php";

if ($_SESSION["login"]) {
} else {
    echo "Cette page nécessite une identification.";
}

$db = connexionBase();

$requete = $db->prepare("INSERT INTO disc(disc_title, disc_year, disc_picture,
 disc_label, disc_genre, disc_price, artist_id) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
$idquery = $db->query("SELECT artist_id FROM artist");
$getid = $idquery->fetch();

$tabdisc = [
    "disc_title" => array("Le titre est incorrect", "/^(\w+\D){2,20}$/"),
    "artist_id" => array("Sélectionnez un artist valide", "/^[\\w]{2,50}$/"),
    "disc_year" => array("Rentrez une année valide", "/^\d{4}$/"),
    "disc_genre" => array("Veuillez entrer un genre valide", "/^(\w+\D){2,20}$/"),
    "disc_label" => array("Veuillez entrer un label valide", "/^(\w+\D){2,20}$/"),
    "disc_price" => array("Veuillez entrer un prix valide", "/^\d+(,\d{1,2})?$/"),

];

$tabverif = [];
foreach ($tabdisc as $id => $verif) {
    if (!check($verif[1], $_POST[$id]) && (!empty($_POST[$id])) && $getid == $_POST["artist_id"]) {
        $tabverif[$id] = $verif[0];
    };

};


// On met les types autorisés dans un tableau (ici pour une image)
$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

// On extrait le type du fichier via l'extension FILE_INFO
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $_FILES["disc_picture"]["tmp_name"]);
finfo_close($finfo);


if (isset($_POST) && !empty($_POST)) {
    if (sizeof($tabverif) === 0) {
        if (in_array($mimetype, $aMimeTypes)) {
            /* Le type est parmi ceux autorisés, donc OK, on va pouvoir
               déplacer et renommer le fichier */


            var_dump($_POST);

            $result = $requete->execute([

                $_POST["disc_title"],
                $_POST["disc_year"],
                $_FILES["disc_picture"]["name"],
                $_POST["disc_label"],
                $_POST["disc_genre"],
                $_POST["disc_price"],
                $_POST["artist_id"]

            ]);

            var_dump($requete);
            var_dump($result);
            move_uploaded_file($_FILES["disc_picture"]["tmp_name"], "../assets/img/" . $_FILES["disc_picture"]["name"]);
        } else {
            // Le type n'est pas autorisé, donc ERREUR

            echo "Type de fichier non autorisé";
            exit;
        }
    }
}

//if ($result){
//    header("Location: ../index.php");
//}
//else {
//    echo ("Erreur ! Problème ajout");
//}