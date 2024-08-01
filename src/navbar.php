<!-- This is the navbar, a shared part of all pages that goes on top and establishes necessary style links -->
<!DOCTYPE html>
<html>

<head>
    <title>
        Study Buddy Networking App
    </title>
    <link href="../static/styles/main.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Quicksand:wght@300..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Quicksand:wght@300..700&display=swap');
    </style>
</head>

<body style="overflow-x: hidden;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm" style="padding-top: 4vh; padding-bottom: 4vh; background-color: #FFFFFF;">
        <div class="container font-secondary">
            <div class="row align-items-center">
                <img class="col-4 font-primary" src="../static/img/StudyBuddyIcon.png" style="width: 8vw;">
                <span class="col-4"><a href="About.php" class="navbar-brand font-primary"
                        style="line-height:110%; font-weight: 700;">Study Buddy<br>Networking</a></span>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu" style="font-size: 20px; font-weight: 475;">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <?php
                        error_reporting(0);

                        if ($_SESSION != null) {
                            echo '<li class="nav-item">';
                            echo '<a href="./process/process-signout.php" class="nav-link">Sign Out</a>';
                            echo '</li>';

                            echo '<li class="nav-item">';
                            echo '<a href="ViewProfile.php" class="nav-link">Profile</a>';
                            echo '</li>';

                            echo '<li class="nav-item">';
                            echo '<a href="YourClasses.php" class="nav-link">Your Classes</a>';
                            echo '</li>';

                            echo '<li class="nav-item">';
                            echo '<a href="SearchClass.php" class="nav-link">Find Classes</a>';
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

                        ?>
                </ul>
            </div>
        </div>
    </nav>