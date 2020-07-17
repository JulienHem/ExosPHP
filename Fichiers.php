<?php

//// Lecture d'un fichier
//$fichier = file("liens.txt");
//
//foreach ($fichier as $liens) {
//    echo("<a href =".$liens.">".$liens."</a>"."<br>");
//};

// Récupération d'un fichier distant

$csvfile = file("customers.csv");

foreach ($csvfile as $string) {
    $separ = explode(",", $string);
    echo "<table>". "<tr>" . "<td>" .$string ."</td>". "</tr>" . "<br>";
}
