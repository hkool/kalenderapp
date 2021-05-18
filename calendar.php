<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>array</title>
    <style>
        .today{
            color:#ff0000;
            width: 80px;
            border:1px solid #ff0000
        }
        .days{
            width: 80px;
            border:1px dotted darkgray;
        }
        .calender{
            width: 560px;
        }
        .no-day{
            width:80px;

        }
    </style>
</head>
<body>


<?php

include('menu.php');

//de maanden
$months=array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');
$daynames = array('M','D','W','D','V','Z','Z');

$start = '2021-1-1'; // gewenste datum
$start = strtotime($start); // integer:  timestamp
$startY = date('Y',$start); // format naar jaartal

// aantal dagen in het jaar uitrekenen.
$start_date = date_create("$startY-01-01"); // date_time object
$end_date   = date_create("$startY-12-31");

//difference between two dates
$verschil = (date_diff($start_date,$end_date));
$aantal = intval($verschil->format("%a"));
$aantaldagen = $aantal + 1; // plus 1 omdat het verschil wordt berekend. Dan ontbreekt er dus 1 dag
//find the number of days between two dates


$today=date('j'); // vandaag de dag
$thismonth=intval(date('m'))-1; // -1 ivm de array van maanden
$thisyear=date('Y'); // dit jaar
?>
<div class="container-fluid">
    <div class="d-flex flex-column calender" >
        <div class="p-2 ">
            <?=$startY // het jaar ?>
        </div>
    </div>

    <?php
    // forlus voor alle dagen van het jaar
    for($i =0;$i<$aantaldagen;$i++){// aantal dagen van het jaar als alternatief
        echo"<tr >";

        $datum = strtotime('+'.$i.' days', $start);
        $maand = intval(date('m', $datum))-1;
        $dezemaand = $maand;

        echo "<div class='d-flex calender'><div class='p-2  ' >$months[$dezemaand]</div></div>
                    <div class='d-flex flex-wrap bg-light calender'>";
        foreach($daynames as $dayname){
            echo"<div class='p-2 no-day'>$dayname</div>";
        }

        $dagnummer = date('N', $datum); // maandag - zondag
        for($d=1;$d<$dagnummer;$d++)
        {
            echo "<div class='p-2 no-day'></div>";
        }
        do
        {
            $dag = date('j', $datum);

            if($dag == $today && $thismonth == $dezemaand && $thisyear==$startY)
            {
                echo "<div class='p-2   today '>$dag</div>";
            }
            else{
                echo "<div class='p-2 days'>$dag</div>";
            }
            $i++;
            $datum = strtotime('+'.$i.' days', $start);
            $maand = intval(date('m', $datum))-1;
        }
        while($maand== $dezemaand);
        $i--; // uit lus als er een nieuwe maand is, teller staat op 1 en wordt gelijk 1 opgehoogd.
        echo "</div>";
    }


    ?>
</div>
</body>
</html>
