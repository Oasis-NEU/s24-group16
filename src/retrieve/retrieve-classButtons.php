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


function echoButton($vals) {
    echo "<form method=\"post\">";
    echo "<button type=\"submit\" class=\"mt-4 btn py-3\" style=\"background-color: white; border-radius: 25px; width: 10vw;\">";
    echo $vals[1] . " " . $vals[2];
    echo "</button>";
    echo "<input name=\"department_code\" value=\"" 
        . $vals[1]
        . "\" type=\"hidden\">";
    echo "<input name=\"department_number\" value=\"" 
        . $vals[2]
        . "\" type=\"hidden\">";
    echo "</form>";
}

while (($offset = strpos($classes, ",", $offset)) !== false) {
    $commaArray[] = $offset;
    $offset++; // Increment the offset to move past the current comma
}

$start = 0;
foreach($commaArray as $commaPos) {
    $vals = explode(" ", substr($classes, $start, $commaPos - $start));
    echoButton($vals);

}

$vals = explode(" ", substr($classes, $commaArray[count($commaArray) - 1] + 1));
echoButton($vals);



