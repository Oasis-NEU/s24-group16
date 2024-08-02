<!-- This is the action linked from the navbar.php when you click the Signout head
 
This ends the session and redirects the user to the About page (About.php)-->

<?php
//resumes the session
session_start();

//unsets all session variables
session_unset();

//actually destroys the session
session_destroy();

//redirects user to About.php
header("Location: ../About.php");