<?php

function lien($lien, $titre) {
    echo("<a href =".$lien.">".$titre."</a>");
}

lien("https://www.reddit.com/", "Reddit Hug");

echo('<br>');

$tab = array(4, 3, 8 ,2);

function calcul($tab) {
    echo ("Somme du tableau est de " . array_sum($tab));
}
calcul($tab);

echo('<br>');

$char = "TopSecret42";

function verifmdp($char) {
    if ((strlen($char) > 8)
    && (preg_match("/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/", $char) == 1)) {
        echo("Le mot de passe est correct");
    }
    else {
        echo("Le mot de passe est incorrect");
    }
}
verifmdp($char);
