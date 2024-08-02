<!-- Required in the ViewProfile.php page, 

 this provides getter methods to fetch appropriate information from
 the database in order for a user to view their profile-->
<?php

/**
 * Selects one piece of information from the profile for which the email is the session's email
 * and the piece of information is $value
 * @param string $value the piece of info to be retrieved (by name of what the actual SQL table has)
 * @return mixed the actual value
 */
function prepareBindExecute($value)
{
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

/**
 * Echoes the first name from the database pertaining to the email of this session
 * @return void (Echoes the first name)
 */
function getFirstName()
{
    echo prepareBindExecute('first_name', $_SESSION["email"]);
}

/**
 * Echoes the last name from the database pertaining to the email of this session
 * @return void (Echoes the last name)
 */
function getLastName()
{
    echo prepareBindExecute('last_name', $_SESSION["email"]);
}

/**
 * Echoes the year from the database pertaining to the email of this session
 * @return void (Echoes the year)
 */
function getYear()
{
    echo prepareBindExecute('year', $_SESSION["email"]);
}

/**
 * Echoes the major from the database pertaining to the email of this session
 * @return void (Echoes the major)
 */
function getMajor()
{
    echo prepareBindExecute('major', $_SESSION["email"]);
}

/**
 * Echoes the contacts from the database pertaining to the email of this session
 * @return void (Echoes the contacts)
 */
function getContacts()
{
    echo prepareBindExecute('contacts', $_SESSION["email"]);
}

/**
 * Echoes the looking for info from the database pertaining to the email of this session
 * @return void (Echoes the looking for info)
 */
function getLookingFor()
{
    echo prepareBindExecute('looking_for', $_SESSION["email"]);
}

/**
 * Echoes the bio from the database pertaining to the email of this session
 * @return void (Echoes the bio)
 */
function getBio()
{
    echo prepareBindExecute('bio', $_SESSION["email"]);
}