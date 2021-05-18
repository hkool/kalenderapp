<?php

try {
$database = new \PDO('mysql:host=localhost;dbname=agenda', "root", "");
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}