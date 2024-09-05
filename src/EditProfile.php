<!-- This is the edit profile page that is reached by clicking "edit profile" from ViewProfile -->
<?php
//resumes the session
session_start();

//The navbar is 'embedded' here and includes all the standard script/ style links as well.
include_once __DIR__ . '/navbar.php';
?>

<!-- Them main content -->
<div class=" text-light" style="background-color: #86DBFF; position: relative; flex-grow: 1; flex-shrink: 0;">
    <form action="process/process-editprofile.php" method="post" id="profile" novalidate>

        <!-- The first white display section, containing first name, last name, year, and major-->
        <div class="d-flex justify-content-center align-items-center"
            style="height: 86vh; width: 100vw; position: absolute;">
            <div class="bg-white view-profile-box font-primary text-center" style="width: 20vw; padding-top: 5vh;">
                <h1 style="font-size: 4.5vh;">Edit Profile</h1>
                <div class="view-profile-font-sizing">
                    <div class="container justify-content-center" style="width: 80%; margin-top: 3vh;">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name"
                            style="border-radius: 100px; height: 5vh;">
                    </div>

                    <div class="container justify-content-center" style="width: 80%; margin-top: 3vh;">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name"
                            style="border-radius: 100px; height: 5vh;">
                    </div>

                    <div class="container justify-content-center" style="width: 80%; margin-top: 3vh;">
                        <label class="form-label">Year</label>
                        <input type="number" class="form-control" name="year"
                            style="border-radius: 100px; height: 5vh;">
                    </div>

                    <div class="container justify-content-center" style="width: 80%; margin-top: 3vh;">
                        <label class="form-label">Major and Minor</label>
                        <input type="text" class="form-control" name="major" style="border-radius: 100px; height: 5vh;">
                    </div>
                </div>


            </div>

            <!-- The second white display section, containing contacts, "looking for", and bio -->
            <div class="bg-white view-profile-box font-primary" style="width: 40vw; 
            margin-left: 5vw; padding-top: 7vh; padding-left: 3vw; padding-right: 3vh">
                <div class="container justify-content-center">
                    <label for="inputContacts" class="form-label view-profile-font-sizing">
                        Contacts:</label>
                    <input type="text" class="form-control" name="contacts" style="border-radius: 100px; height: 5vh;">
                </div>

                <div class="container justify-content-center" style="margin-top: 5vh;">
                    <label class="form-label view-profile-font-sizing">
                        What you're looking for in a study buddy:</label>
                    <textarea type="text" class="form-control" name="looking_for" aria-describedby="lookingForHelp"
                        style="border-radius: 10px; height: 8vh;"></textarea>
                </div>

                <div class="container justify-content-center" style="margin-top: 5vh;">
                    <label class="form-label view-profile-font-sizing">
                        Bio:</label>
                    <textarea type="text" class="form-control" name="bio" aria-describedby="bioHelp"
                        style="border-radius: 10px; height: 8vh;"></textarea>
                </div>
                <div style="width: 100%;  margin-top: 5vh;" class="d-flex justify-content-center">
                    <input class="btn btn-theme-orange" style="border-radius: 50px;" type="Submit" value="Save">
                </div>
            </div>

        </div>
    </form>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</html>