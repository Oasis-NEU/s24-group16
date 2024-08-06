<!-- A file included in YourClasses, this either:

  retrieves your first class, 
  retrieves a class specified in the session variable,

  informs the user that you have no classes and you should search for classes to add one. -->
<?php

require __DIR__ . "/../misc/Utils.php";

//If the $vals variable, which contains class info, is set.
//Note that $vals is set in the "retrieve-classButtons.php" file, 
//which is included before this file within the YourClasses.php file.
if (isset($vals)) {
    if (isset($_POST['department_code']) && isset($_POST['department_number'])) {
        $row = retrieveClassInfo($_POST['department_code'], $_POST['department_number']);
    } else {
        $row = retrieveClassInfo($vals[0], $vals[1]);
    }

    echo "<div class=\"flex-column\"
            style=\"background-color: white; width: 80%; border-radius: 50px; padding-top:8vh; padding-bottom: 8vh; margin-top: 5vh; margin-bottom: 5vh;\">";
    echo "<h2 class=\"font-primary text-center\">" . $row['name'] . "</h2>";
    echo "<p class=\"text-center\" style=\"margin-top: 5vh; padding-left: 5vw; padding-right: 5vw;\">" . $row['description'] . "</p>";
    echo "<p style=\"margin-left:5vw; margin-top: 5vh; margin-bottom: 5vh;\">";
    echo "Classmates looking for buddies:";
    include "retrieve/retrieve-classmates.php";
    echo "</p>";
    echo "</div>";
} else {
    $row = null;
    echo "<div class=\"text-center\" style=\"height: 75vh; o: 0%;\">";
    echo "<h3>You have no classes. Go to <a href=\"SearchClass.php\">Find Classes</a> to add some!</h3>";
    echo "</div>";
}
