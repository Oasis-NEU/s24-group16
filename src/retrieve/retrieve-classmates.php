<!-- Included in the ViewClasses page, displays the classmates from that class and buttons for you to look at their profile
 
Uses a variable $row
that is defined in the retrieve-classInfo script (which is included before this script in the page) to
determine which class to get all of the information from. -->
<?php 


//base64_encode()

function personHyperLink($email) {

//execute database.php
$mysqli = require __DIR__ . "/../database/database.php";

$sql = sprintf("SELECT first_name, last_name FROM profile WHERE email=?", $mysqli);

//create the statement using the MySQL connection object
$stmt = $mysqli->stmt_init();

//prepare the sql command in the statement
if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

//bind values, the first arg is just the insert type
$stmt->bind_param("s", $_SESSION['email']);

//runs the command
$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_assoc();

echo "<a href=\"ViewProfile.php?profile=" . base64_encode($email) . "\">";
echo "<p style=\"margin-left:5vw;\">" . $row["first_name"] . " " . $row["last_name"] .  "</p>";
echo "</a>";

}

$hasClassmates = false;
if (isset($row)) {
    $people = $row['people'];

    $peopleArray = explode(",", $people);

    foreach ($peopleArray as $person) {
        if (trim($person) != $_SESSION["email"]) {
            personHyperLink(trim($person));
            $hasClassmates = true;
        }
    }

}

if (!$hasClassmates) {
    echo "<p>Oh no! There are no classmates using Study Buddy in your class: try reaching out to your professor to introduce more of your classmates to this platform!</p>";
}