<?php

//execute database.php
$mysqli = require __DIR__ . "/../database.php";

$sql = sprintf("SELECT email FROM profile WHERE email='?'", $mysqli);

//create the statement using the MySQL connection object
$stmt = $mysqli->stmt_init();

//prepare the sql command in the statement
if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

//bind values, the first arg is just the insert type
$stmt->bind_param("s", $_SESSION['email']);

//runs the command
$result = $stmt->execute();

$arr = $result['email'];