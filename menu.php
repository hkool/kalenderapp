<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


<div class="navbar navbar-expand-sm bg-light">
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">home</a></li>
<!--        <li class="nav-item"><a  class="nav-link" href="if.php">if_switch</a></li>-->
<!--        <li class="nav-item"><a class="nav-link" href="array.php">array</a></li>-->
        <li class="nav-item"><a class="nav-link" href="calendar.php">kalender</a></li>
        <li class="nav-item"><a class="nav-link" href="agenda.php">agenda</a></li>
        <li class="nav-item"><a class="nav-link" href="birthday.php">verjaardagskalender</a></li>
<!--        <li class="nav-item"><a class="nav-link" href="birthday_printable.php">verjaardagskalender als pdf</a></li>-->
    </ul>
</div>
<?php

function nL(){
echo "<br />";
}
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}


?>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

