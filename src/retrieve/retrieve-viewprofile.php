<!-- Required in the ViewProfile.php page, 

 this provides getter methods to fetch appropriate information from
 the database for a user to view their or other profiles-->
<?php

/**
 * Selects one piece of information from the profile for which the email is the defined email
 * and the piece of information is $value
 * @param string $value the piece of info to be retrieved (by name of what the actual SQL table has)
 * @param string $email the email of which to retrieve info from
 * @return mixed the actual value
 */
function prepareBindExecute($value, $email)
{
    $mysqli = require __DIR__ . "/../database/database.php";

    $stmt = $mysqli->stmt_init();

    $sql = "SELECT " . $value . " FROM profile WHERE email = ?";

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_assoc();

    return $row[$value];
}

//Getters make it easier for front-end to use since
//the front-end is not responsible for getting the database name correct
//like with the spaceing e.g. first name, first-name, or first_name?

/**
 * Echoes the first name from the database pertaining to the email given
 * @param string $email The email of the profile to get information from.
 * @return void (Echoes the first name)
 */
function getFirstName($email)
{
    echo prepareBindExecute('first_name', $email);
}

/**
 * Echoes the last name from the database pertaining to the email given
 * @param string $email The email of the profile to get information from
 * @return void (Echoes the last name)
 */
function getLastName($email)
{
    echo prepareBindExecute('last_name', $email);
}

/**
 * Echoes the year from the database pertaining to the email given
 * @param string $email The email of the profile to get information from
 * @return void (Echoes the year)
 */
function getYear($email)
{
    echo prepareBindExecute('year', $email);
}

/**
 * Echoes the major from the database pertaining to the email given
 * @param string $email The email of the profile to get information from
 * @return void (Echoes the major)
 */
function getMajor($email)
{
    echo prepareBindExecute('major', $email);
}

/**
 * Echoes the contacts from the database pertaining to the email given
 * @param string $email The email of the profile to get information from
 * @return void (Echoes the contacts)
 */
function getContacts($email)
{
    echo prepareBindExecute('contacts', $email);
}

/**
 * Echoes the looking for info from the database pertaining to the email given
 * @param string $email The email of the profile to get information from
 * @return void (Echoes the looking for info)
 */
function getLookingFor($email)
{
    echo prepareBindExecute('looking_for', $email);
}

/**
 * Echoes the bio from the database pertaining to the email the email given
 * @param string $email The email of the profile to get information from
 * @return void (Echoes the bio)
 */
function getBio($email)
{
    echo prepareBindExecute('bio', $email);
}