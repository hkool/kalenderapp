<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>array</title>

</head>
<body>
<?php

include('menu.php');


$klasgenoten = array("Jantje", "Joop", "Hakim", "Anthony");

foreach ($klasgenoten as $klasgenoot)
{
    print "<p>";
    print_r($klasgenoot);
    print "</p>";
}


        ?>
</div>
</body>
</html>
