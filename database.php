<?php

//Configurations for the server
$host = "localhost";
$dbname = "study-buddy";
$username = "root";
$password = "NeWPassY7!0$%";

$mysqli = new mysqli($host, $username, $password, $dbname);

//Opens the respective directory of the connection error
if ($mysqli->connect_errno) {
    dir("Connection error: " . $mysqli->connect_error);
}

//Returns instantiated database
return $mysqli;