<?php
session_start();
//unsets all session variables
session_unset();

//actually destroys the session
session_destroy();

header("Location: ../About.php");