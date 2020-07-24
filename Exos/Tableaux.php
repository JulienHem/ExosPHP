<?php

//1 - Mois

//$mois = array (
//    "Janvier" => 31,
//    "Février" => 29,
//    "Mars" => 31,
//    "Avril" => 30,
//    "Mai" => 31,
//    "Juin" => 30,
//    "Juillet" => 31,
//    "Aout" => 31,
//    "Septembre" => 30,
//    "Octobre" => 31,
//    "Novembre" => 30,
//    "Décembre" => 31,
//);
//
//asort($mois);
//foreach($mois as $cle => $valeur) {
//    echo $cle ." : ".$valeur."<br>";
//}


// 2. Capitales

//$capitales = array(
//    "Bucarest" => "Roumanie",
//    "Bruxelles" => "Belgique",
//    "Oslo" => "Norvège",
//    "Ottawa" => "Canada",
//    "Paris" => "France",
//    "Port-au-Prince" => "Haïti",
//    "Port-d'Espagne" => "Trinité-et-Tobago",
//    "Prague" => "République tchèque",
//    "Rabat" => "Maroc",
//    "Riga" => "Lettonie",
//    "Rome" => "Italie",
//    "San José" => "Costa Rica",
//    "Santiago" => "Chili",
//    "Sofia" => "Bulgarie",
//    "Alger" => "Algérie",
//    "Amsterdam" => "Pays-Bas",
//    "Andorre-la-Vieille" => "Andorre",
//    "Asuncion" => "Paraguay",
//    "Athènes" => "Grèce",
//    "Bagdad" => "Irak",
//    "Bamako" => "Mali",
//    "Berlin" => "Allemagne",
//    "Bogota" => "Colombie",
//    "Brasilia" => "Brésil",
//    "Bratislava" => "Slovaquie",
//    "Varsovie" => "Pologne",
//    "Budapest" => "Hongrie",
//    "Le Caire" => "Egypte",
//    "Canberra" => "Australie",
//    "Caracas" => "Venezuela",
//    "Jakarta" => "Indonésie",
//    "Kiev" => "Ukraine",
//    "Kigali" => "Rwanda",
//    "Kingston" => "Jamaïque",
//    "Lima" => "Pérou",
//    "Londres" => "Royaume-Uni",
//    "Madrid" => "Espagne",
//    "Malé" => "Maldives",
//    "Mexico" => "Mexique",
//    "Minsk" => "Biélorussie",
//    "Moscou" => "Russie",
//    "Nairobi" => "Kenya",
//    "New Delhi" => "Inde",
//    "Stockholm" => "Suède",
//    "Téhéran" => "Iran",
//    "Tokyo" => "Japon",
//    "Tunis" => "Tunisie",
//    "Copenhague" => "Danemark",
//    "Dakar" => "Sénégal",
//    "Damas" => "Syrie",
//    "Dublin" => "Irlande",
//    "Erevan" => "Arménie",
//    "La Havane" => "Cuba",
//    "Helsinki" => "Finlande",
//    "Islamabad" => "Pakistan",
//    "Vienne" => "Autriche",
//    "Vilnius" => "Lituanie",
//    "Zagreb" => "Croatie"
//);
//
//ksort($capitales);
//foreach ($capitales as $cle => $valeur) {
//    $tri = substr($cle, -strlen($cle), 1);
//    if ($tri === "B") {
//        echo($cle."<br>");
//    }
//    else {
//
//    }
//}

//foreach ($capitales as $cle => $valeur) {
//    echo("<br>".$valeur. ":" . $cle . "<br>");
//}

//$nbrepays = count($capitales);
//echo("Le nombre de pays est de :".$nbrepays);


$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
);

ksort($departements);
foreach ($departements as $region => $dpt) {
    echo($region. ':');
    foreach ($dpt as $reg) {
        echo($reg . " ");
    }
    echo('<br>');
}


$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
);

ksort($departements);
foreach ($departements as $cle => $valeur) {
    echo($cle. ':' . count($valeur) .'<br>');
}


?>