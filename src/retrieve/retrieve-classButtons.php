<!-- A file included in YourClasses, 

 this first retrieves all classes pertaining to the email set beforehand in the session variable -->
<?php

//execute database.php
$mysqli = require __DIR__ . "/../database/database.php";

$sql = sprintf("SELECT classes FROM profile WHERE email=?", $mysqli);

//create the statement using the MySQL connection object
$stmt = $mysqli->stmt_init();

//prepare the sql command in the statement
if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

//bind values, the first arg is just the insert type
$stmt->bind_param("s", $_SESSION['email']);

//runs the command
$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

//If there are actually classes from our query
if (isset($row["classes"])) {
    $classes = $row["classes"];

    $classesArray = array();

    $done = false;

    $commaArray = array();

    $offset = 0;
    
        /**
     * Echos the html formatting for a class button 
     * @param array $vals an array where the department
     * code is the element at index 0, and the department number is at index 1.
     * @return void
     */
    function echoButton($vals)
    { 
        echo "<script>echoClassButton('" . $vals[0] . "', '" . $vals[1] . "');</script>";
    }

    $classesArray = explode(",", $classes);

    foreach ($classesArray as $class) {
        $vals = array_map('trim', explode(" ", trim($class)));
            echoButton($vals);
    }
}