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

