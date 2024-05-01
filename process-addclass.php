<?php

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO class (class_id, title, classdescription)
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("iss", $_POST["id"], 
                        $_POST["title"], 
                        $_POST["classdescription"]);

$stmt->execute();

header("Location: YourClasses.html");
exit;

?>