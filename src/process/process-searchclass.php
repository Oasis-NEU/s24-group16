<!-- Not directly included in the "SearchClass" page,

  is used as the action script for the button results of a search
 Adds the class to the user's class list, and the user to the class' user list when clicked
  -->

<?php
session_start();
if (isset($_POST['class'])) {
    
    $class = $_POST['class'];

    //execute database.php
    $mysqli = require __DIR__ . "/../database/database.php";

    $sql = "SELECT classes FROM profile WHERE email=?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result=$stmt->get_result();
    $row = $result->fetch_assoc();
    if (strpos($row["classes"], $class) == false) {
    if ($row["classes"] != null) {
        $bindVal = $row['classes'] . ", " . $class;
    } else {
        $bindVal = $class;
    } 
    $sql = "UPDATE profile SET classes=? WHERE email=?"; 

    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("ss", $bindVal, $_SESSION['email']);
    $stmt->execute();

    $sql = "SELECT people FROM class WHERE department_code=? AND department_number=?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql);

    $values = explode(" ", $_POST['class']);
    $stmt->bind_param("ss", $values[1], $values[2]);
    $stmt->execute();
    $result=$stmt->get_result();
    $row = $result->fetch_assoc();

    if (strpos($row["people"], $_SESSION["email"]) == false) {
        if ($row["people"] != null) {
            $bindVal = $row["people"] . "," . $_SESSION["email"];
        } else {
            $bindVal = $_SESSION["email"];
        }
    }
    $sql = "UPDATE class SET people=? WHERE department_code=? AND department_number=?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("sss", $bindVal, $values[1], $values[2]);
    $stmt->execute();

    }
    header("Location: ../YourClasses.php");
    exit;
}