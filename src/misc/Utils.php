<?php

/**
 * Creates a secure session by regenerating an ID at a constant interval
 * @return void
 */
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

/**
 * Configures the server to only accept session IDs created by the server
 * @return void
 */
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

/**
 * Echos a warning message with centered text
 * @param string $text the warning message
 * @return void (echoes html)
 */
function echoWarningMessage($text) {
    echo "<div class='text-center' style='color: black; background-color: white; width: 40vw; 
    margin: auto; padding-top: 10px; padding-bottom: 10px; margin-bottom: 30px; border-radius: 50px; margin-top: 30px;'>
    " . $text . "
    </div>";
}