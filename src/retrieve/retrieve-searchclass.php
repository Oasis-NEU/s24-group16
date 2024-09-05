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
    echo "<script>showSingleResult('" 
    .  $class['department_code'] . "', " 
    . $class['department_number'] . ", '" 
    . $class['name'] . "');</script>";
    
}

/**
 * Loops back with the user to inform them that there were no search results.
 */
function displayNoResult() {
    echo "<script>displayNoResult();</script>";
}

/**
 * Displays to the user the value of one search param that was entered into a search.
 * @param string The actual value of one search param
 * @param string The name of the search param
 */
function displayOneSearchParam($searchValue, $searchName) {
    echo "<script>displayOneSearchParam('" . $searchValue . "', '" . $searchName . "');</script>";
}

/**
 * Displays to the user the value of two search params, specifically searchCode and searchNumber
 * @param string the value of the search code
 * @param string the value of the search number
 */
function displayTwoSearchParams($searchCode, $searchNumber) {
    echo "<script>displayTwoSearchParams('" . $searchCode . "', '" . $searchNumber . "');</script>";
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

    displayOneSearchParam($_POST["search-name"], "search name");

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

    displayTwoSearchParams($_POST["search-code"], $_POST["search-number"]);

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

    displayOneSearchParam($_POST["search-code"], "search code");

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

    displayOneSearchParam($_POST["search-number"], "search number");
} 

if (isset($stmt)) {
     //runs the command
     $stmt->execute();
     $result = $stmt->get_result();
 
     $noResult = true;
     //While there is information in the result (loops through the information)
     while ($row = $result->fetch_assoc()) {
        if ($noResult) {
            $noResult = false;
        }
         showSingleResult($row);
     }
 
     if ($noResult) {
        displayNoResult();
     }

}