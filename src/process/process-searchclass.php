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
    if (strpos($row["classes"], $class) !== false) {
    } else {
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
    }
    header("Location: ../YourClasses.php");
    exit;
}