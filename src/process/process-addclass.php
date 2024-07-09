<?php

//Execute database.php and get the MySQL database connection object
$mysqli = require __DIR__ . "/database.php";

//Preparing the MySQL command string.
$sql = "INSERT INTO class (class_id, title, classdescription)
        VALUES (?, ?, ?)";

//Creating the statement from the connection object
$stmt = $mysqli->stmt_init();

//Preparing the statement with the command
if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

//Binding the values to the command in the respective placeholders
$stmt->bind_param("iss", $_POST["id"], 
                        $_POST["title"], 
                        $_POST["classdescription"]);

//Execute the command
$stmt->execute();

//Move the user to YourClasses.html
header("Location: YourClasses.html");
exit;

?>