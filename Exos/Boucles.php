<html>
<body>
<table>
<?php




echo ('<tr>');
echo('<td></td>');
for ( $i = 0; $i <= 12; $i++) {
    echo('<td>'.$i.'</td>');
}
echo('</tr>');


for ( $i = 0; $i <= 12; $i++) {
    echo('<tr>');
    for ( $n = 0; $n <= 12; $n++){
        if ($n==0) {
            echo('<td>'.$i.'</td>');
        }
        echo('<td>'.$i*$n.'</td>');
    }
    echo('</tr>');
}
?>
</table>
</body>
</html>
