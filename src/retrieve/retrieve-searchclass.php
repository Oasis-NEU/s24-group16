<?php

if (isset($_POST["search"])) {
    //execute database.php
    $mysqli = require __DIR__ . "/../database/database.php";

    $search = "%" . $_POST["search"]  . "%";

    $sql = "SELECT * FROM class 
    WHERE UPPER(name) LIKE UPPER(?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $search);

    //runs the command
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result ->fetch_assoc()) {
        echo "<form action=\"process/process-searchclass.php\" method=\"post\">";
        echo "<input name=\"class\" value=\" " 
        . $row['department_code'] 
        . " " 
        . $row['department_number'] 
        . "\" type=\"hidden\"></input>";
        echo "<button>"
        . $row["name"] . "</button></form>";
    }
}
