<?php
session_start();
include_once __DIR__ . '/navbar.php';
?>
<!-- About, the card image is to allow overlay onto the image. font-primary is Quicksand-->
<section class="text-center text-light font-primary" style="position: relative;">
    <div class="card-body" style="background-color: rgb(89,89,89);">
        <div class="card-img-overlay">
            <!--Text overlay-->
            <div class="card-title" style="font-size: 54px; text-align: left; margin-left: 15%;
                    margin-top: 11%; line-height: 125%">Find your ideal<br>Study Buddy</div>
            <div style="font-size: 28px; text-align: left; margin-left: 15%; padding-top: 2%">
                Connect with like-minded students and<br>excel together
            </div>
            <!--For the buttons-->
            <div class="d-flex flex-row" style="justify-content:left; margin-left: 15%; margin-top:2%;">
                <!--Button 1-->
                <a href="Signup.php"><button class="about-btn btn btn-theme-blue font-primary"
                        style="border-radius: 100px;">
                        Sign Up
                    </button></a>
                <!--Button 2-->
                <a href="Login.php"><button class="about-btn btn btn-theme-orange font-primary"
                        style="margin-left: 1vw; border-radius: 100px;">
                        Login
                    </button></a>
            </div>
        </div>
        <img src="../static/img/About1.jpg" />
    </div>
</section>
<!--How it works-->
<section>
    <div class="d-flex font-primary">
        <img class="" src="../static/img/About2.png" style="margin-top: 100px; margin-bottom: 100px;
                margin-left: 100px; border-radius: 25px; width:40vw; height: 41vw;">
        <div class=" mx-5" style="padding-left: 5vw;">
            <h1 style="font-weight: 800; margin-top:110px;">How It Works</h1>

            <h2 style="font-weight: 800; margin-top:10vh; font-size: 28px;">Create Your Profile</h2>
            <p class="font-secondary" style="font-size: 3.5vh; margin-top: 20px;">Add your hobbies, social media,
                availability,
                and what you're looking for in a Studdy Buddy.</p>

            <h2 style="font-weight: 800; margin-top:40px; font-size: 28px;">Search and Add Classes</h2>
            <p class="font-secondary" style="font-size: 3.5vh; margin-top: 20px;">Search our extensive database, add
                your classes
                to your app so you can view tons of potential buddies!</p>

            <h2 style="font-weight: 800; margin-top:40px; font-size: 28px;">Connect With Buddies</h2>
            <p class="font-secondary" style="font-size: 3.5vh; margin-top: 20px;">Search for buddies from your classes
                page
                and view their profiles for their contacts and availability.</p>
        </div>
    </div>
</section>


<!--Discover Buddies in your classes-->
<div class="font-primary text-center">
    <h1 style="font-size: 52px; font-weight: 800; margin-top:50px">Discover Study Buddies in Your Classes</h1>
    <p style="font-size: 24px; margin-top:50px; margin-bottom: 150px;">
        Our study buddy web app allows you to easily browse through profiles<br>
        of other students in your specific class. Connect with them to become<br>
        study buddies and find lasting connections.
    </p>
    <div class="row align-items-center" style="width: 90vw; margin: auto; margin-bottom: 150px; ">
        <div class="col">
            <img src="../static/img/placeholder.png" style="width: 25vw; height: 35vh; border-radius: 10%;">
            <h2 style="font-weight: 800; margin-top: 30px; margin-bottom: 40px; font-size: 5vh;">Profile Customization
            </h2>
            <p style="padding-left: 1vw; padding-right: 1vw; font-size: 3.4vh;">Add what makes you unique! Display your
                Social Media handles so Buddies can
                follow you!</p>
        </div>
        <div class="col">
            <img src="../static/img/placeholder.png" style="width: 25vw; height: 35vh; border-radius: 10%;">
            <h2 style="font-weight: 800; margin-top: 30px;  margin-bottom: 40px; font-size: 5vh;">Class Browsing</h2>
            <p style="padding-left: 1vw; padding-right: 1vw; font-size: 3.4vh;"> Easily find the classes you're in from
                our
                database and view all the potential
                buddies from that class!</p>
        </div>
        <div class="col">
            <img src="../static/img/placeholder.png" style="width: 25vw; height: 35vh; border-radius: 10%;">
            <h2 style="font-weight: 800; margin-top: 30px;  margin-bottom: 40px; font-size: 5vh;">Buddy Profiles</h2>
            <p style="padding-left: 1vw; padding-right: 1vw; font-size: 3.4vh;">Get to know Buddies from their profiles
                and availabilities and choose <em>your</em>
                preferred method of contact.</p>
        </div>
    </div>
</div>
<!--Fake Copyright section-->
<div class="gradient-custom text-center font-copyright py-4">
    © 2024 Study Buddy Northeastern.<br>
    All rights reserved.
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</html>