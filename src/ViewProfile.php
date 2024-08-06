<!-- This is the view profile page which you can get to by clicking "Profile" on the navbar
 
Or you can get to by clicking someone's name on the YourClasses.php page.-->

<?php

//Resumes the session
session_start();

require __DIR__ . '/retrieve/retrieve-viewprofile.php';

//The navbar is 'embedded' here and includes all the standard script/ style links as well.
include_once __DIR__ . '/navbar.php';

$editPerms = false;

//Gets the correct email from the url message
if (isset($_GET['profile'])) {
    if ($_GET['profile'] == 'own') {
        $email = $_SESSION['email'];
        $editPerms = true;
    } else {
        $email = base64_decode($_GET['profile']);
    }
}

?>

<!--Display for the profile-->
<div class="text-light" style="height: 85vh; background-color: #86DBFF; ">
    <div class="d-flex justify-content-center align-items-center"
        style="height: 86vh; width: 100vw; position: absolute;">

        <!-- The left display section (first name, last name, year, major, contacts) -->
        <div class="bg-white view-profile-box font-primary text-center" style="width: 20vw; padding-top: 5vh; padding-right: 2vw; padding-left: 2vw;">
            <h1 style="font-size: 6vh;">
                <?php
                getFirstName($email);
                echo " ";
                getLastName($email);
                ?>
            </h1>
            <p class="view-profile-font-sizing" style="margin-top:5vh;">
                Year <?php getYear($email);
                echo " | ";
                getMajor($email); ?> student
            </p>
            <p class="view-profile-font-sizing" style="margin-top:10vh;">Contacts:
            <div class="view-profile-font-sizing">
                <?php getContacts($email); ?>
            </div>
            </p>
            
            <?php
                if ($editPerms) {
                    echo "<a href='EditProfile.php'>";
                    echo "<button class='btn btn-theme-orange' style='border-radius: 50px; font-size: 3vh;'>Edit Profile</button>";
                    echo "</a>";
                }
            ?>
        </div>

        <!-- The right display section (looking for, bio) -->
        <div class="bg-white view-profile-box font-primary" style="width: 40vw; 
            margin-left: 5vw; padding-top: 7vh; padding-left: 5vw; padding-right: 2vw;">
            <p class="view-profile-font-sizing">Looking for a buddy that:</p>
            <div class="view-profile-font-sizing" style="height: 20vh;">
                <?php getLookingFor($email); ?>
            </div>
            <p class="view-profile-font-sizing">
                Bio:
            <div class="view-profile-font-sizing">
                <?php getBio($email); ?>
            </div>
            </p>
            <div style="height: 20vh;">

            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</html>