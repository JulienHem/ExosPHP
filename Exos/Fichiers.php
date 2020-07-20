<?php

//// Lecture d'un fichier
//$fichier = file("liens.txt");
//
//foreach ($fichier as $liens) {
//    echo("<a href =".$liens.">".$liens."</a>"."<br>");
//};

// Récupération d'un fichier distant

$csvfile = file("customers.csv");


echo "<table>";
echo "<tr><td>Nom</td><td>Prénom</td><td>Mail</td>
<td>Code Postal</td><td>Région</td><td>Ville</td>";

foreach ($csvfile as $string) {
    $separ = explode(",", $string);
    echo "<tr>";

    foreach($separ as $item){
        echo "<td>".$item."</td>";
    }
echo "</tr>";


}

echo "</table>";