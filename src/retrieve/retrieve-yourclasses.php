<?php

//execute database.php
$mysqli = require __DIR__ . "/../database/database.php";

$sql = sprintf("SELECT classes FROM profile WHERE email=?", $mysqli);

//create the statement using the MySQL connection object
$stmt = $mysqli->stmt_init();

//prepare the sql command in the statement
if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

//bind values, the first arg is just the insert type
$stmt->bind_param("s", $_SESSION['email']);

//runs the command
$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

$classes = $row["classes"];

$classesArray = array();

$done = false;

$commaArray = array();

$offset = 0;

while (($offset = strpos($classes, ",", $offset)) !== false) {
    $commaArray[] = $offset;
    $offset++; // Increment the offset to move past the current comma
}

$start = 0;
foreach($commaArray as $commaPos) {
    $vals = explode(" ", substr($classes, $start, $commaPos - $start));

    echo "<button type=\"button\" class=\"mt-4 btn py-3\" style=\"background-color: white; border-radius: 25px;\">";
    echo $vals[1] . " " . $vals[2];
    echo "</button>";
    
}

$vals = explode(" ", substr($classes, $commaArray[count($commaArray) - 1] + 1));
echo "<button type=\"button\" class=\"mt-4 btn py-3\" style=\"background-color: white; border-radius: 25px;\">";
echo $vals[1] . " " . $vals[2];
echo "</button>";


function retrieveClassInfo($departCode, $departNum) {
        /*
    $sql = sprintf("SELECT * FROM class WHERE department_code=? AND department_number=?");
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("ss", $vals[1], $vals[2]);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    */
}

