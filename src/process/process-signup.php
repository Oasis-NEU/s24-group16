<?php

//Checks if the email is in a valid format using php's build-in FILTER_VALIDATE_EMAIL variable.
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("valid email is required");
}

//Other checks
if(strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

//creates a password hash
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

//require executes database.php
$mysqli = require __DIR__ . "/../database/database.php";

//command to insert value into database.php
$sql = "INSERT INTO login (email, password_hash)
        VALUES (?, ?)";

//Initializes a statement object
$stmt = $mysqli->stmt_init();

//If the statement initialization wasn't successful, display an error
if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

//binds parameters into the placeholders produced by the prepare($sql)
//"ss" is the types (strings)
//binding prevents SQL injection attacks by separating SQL code from data
$stmt->bind_param("ss", $_POST["email"], $password_hash);

//finally execute the statement/ commands from $sql
if ($stmt->execute()) {
    //If everything is good we go to EditProfile.html
    header("Location: EditProfile.html");
    exit;
} else {
    //if not then we assume the email has been taken. (email column needs to be defined as unique in the sql beforehand)
    if ($mysqli->errno === 1062) {
        die("email already taken");
    }
    die($mysqli->error . " " . $mysqli->errno);
}

$_SESSION = $_POST["email"];


?>