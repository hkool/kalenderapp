<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>basis</title>
    <style>
        *.*
        {
            color:sienna;
        }
        .grid-container {
            display: grid;
            grid-template-columns: auto auto ;
            grid-column-gap: 50px;
        }

    </style>
</head>
<body>
<div class="container-fluid">

<?php
include('menu.php');
?>
    <h2>Welkom op de site voor de agenda online.</h2>
    <div class="grid-container">
        <div class="grid-item">
            <img src="images/calendar.jpg" />
        </div>
        <div class="grid-item">Dit product heeft een kalender, een agenda en een verjaardagskalender. De gegevens zijn in te voeren en de onderhouden.
        De kalender kan voor een ander jaar worden opgevraagd. De verjaarskalender kan worden uitgeprint.</div>

</div>
<?php
//// syntax
//// start applicatie met url
//// syntax
//// variabele string
//echo "basis<br />";

//$tekst = "basis";
//echo $tekst;
//
//echo "<br />";

//var_dump($tekst);
//
//// operators
//nL();
//$num = 0; // $num krijgt de waarde 0
//echo $num;
//nL();//echo "<br />";
//
//$num ++;
//
//$num +=1;
//echo $num;
//nL(); //echo "<br />";
//echo $num += $num;
//nL();//echo "<br />";
////
//echo $num = $num + $num;
//
//// waarde van $num?
//
//nL();
//define("CIEN", 100);
//$num += CIEN;
//print $num;
//nL();
//$num --;
//echo "\$$num"; # dollar teken voor het getal met \ binnen quotes.
//nL();
//
//nL();
//echo 'Dit is $tekst';
//
//nL(); // single quotes
//echo "Dit is $tekst"; // double quotes
//
//nL();
// systeem constanten die je overal kunt gebruiken

//echo "Dit is php versie ".PHP_VERSION;
//echo "on ".PHP_OS;
//nL();
//print_r( $num -=CIEN);
?>



</body>
</html>
