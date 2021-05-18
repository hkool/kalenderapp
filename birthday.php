<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Birthday calender</title>
    <style>

        .calender{
            width: 800px;
            background-color: antiquewhite;
            font-family: 'Trebuchet MS', sans-serif;
            color:sienna;
        }
        img{
            width:400px;
        }
        .p-2, .maand, .image
        {
            border-bottom: .5px solid sienna;
        }

    </style>
</head>
<body>
<div class="container-fluid">
<?php

include('menu.php');
$kittens=array("kitten1.jpg", "kitten2.jpg", "kitten3.png");
$k=0; // teller kittens
//de maanden
$months=array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');

$start = '2024-1-1'; // max data, in schrikkeljaar
$start = strtotime($start); // integer:  timestamp
$startY = date('Y',$start); // format naar jaartal

// aantal dagen in het jaar uitrekenen.
$start_date = date_create("$startY-01-01"); // date_time object
$end_date   = date_create("$startY-12-31");

//difference between two dates
$verschil = (date_diff($start_date,$end_date));
$aantal = intval($verschil->format("%a"));
$aantaldagen = $aantal + 1;
//find the number of days between two dates


$today=date('j'); // vandaag de dag
$thismonth=intval(date('m'))-1; // -1 ivm de array van maanden
$thisyear=date('Y'); // dit jaar
?>

    <div class="d-flex flex-column calender" >
        <div class="p-2 ">
            verjaarskalender
        </div>
    </div>

    <?php
    // forlus voor alle dagen van het jaar
    for($i =0;$i<$aantaldagen;$i++){// aantal dagen van het jaar als alternatief
        echo"<tr >";
        $datum = strtotime('+'.$i.' days', $start);
        $maand = intval(date('m', $datum))-1;
        $dezemaand = $maand;

        if($k >= 3){ $k=0;}
        // image of kitten, three pictures, used more then once.
        echo "<div class='d-flex calender'><div class='container-fluid maand ' >$months[$dezemaand]</div><div class='image'><img src='images/$kittens[$k]'/></div>
        </div> ";
        $k++;
        // eind melding maand 
        // begin dagen
        echo "<div class='d-flex flex-wrap bg-sienna calender'>";
        $dagnummer = date('N', $datum); // maandag - zondag
        do
        {
            $dag = date('j', $datum);
            echo "<div class='p-2  container-fluid '>$dag</div>";
            $i++;
            $datum = strtotime('+'.$i.' days', $start);
            $maand = intval(date('m', $datum))-1;
        }
        while($maand== $dezemaand);
        $i--; // uit lus als er een nieuwe maand is, teller staat op 1 en wordt gelijk 1 opgehoogd.
        echo "</div></div></div>";
    }
    ?>
</div>
</body>
</html>