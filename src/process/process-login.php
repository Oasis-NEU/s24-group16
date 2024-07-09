<?php

//If the method is Post (The form method does this) Execute the following code
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //Embeds the database code into this file and executes it within the current script (at this line)
    //The database.php file returns the MySQL database connection object
    $mysqli = require __DIR__ . "/database.php";

    //using sprintf to format the SQL command, %s is the placeholder for the second arg
    //$mysqli->real_escape_string() is used to escape special characters in the $_POST["email"] value
    //since not all characters are safe for SQL
    //TLDR formats an SQL command that gets the result when you enter an email
    $sql = sprintf("SELECT * FROM login
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    //retrieves a row of the data from the result as an associative array
    $user = $result->fetch_assoc();

    //If $user is not null (there is a result)
    if ($user) {
        //Compares the plaintext password with the hashed password of $user
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();

            //Regenerates the session ID to prevent session fixation attacks.
            session_regenerate_id();

            //Stores the email in a session variable for tracking the user.
            $_SESSION["user_id"] = $user["email"];

            //Redirects user to YourClasses.html
            header("Location: YourClasses.html");
            exit;
        }
    }

    $is_invalid = true;
}
