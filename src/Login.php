
<!DOCTYPE html>
<html>
<head>
    <title>
        Study Buddy Networking App
    </title>
    <link href = "../static/styles/main.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Quicksand:wght@300..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Quicksand:wght@300..700&display=swap');
    </style>
</head>
<body style="height:100%; overflow-x: hidden; overflow-y: hidden;">
<!-- Navbar -->
<nav class="navbar navbar-expand-sm" style="padding-top: 4vh; padding-bottom: 4vh;">
    <div class="container font-secondary">
    <div class="row align-items-center">
        <img class="col-4 font-primary" src="../static/img/StudyBuddyIcon.png" style="width: 8vw;">
        <span class="col-4"><a href="#" class="navbar-brand font-primary" style="line-height:110%; font-weight: 700;">Study Buddy<br>Networking</a></span>
    </div>
    
    <button class="navbar-toggler" type="button"
    data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navmenu" style="font-size: 20px; font-weight: 475;">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item mx-2">
                <a href="Login.php" class="nav-link">
                    Login
                </a>
            </li>
            <li class="nav-item mx-2">
                <a href="ViewProfile.html" class="nav-link">
                    Profile
                </a>
            </li>
            <li class="nav-item mx-2">
                <a href="YourClasses.html" class="nav-link">
                    Your Classes
                </a>
            </li>
            <li class="nav-item mx-2">
                <a href="SearchClass.php" class="nav-link">
                    Find Classes
                </a>
            </li>
        </ul>
    </div>
    </div>
</nav>
<!--The main page-->
<div class="text-light gradient-custom font-primary row" style="height: 85vh;">
    </section>
    <section class="text-center align-content-center">
        <div class="d-flex justify-content-center" style="width: 100vw;">
            <div class="login-background-image" style="width: 35vw; height: 70vh;">
                
            </div>
            <div class="overlay-content2 justify-content-center" style="width: 30vw; height: 70vh;">
                <div style="font-size: 5.5vh;
                        font-weight: 500; margin-top: 6vh;">Welcome Back!
                </div>
                <form action="process-login.php" method="post">
                <div class="container justify-content-center" style="width: 50%; margin-top: 5vh;">
                    <label for="exampleInputEmail" class="form-label"><strong>Email address</strong></label>
                    <input type="email" class="form-control"
                           id="inputEmail" name="email" aria-describedby="emailHelp"
                           style="border-radius: 100px; height: 5.5vh;"
                           value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
<!--Note the value script is part of the validation process-->
                </div>
                <p><span id="emailWarning"></span></p>
                <div class="container justify-content-center" style="width: 50%; margin-top: 5vh;">
                    <label for="exampleInputPassword" class="form-label"><strong>Password</strong></label>
                    <input type="password" class="form-control"
                           id="inputPassword" name="password" style="border-radius: 100px; height: 5.5vh;">
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