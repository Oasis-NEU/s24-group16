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
        $bindVal = $row['classes'] . "," . $class;
    } else {
        $bindVal = $class;
    } 
    $sql2 = "UPDATE profile SET classes=? WHERE email=?"; 

    $stmt2 = $mysqli->stmt_init();
    $stmt2->prepare($sql2);
    $stmt2->bind_param("ss", $bindVal, $_SESSION['email']);
    $stmt2->execute();

    $sql3 = "SELECT people FROM class WHERE department_code=? AND department_number=?";
    $stmt3 = $mysqli->stmt_init();
    $stmt3->prepare($sql3);

    $values = explode(" ", $_POST['class']);
    $stmt3->bind_param("ss", $values[1], $values[2]);
    $stmt3->execute();
    $result=$stmt3->get_result();
    $row = $result->fetch_assoc();

    if (strpos($row["people"], $_SESSION["email"]) == false) {
        if ($row["people"] != null) {
            $bindVal = $row["people"] . "," . $_SESSION["email"];
        } else {
            $bindVal = $_SESSION["email"];
        }
    }
    $sql4 = "UPDATE class SET people=? WHERE department_code=? AND department_number=?";
    $stmt4 = $mysqli->stmt_init();
    $stmt4->prepare($sql4);
    $stmt4->bind_param("sss", $bindVal, $values[1], $values[2]);
    $stmt4->execute();

    }
    header("Location: ../YourClasses.php");
    exit;
}