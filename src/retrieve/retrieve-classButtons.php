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
     * code is the element at index 1, and the department number is at index 2.
     * @return void
     */
    function echoButton($vals)
    { 
        
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

    //Stores the positions of the commas into $commaArray[]
    while (($offset = strpos($classes, ",", $offset)) !== false) {
        //Remainder: this is how you add values to an array
        $commaArray[] = $offset;
        $offset++; // Increment the offset to move past the current comma
    }

    //If there are multiple elements
    if (count($commaArray) > 0) {
        
        $start = 0;
        foreach ($commaArray as $commaPos) {
            //The $classes string is parsed into an array and passed into $vals
            $vals = explode(" ", substr($classes, $start, $commaPos - $start));
            echoButton(str_replace(',','', $vals));
        }

        $vals = explode(" ", substr($classes, $commaArray[count($commaArray) - 1] + 1));
        if (count($vals) != 0) {
            echoButton($vals);
        }
    } else {
        $vals = explode(" ", substr($classes, 0));
        echoButton($vals);
    }
}