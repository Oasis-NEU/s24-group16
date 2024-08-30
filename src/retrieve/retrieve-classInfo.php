<!-- A file included in YourClasses after retrieve-classButtons is included, this either:

  retrieves your first class, 
  retrieves a class specified in the session variable,

  informs the user that you have no classes and you should search for classes to add one. -->
<?php

require __DIR__ . "/../misc/Utils.php";

//If the $vals variable, which contains class info from classButtons which is included before this, is set.
//Note that $vals is set in the "retrieve-classButtons.php" file, 
//which is included before this file within the YourClasses.php file.
if (isset($vals)) {
    if (isset($_POST['department_code']) && isset($_POST['department_number'])) {
        $row = retrieveClassInfo($_POST['department_code'], $_POST['department_number']);
    } else {
        $row = retrieveClassInfo($vals[0], $vals[1]);
    }

    echo "<script>displayClassInfo('" . $row['name'] . "', '" . $row['description'] . "');</script>";
    include "retrieve/retrieve-classmates.php";
} else {
    $row = null;

    echo "<script>displayNoClasses();</script>";

    //echo "<div class=\"flex-column text-center\"
    //style=\"background-color: white; width: 80%; border-radius: 50px; padding-top:8vh; padding-bottom: 8vh; margin-top: 5vh; margin-bottom: 5vh; height: 72vh;\">";
    //echo "<h3>You have no classes. Go to <a href=\"SearchClass.php\">Find Classes</a> to add some!</h3>";
    //echo "</div>";
}
