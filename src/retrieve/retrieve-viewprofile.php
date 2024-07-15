<?php

//execute database.php
$mysqli = require __DIR__ . "/../database.php";

$sql = "SELECT ?
        FROM profile
        WHERE email = ?;";

function prepareBindExecute($value, $email) {
    $stmt = $mysqli->stmt_init();
    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }
    $stmt->bind_param("ss", $value, $email);
    return htmlspecialchars($stmt->execute());
}

//Getters make it easier for front-end to use since
//the front-end is not responsible for getting the database name correct
//like with the spaceing e.g. first name, first-name, or first_name?
function getFirstName($email) {
    return prepareBindExecute('first_name', $email);
}

function getLastName($email) {
    return prepareBindExecute('last_name', $email);
}

function getYear($email) {
    return prepareBindExecute('year', $email);
}

function getContacts($email) {
    return prepareBindExecute('contacts', $email);
}

function getLookingFor($email) {
    return prepareBindExecute('looking_for', $email);
}

function getBio($email) {
    return prepareBindExecute('bio', $email);
}