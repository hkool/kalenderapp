<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>if</title>
  </head>
<body>

<?php
include('menu.php');

date_default_timezone_set('Europe/Amsterdam');
#date_default_timezone_set('America/Los_Angeles');
#date_default_timezone_set('Australia/Brisbane');

$now =  date_create('now')->format( 'd-m-y');
$time = date_create('now')->format('H');

if ($time <= 6)
{
    $groet =  "goedenacht";
}
else if ($time <= 12)
{
    $groet =  "goede morgen";
}
else if($time > 12 AND $time <= 17)
{
    $groet =  "goede middag";
}
else if($time > 17 ){
    $groet =  "goedenavond";
}
echo ucfirst($groet);

echo "<p>";
print "Het is $now en de tijd is $time uur.";;
echo  "</p>";


switch($groet)
{
    case "goede morgen":  $groet2 =  " school";
    break;
    case "goedenacht":  $groet2 =  "wat slaap inhalen";
    break;
    case "goede middag":  $groet2 =  "(huis) werk";
    break;
    case "goedenavond":  $groet2 =  "lekker chillen";
    break;
    default: $groet2 = "Wel wel";

}

print "Tijd voor ". $groet2;
nL();
nL();
// opdracht 1 maak een teller die de dagen tot de zomervakantie aftelt.
$day = date_create('now'); // synomiem voor DateTime
$zomer = date_create('2021-7-18');



// antwoord
//$aantaldagen = date_diff($zomer, $day)->format('%a');
//print "Nog " . $aantaldagen . " dagen tot de zomervakantie.";

// opdracht 2 laat zien welke datum het over 7 dagen is.
// antwoord
$nextWeek = date('d-m-y', strtotime('+7 days'));
print "Over een week is het  $nextWeek.";
?>

</body>
</html>
