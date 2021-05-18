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

    </style>
</head>
<body>
<div class="container-fluid">
<?php
include('connection.php');
include('menu.php');

$activity_date = filter_input(INPUT_GET, 'date');
$activity_text = filter_input(INPUT_GET, 'text');

if(isset($activity_date))
{

    try{
        $sql ="INSERT into `activities` (date,text) VALUES(:date, :text)";
        $statement = $database->prepare($sql);
        $statement->bindParam(':date', $activity_date);
        $statement->bindParam(':text', $activity_text);
        $statement->execute();
    }
    catch(PDOException $pdoE){
        var_dump($pdoE);
    }
    $datumFormatted = date_create($activity_date)->format('d-m-Y');
    echo "<h2>Activiteit is opgeslagen voor $datumFormatted</h2><br />";

}
redirect("crudActivity.php?datum=$activity_date");
?>


