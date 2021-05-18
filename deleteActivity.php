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

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$dat=filter_input(INPUT_GET,'date');
if(isset($id) && is_int($id)){
    $sql2="DELETE FROM `activities` WHERE `activities`.`id` = :id";
    $query=$database->prepare($sql2);
    $query->bindParam(':id', $id);
    $query->execute();
}

redirect("crudActivity.php?datum=$dat");
?>


