<?php

$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM login
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["email"];

            header("Location: YourClasses.html");
            exit;
        }
    }

    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Study Buddy Networking App
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body style="background-color: #384047">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark py-3">
            <div class="container">
            <a href="#" class="navbar-brand">Study Buddy Networking App</a>
            
            <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="Login.html" class="nav-link">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ViewProfile.html" class="nav-link">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#yourClasses" class="nav-link">
                            Your Classes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#findClasses" class="nav-link">
                            Find Classes
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <section class="text-light p-5">
            <h1 class="mb-4 text-center">Log In</h1>
            <div style="width: 50%" class="d-flex flex-column align-items-center container justify-content-center">
            <form method="post">
                <div class="mb-3 mt-3">
                  <label for="exampleInputEmail" class="form-label"><strong>Email address</strong></label>
                  <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp"
                  value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                </div>
                <p><span id="emailWarning"></span></p>
                <div class="mb-3">
                  <label for="exampleInputPassword" class="form-label"><strong>Password</strong></label>
                  <input type="password" class="form-control" id="inputPassword" name="password">
                </div>
                <p><span id="passwordWarning"></span></p>
                <div class="d-flex flex-column align-items-center">
                <button type="submit" class="btn btn-primary bg-primary mt-3 text-center">Log In</button>
                </div>
              </form>
              <p style="margin-top: 20%">Don't have an account?</p>
              <a href="Signup.html"><button type="signUp" class="btn btn-primary bg-primary text-center">Sign Up</button></a>
            </div>
        </section>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="Login.js"></script>
</html>