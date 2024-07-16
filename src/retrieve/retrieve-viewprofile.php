<?php

function prepareBindExecute($value) {
    $mysqli = require __DIR__ . "/../database/database.php";

    $stmt = $mysqli->stmt_init();

    $sql = "SELECT " . $value . " FROM profile WHERE email = ?";

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $_SESSION["email"]);

    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    
    return $row[$value];
}

//Getters make it easier for front-end to use since
//the front-end is not responsible for getting the database name correct
//like with the spaceing e.g. first name, first-name, or first_name?
function getFirstName() {
    echo prepareBindExecute('first_name', $_SESSION["email"]);
}

function getLastName() {
    echo prepareBindExecute('last_name', $_SESSION["email"]);
}

function getYear() {
    echo prepareBindExecute('year', $_SESSION["email"]);
}

function getMajor() {
    echo prepareBindExecute('major', $_SESSION["email"]);
}


function getContacts() {
    echo prepareBindExecute('contacts', $_SESSION["email"]);
}

function getLookingFor() {
    echo prepareBindExecute('looking_for', $_SESSION["email"]);
}

function getBio() {
    echo prepareBindExecute('bio', $_SESSION["email"]);
}