<!-- Included in the "SearchClass" page

 This receives the post call and searches for classes based on the information from the $_POSt variable
 Then it echo displays those classes with buttons to add them. -->
<?php

/**
 * Echoes a single result (html) from the information in $class with a button and 
 * invisible input information with the department code and number
 * @param array $class with keys "department_code" , "department_number", and "name" defined
 * @return void (echoes html)
 */
function showSingleResult($class) {
    echo "<form action=\"process/process-addclassbutton.php\" method=\"post\">";
    echo "<input name=\"class\" value=\" " 
    . $class['department_code'] 
    . " " 
    . $class['department_number'] 
    . "\" type=\"hidden\"></input>";
    echo "<button class='btn btn-theme-orange' style='margin-right: 20px; border-radius: 100px;'>Add</button>";
    echo "<label style='font-size: 20px; margin-bottom: 30px;' >" 
    . $class['department_code'] . " " . $class['department_number'] . " | " . $class["name"] . "</label>";
    echo "</form>";
    
}

//If the name of the class was searched for and not empty
if (isset($_POST["search-name"]) && $_POST["search-name"] != "") {
    //execute database.php
    $mysqli = require __DIR__ . "/../database/database.php";

    $search = "%" . $_POST["search-name"]  . "%";
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

    //While there is information in the result (loops through the information)
    while ($row = $result->fetch_assoc()) {
        showSingleResult($row);
    }

    //if both the search code and number were searched for and not empty
} else if (isset($_POST["search-code"]) && $_POST["search-code"] != "" 
&& isset($_POST["search-number"]) && $_POST["search-number"] != "") {
    //execute database.php
    $mysqli = require __DIR__ . "/../database/database.php";

    $sql = "SELECT * FROM class 
    WHERE UPPER(department_code) = UPPER(?) AND department_number = ?";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("ss", $_POST["search-code"], $_POST["search-number"]);

    //runs the command
    $stmt->execute();
    $result = $stmt->get_result();

    //While there is information in the result (loops through the information)
    while ($row = $result->fetch_assoc()) {
        showSingleResult($row);
    }

    //if the search code was the only input
} else if (isset($_POST["search-code"]) && $_POST["search-code"] != "" 
&& isset($_POST["search-number"]) && $_POST["search-number"] == "") {
    //execute database.php
    $mysqli = require __DIR__ . "/../database/database.php";

    $sql = "SELECT * FROM class 
    WHERE UPPER(department_code) = UPPER(?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $_POST["search-code"]);

    //runs the command
    $stmt->execute();
    $result = $stmt->get_result();

    //While there is information in the result (loops through the information)
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        showSingleResult($row);
    }

    //if the search number was the only input
} else if (isset($_POST["search-code"]) && $_POST["search-code"] == "" 
&& isset($_POST["search-number"]) && $_POST["search-number"] != "") {
    //execute database.php
    $mysqli = require __DIR__ . "/../database/database.php";

    $sql = "SELECT * FROM class 
    WHERE department_number = ?";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $_POST["search-number"]);

    //runs the command
    $stmt->execute();
    $result = $stmt->get_result();

    //While there is information in the result (loops through the information)
    while ($row = $result->fetch_assoc()) {
        showSingleResult($row);
    }
}
