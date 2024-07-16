<?php


//execute database.php
$mysqli = require __DIR__ . "/../database/database.php";

if ($_SERVER["REQUEST-METHOD"] == "POST") {
    $search = $_POST["search"];

    $query = "SELECT * FROM class 
    WHERE UPPER(name) LIKE UPPER('%?%')";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $search);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>