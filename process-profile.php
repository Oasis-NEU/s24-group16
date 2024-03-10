<?php

 print_r($_POST);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO profile (email, first_name, last_name, major, grade, bio, instagram)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssiss", $_POST["email"], 
                            $_POST["first_name"], 
                            $_POST["last_name"], 
                            $_POST["major"], 
                            $_POST["grade"], 
                            $_POST["bio"], 
                            $_POST["instagram"]);

$stmt->execute();

header("Location: YourClasses.html");
exit;

?>