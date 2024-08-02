<!-- This is the your classes page which can be reached to by clicking "Your Classes" on the navbar -->

<?php
//Resumes the session
session_start();

include_once __DIR__ . '/navbar.php';
?>
<!--Content-->
<section class="d-flex" style="width: 100vw; height: 86vh;">
    <!-- Class buttons section, aka shows all the classes you have and lets you click on them to view them here -->
    <div class="d-flex py-3 flex-column" style="background-color: #FEAD76; width: 15vw; 
            padding-left: 2vw; padding-right: 2vw;">
        <?php include "retrieve/retrieve-classButtons.php"; ?>
    </div>

    <!-- The view area for a single class, is set to retrieve information about the current class. 
     Is set to the first class by default or informs the user that they have no classes and should add one.-->
    <div class="flex-column d-flex align-items-center justify-content-center"
        style="background-color: #E37D37; width: 85vw;">
        <div class="flex-column"
            style="background-color: white; width: 80%; height: 85%; border-radius: 50px; padding-top:8vh">
            <?php include "retrieve/retrieve-classInfo.php"; ?>
        </div>

    </div>

</section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</html>