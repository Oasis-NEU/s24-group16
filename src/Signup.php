<!-- This is the Signup page which you can get to by pressing "Signup" at the navbar, 
 or being automatically redirected from the Login page -->
<?php
//Starts a blank session
session_start();

require __DIR__ . "/misc/Utils.php";

//The navbar is 'embedded' here and includes all the standard script/ style links as well.
include_once __DIR__ . '/navbar.php';
?>

<!--The main page-->
<div class="text-light gradient-custom font-primary row" style="height: 85vh;">
    <section class="align-content-center">

        <div id="warningMsg" class="text-center"></div>
        <script src="./display/display-warningMsg.js"></script>
        <script src="./process/signupValidations.js"></script>
        <script>
            //Checks the url message and displays the appropriate message to the user.
            warn({
                'no account': "You don't have an account with us. Create one today!",
                'already existing': "You already have an account! Please <a href=\"Login.php\">Login</a>.",
                'eight chars': "Password must be at least 8 characters.",
                'one letter': "Password must contain at least one letter.",
                'one number': "Password must contain at least one number.",
                'must match': "Passwords must match.",
                'invalid email': "Email is not in the correct format."
            });
            
        </script>

        
        <!-- The signup area -->
        <div class="d-flex justify-content-center" style="width: 100vw;">
            <div class="justify-content-center" style="width: 30vw; height: 70vh; transform: translateX(12%); 
            z-index: 1; background-color: white; border-radius: 50px;">
                <section style="color: black;">
                    <h1 class="mb-4 text-center" style="font-size: 6vh; margin-top: 5vh;">Create Account</h1>
                    <div style="width: 70%" class="container justify-content-center text-center">
                        <form onsubmit="return clientSideValidateSignup()" 
                        action="process/process-signup.php" method="post" id="signup">
                            <div class="mb-3" style="margin-top: 5vh;">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" style="border-radius: 100px; height: 5vh;">
                                <script> 
                                document.getElementById('email').value = 
                                 new URLSearchParams(window.location.search).get('email');
                                </script>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    style="border-radius: 100px; height: 5vh;">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password-confirmation"
                                    name="password_confirmation" style="border-radius: 100px; height: 5vh;">
                            </div>
                            <button type="submit" class="btn btn-theme-orange text-center"
                                style="border-radius: 100px; margin-top: 2vh; font-size: 3vh;">Sign Up</button>
                        </form>
                    </div>
                </section>
            </div>

            <!-- The underlay with some advertising info -->
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
</html>