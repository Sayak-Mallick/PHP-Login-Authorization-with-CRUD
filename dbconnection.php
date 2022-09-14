<?php

$databaseHost = 'localhost';
$databaseName = 'mydb';
$databaseUsername = 'root';
$databasePassword = 'password';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName)
or die();

?>