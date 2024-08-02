<!-- Marked as the action script for the signup form on the Signup.php page
 
Receives the email from the post, tries to see if the email already exists and 
if so redirects to Signup.php with a url code message "already existing"

Validates the format of the email/ passwords:
    must have at least one letter
    must have at least one character
    the 2 password inputs must match
    email must be in valid format

Creates the profile with the password and email using SQL then redirects to EditProfile.php
-->
<?php

//require executes database.php
$mysqli = require __DIR__ . "/../database/database.php";


if ($_POST["email"]) {
    $sql = "SELECT 1 FROM profile WHERE email = ?";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $_POST["email"]);

    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    if ($row[1] == 1) {
        header("Location: ../Signup.php?message=" . urlencode("already existing"));
        exit();
    }
}

//Checks if the email is in a valid format using php's build-in FILTER_VALIDATE_EMAIL variable.
$invalidRedirect = "Location: ../Signup.php?message=";
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    header($invalidRedirect . "invalid+email");
    exit;
}

//Other checks
if (strlen($_POST["password"]) < 8) {
    header($invalidRedirect . "eight+chars");
    exit;
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    header($invalidRedirect . "one+letter");
    exit;
}

if (!preg_match("/[0-9]/i", $_POST["password"])) {
    header($invalidRedirect . "one+number");
    exit;
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    header($invalidRedirect . "must+match");
    exit;
}

//creates a password hash
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

//command to insert value into database.php
$sql = "INSERT INTO profile (email, password_hash)
        VALUES (?, ?)";

//Initializes a statement object
$stmt = $mysqli->stmt_init();

//If the statement initialization wasn't successful, display an error
if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

//binds parameters into the placeholders produced by the prepare($sql)
//"ss" is the types (strings)
//binding prevents SQL injection attacks by separating SQL code from data
$stmt->bind_param("ss", $_POST["email"], $password_hash);

//finally execute the statement/ commands from $sql
if ($stmt->execute()) {
    //If everything is good we go to EditProfile.html
    session_start();
    $_SESSION["email"] = $_POST["email"];
    header("Location: ../EditProfile.php");
    exit;
}




?>