<?php
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
