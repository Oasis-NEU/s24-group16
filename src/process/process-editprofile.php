<?php
session_start();
//execute database.php
$mysqli = require __DIR__ . "/../database/database.php";

$elements = array("first_name", "last_name", "year", "major", "contacts", "looking_for", "bio");

for ($i = 0; $i < count($elements); $i++) {
    if ($_POST[$elements[$i]] != null) {
        $sql = "UPDATE profile
        SET " . $elements[$i] . " = ?
        WHERE email = ?";
    

        //create the statement using the MySQL connection object
        $stmt = $mysqli->stmt_init();

        //prepare the sql command in the statement
        if ( ! $stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }
    
        if ($elements[$i] == "year") {
            $stmt->bind_param("is", $_POST[$elements[$i]], $_SESSION["email"]);
        } else {
            $stmt->bind_param("ss", $_POST[$elements[$i]], $_SESSION["email"]);
        }

        //runs the command
        $stmt->execute();
    }
}

//redirects user to YourClasses.html
header("Location: ../ViewProfile.php");
exit;

?>