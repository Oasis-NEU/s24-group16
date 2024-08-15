<!-- This is the login page which can be reached by clicking "Login" from the navbar -->
<?php
//starts a blank session
session_start();

require __DIR__ . '/misc/Utils.php';

//The navbar is 'embedded' here and includes all the standard script/ style links as well.
include_once __DIR__ . '/navbar.php';

?>

<!--The main page-->
<div class="text-light gradient-custom font-primary row" style="height: 85vh;">
    </section>
    <section class="text-center align-content-center">
        <div id="warningMsg"></div>
        <script src="./misc/display-warningMsg.js"></script>
        <script>
            //Checks the url message and displays the appropriate message to the user.
            warn({"wrong password": "You have entered an invalid password. Please try again.",
                "no account": "You don't have an account, please <a href='Signup.php'>Sign p</a>!"
            });
        </script>

        <!-- The main login area -->
        <div class="d-flex justify-content-center" style="">
            <div class="login-background-image" style="width: 35vw;">

            </div>
            <div class="overlay-content2 justify-content-center" style="width: 30vw; padding-bottom: 5vh;">
                <div style="font-size: 5.5vh;
                        font-weight: 500; margin-top: 6vh;">Welcome Back!
                </div>
                <form action="process/process-login.php" method="post">
                    <div class="container justify-content-center" style="width: 50%; margin-top: 5vh;">
                        <label for="exampleInputEmail" class="form-label"><strong>Email address</strong></label>
                        <input type="email" class="form-control" id="inputEmail" name="email"
                            aria-describedby="emailHelp" style="border-radius: 100px; height: 5.5vh;"
                            value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                        <!--Note the value script is part of the validation process-->
                    </div>
                    <p><span id="emailWarning"></span></p>
                    <div class="container justify-content-center" style="width: 50%; margin-top: 5vh;">
                        <label for="exampleInputPassword" class="form-label"><strong>Password</strong></label>
                        <input type="password" class="form-control" id="inputPassword" name="password"
                            style="border-radius: 100px; height: 5.5vh;">
                    </div>
                    <p><span id="passwordWarning"></span></p>
                    <div class="d-flex flex-column align-items-center">
                        <button type="submit" class="btn btn-theme-orange text-center"
                            style="border-radius: 100px; width: 80px; margin-top: 2vh;">Login
                        </button>
                    </div>
                </form>
                <p style="margin-top: 3vh;">Don't have an account? <a href="Signup.html">Sign
                        up!</a></p>
            </div>
        </div>
    </section>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</html>