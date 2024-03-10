<?php

$host = "localhost";
$dbname = "study-buddy";
$username = "root";
$password = "NeWPassY7!0$%";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    dir("Connection error: " . $mysqli->connect_error);
}

return $mysqli;