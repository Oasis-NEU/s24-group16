<?php

//execute database.php
$mysqli = require __DIR__ . "/../database/database.php";

//prepare the sql command
$sql = "INSERT INTO profile (first_name, last_name, year, major, contacts, looking_for, bio)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

//create the statement using the MySQL connection object
$stmt = $mysqli->stmt_init();

//prepare the sql command in the statement
if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

//bind values, the first arg is just the insert type
$stmt->bind_param("ssissss", $_POST["first-name"], 
                            $_POST["last-name"],
                            $_POST["year"], 
                            $_POST["major"], 
                            $_POST["contacts"], 
                            $_POST["looking-for"], 
                            $_POST["bio"]);
//runs the command
$stmt->execute();

//redirects user to YourClasses.html
header("Location: YourClasses.html");
exit;

?>