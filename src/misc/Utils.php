<?php

function createSecureSession() {
    session_start();

    if (!isset($_SESSION['last-regeneration'])) {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION['last_regeneration'] >= interval) {
            session_regenerate_id(true);
            $_SESSION['last-regeneration'] = time();
        }
    }
}

function configServer() {
    //Setting it to true (1 means true)
ini_set('session.use_only_cookies', 1);

//Only use session IDs created by this server
ini_set('session.use_strict_mode', 1);


session_set_cookie_params([
    'lifetime' => 1800,//30 mins
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true, //Use https connection
    'httponly' => true
]);

}

function displayNavbarItems() {
error_reporting(0);

if ($_SESSION != null) {
    echo '<li class="nav-item">';
    echo '<a href="/process/process-signout.php" class="nav-link">Sign Out</a>';
    echo '</li>';

    echo '<li class="nav-item">';
    echo '<a href="Profile.php" class="nav-link">Profile</a>';
    echo '</li>';

    echo '<li class="nav-item">';
    echo '<a href="YourClasses.php" class="nav-link">Your Classes</a>';
    echo '</li>';

    echo '<li class="nav-item">';
    echo '<a href="FindClasses.php" class="nav-link">Find Classes</a>';
    echo '</li>';
} else {
    echo '<li class="nav-item">';
    echo '<a href="Signup.php" class="nav-link">Create Account</a>';
    echo '</li>';

    echo '<li class="nav-item">';
    echo '<a href="Login.php" class="nav-link">Login</a>';
    echo '</li>';
}
error_reporting(-1);
}