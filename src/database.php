<?php

//Configurations for the sql server
$host = "localhost";
$dbname = "study_buddy";
$username = "root";
$password = "password";

//Creating the instance of the sql server
$mysqli = new mysqli($host, $username, $password, $dbname);

//If there's a connection error, opens the respective directory of the connection error
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

//Returns the MySQL database connection object so that other php files can access the database
return $mysqli;