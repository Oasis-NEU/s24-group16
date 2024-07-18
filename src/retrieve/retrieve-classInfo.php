<?php


function retrieveClassInfo($departCode, $departNum) {

    //execute database.php
    $mysqli = require __DIR__ . "/../database/database.php";

    $sql = sprintf("SELECT * FROM class WHERE department_code=? AND department_number=?");
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("ss", $departCode, $departNum);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

if (isset($vals)) {
if (isset($_POST['department_code']) && isset($_POST['department_number'])) {
    $row = retrieveClassInfo($_POST['department_code'], $_POST['department_number']);
    
} else {
    $row = retrieveClassInfo($vals[1], $vals[2]);

}


echo "<div class=\"text-center\">";
echo "<h2 class=\"font-primary\">" . $row['name'] . "</h2>";
echo "<p style=\"margin-top: 5vh; padding-left: 5vw; padding-right: 5vw;\">" . $row['description'] . "</p>";
echo "</div>";
echo "<p style=\"margin-left:5vw; margin-top: 5vh;\">";
echo "Classmates looking for buddies:";
echo "</p>";
echo "</div>";
} else {
    echo "<div class=\"text-center\">";
    echo "<h3>You have no classes. Go to <a href=\"SearchClass.php\">Find Classes</a> to add some!</h3>";
    echo "</div>";
}
