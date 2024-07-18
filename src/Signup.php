<?php
include_once __DIR__ . '/navbar.php';
require "misc/Utils.php";
session_start();

?>

<!--The main page-->
<div class="text-light gradient-custom font-primary row" style="height: 85vh;">
    <section class="align-content-center">
        <?php
        if (isset($_GET['message'])) {
            $message = htmlspecialchars($_GET['message']);
            if ($message == 'no account') {
                echoWarningMessage("You don't have an account with us. Create one today!");
            } else if ($message == 'already existing') {
                echoWarningMessage("You already have an account! Please <a href=\"Login.php\">Login</a>.");
            } else if ($message == 'eight chars') {
                echoWarningMessage("Password must be at least 8 characters.");
            } else if ($message == 'one letter') {
                echoWarningMessage("Password must contain at least one letter.");
            } else if ($message == 'one number') {
                echoWarningMessage("Password must contain at least one number.");
            } else if ($message == 'must match') {
                echoWarningMessage('Passwords must match.');
            } else if ($message == 'invalid email') {
                echoWarningMessage('Email is not in the correct format.');
            }
        }
        ?>
        <div class="d-flex justify-content-center" style="width: 100vw;">
            <div class="justify-content-center" style="width: 30vw; height: 70vh; transform: translateX(12%); 
            z-index: 1; background-color: white; border-radius: 50px;">
                <section style="color: black;">
                    <h1 class="mb-4 text-center" style="font-size: 6vh; margin-top: 5vh;">Create Account</h1>
                    <div style="width: 70%" class="container justify-content-center text-center">
                        <form action="process/process-signup.php" method="post" id="signup" novalidate>
                            <div class="mb-3" style="margin-top: 5vh;">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" style="border-radius: 100px; height: 5vh;">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    style="border-radius: 100px; height: 5vh;">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" style="border-radius: 100px; height: 5vh;">
                            </div>
                            <button type="submit" class="btn btn-theme-orange text-center"
                                style="border-radius: 100px; margin-top: 2vh; font-size: 3vh;">Sign Up</button>
                        </form>
                    </div>
                </section>
            </div>
            <div class="theme-orange" style="width: 35vw; height: 70vh; 
            border-radius: 50px; z-index: 0; transform: translateX(-12%); padding-left: 11vw; padding-top: 6vh;">
                <h2 style="font-weight: 100">
                    Why Study Buddy
                    <br> Networking?
                </h2>
                <p style="font-weight: 100; font-size: 3.6vh; margin-top: 10%;">
                    Find buddies from your<br>school and your class
                </p>
                <p style="font-weight: 100; font-size: 3.6vh;">
                    Communicate through<br>your preferred methods
                </p>
                <p style="font-weight: 100; font-size: 3.6vh;">
                    Increase your<br>networking presence
                </p>
            </div>
        </div>
    </section>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<script src="Login.js"></script>

</html>