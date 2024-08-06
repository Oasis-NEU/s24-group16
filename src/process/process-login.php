<!-- Is linked as the action script for the login.php login form
 
Checks if the user exists, validates the password, if good creates a secure session
using a function from Utils.php.

If the password is wrong, redirects to Login.php with a url message "wrong password"

If the email doesn't exist in the database then redirects to Signup.php with message "no account"
-->
<?php
session_start();

require __DIR__ . "/../misc/Utils.php";

//If the method is Post (The form method does this) Execute the following code
$_SESSION["valid-login"] = true;
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //Embeds the database code into this file and executes it within the current script (at this line)
    //The database.php file returns the MySQL database connection object
    $mysqli = require __DIR__ . "/../database/database.php";

    //using sprintf to format the SQL command, %s is the placeholder for the second arg
    //$mysqli->real_escape_string() is used to escape special characters in the $_POST["email"] value
    //since not all characters are safe for SQL
    //TLDR formats an SQL command that gets the result when you enter an email
    $sql = sprintf("SELECT * FROM profile
                    WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);

    //retrieves a row of the data from the result as an associative array
    $user = $result->fetch_assoc();

    //If $user is not null (there is a result)
    if ($user) {
        //Compares the plaintext password with the hashed password of $user
        if (password_verify($_POST["password"], $user["password_hash"])) {
            createSecureSession();

            //Stores the email in a session variable for tracking the user.
            $_SESSION["email"] = $user["email"];

            //Redirects user to ViewProfile.html
            header("Location: ../ViewProfile.php?profile=" . urlencode("own"));

            exit;
        } else {
            $_SESSION["valid-login"] = false;
            header("Location: ../Login.php?message=" . urlencode("wrong password"));
            exit;
        }
    }

    $_SESSION["valid-login"] = false;
    header("Location: ../Signup.php?message=" . urlencode("no account"));
    exit;

}
