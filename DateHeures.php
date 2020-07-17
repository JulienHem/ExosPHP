<?php
date_default_timezone_set("Europe/Paris");

$ddate = "14-07-2019";
$Date = new DateTime($ddate);
$week = $Date->format("W");

echo("La date 14-07-2019 correspond à la semaine : ".$week);



// Jours avant fin de formation
echo("<br>");

echo("On est le 16/07/2020"."\n"."- Fin de formation le : 22/01/2021");

$d1 = new DateTime("16-07-2020");
$d2 = new DateTime("22-01-2021");
$datediff = $d1->diff($d2);

echo($datediff->format(" : Il reste %a jours"));

// Déterminer si une année est bisextile

echo("<br>");
function bisextile($year) {
$jours = (mktime (24,0,0,12,31, $year)
- mktime (0,0,0,1,1,$year));
    if($jours == 31622400) {
        echo("C'est une année bisextile");
    }
    else {
        echo("Ce n'est pas une année bisextile");
    }
}

bisextile(2020);

// Montrez que la date du 32/17/2019 est erronée.

echo("<br>");
$oDate =  DateTime::createFromFormat("d/m/Y", "12/17/2019");

$errors = DateTime::getLastErrors();

if ($errors["error_count"]>0 || $errors["warning_count"]>0) {
    echo "Date erronée";
}
else {
    echo "Date correct";
}

// Affichez l'heure courante sous cette forme : 11h25.
echo("<br>");

echo date('H');
echo ("h");
echo date('i');

// Ajoutez 1 mois à la date courante.
echo("<br>");

$date = new DateTime();
$date->add(new DateInterval('P1M'));
echo $date->format('d/m/Y');

// Que s'est-il passé le 1000200000
echo("<br>");

$t = new DateTime();
$t -> setTimestamp(1000200000);
echo $t->format('U = d/m/Y H:i:s');


