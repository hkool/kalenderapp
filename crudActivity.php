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
include('menu.php');
include('connection.php');

$dat = filter_input(INPUT_GET, 'datum');
$datumFormatted = date_create($dat)->format('d-m-Y');
?>

<h2>Overzicht van activiteiten op <?=$datumFormatted ?></h2>


<?php

try{
    $sql ="SELECT * from `activities` 
            WHERE date = :date";
    $query=$database->prepare($sql);
    $query->bindParam(':date', $dat);

     $query->execute();
     $activities = $query->fetchAll();

}
catch(PDOException $pdoE){
    var_dump($pdoE);
}
if(count($activities) >0){
    foreach($activities as &$activity){
        echo "<p>";
        echo $activity["text"];
        echo "</p>";
    }
}
else{
    echo "Er zijn geen activiteiten gepland voor $datumFormatted";
}
?>
<h2>Activiteit toevoegen</h2>
<form action="saveActivity.php" method="get">

    <input type="hidden" id="date" name="date"  value="<?=$dat ?>" /></p>
   <p> <label for="text">
        activiteit
    </label>
    <input id="text" name="text" placeholder="activity"/></p>
    <p><input type="submit" value="Save" /></p>
</form>


<h2>Activiteit verwijderen</h2>
    <?php
    if(count($activities) >0)
    {
    ?>
    <form action="deleteActivity.php" method="get">

        <input type="hidden" id="date" name="date"  value="<?=$dat ?>" />
        <p> <label for="text">
                activiteit
            </label>
            <select name="id">
               <?php
                foreach($activities as $action)
                {
                    $id =$action['id'];
                echo "<option value='$id'>".$action['text']."</option>";
                }?>
            </select></p>
        <p><input type="submit" value="Delete" /></p>
    </form>
   <?php }
    else
        {
        echo"Er zijn nog geen activiteiten om te verwijderen";
        }
    ?>
</div>
</body>

</html>