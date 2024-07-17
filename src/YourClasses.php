<?php
session_start();

include_once __DIR__ . '/navbar.php';

?>
    <!--Content-->
    <section class="d-flex" style="width: 100vw; height: 86vh;">
        <div class="d-flex py-3 flex-column" style="background-color: #FEAD76; width: 15vw; 
            padding-left: 2vw; padding-right: 2vw;">
            <?php require "retrieve/retrieve-yourclasses.php"; ?>
        </div>
        <div class="flex-column d-flex align-items-center justify-content-center"
            style="background-color: #E37D37; width: 85vw;">
            <div class="flex-column"
                style="background-color: white; width: 80%; height: 85%; border-radius: 50px; padding-top:8vh">
                <?php 
                    if (isset($_POST['department_code']) && isset($_POST['department_number'])) {
                        echo "<div class=\"text-center\">";
                        echo "<h2 class=\"font-primary\">" . $title . "</h2>";
                        echo "<p style=\"margin-top: 5vh\">" . $description . "</p>";
                        echo "</div>";
                        echo "<p style=\"margin-left:5vw; margin-top: 5vh;\">";
                        echo "Classmates looking for buddies:"
                        foreach(something) {

                        }
                        echo "</p>";

                    } else {
                        
                    }
                    ?>

            </div>

        </div>

    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</html>