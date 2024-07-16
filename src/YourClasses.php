<?php
session_start();

include_once __DIR__ . '/navbar.php';

?>
    <!--Content-->
    <section class="d-flex" style="width: 100vw; height: 86vh;">
        <div class="d-flex py-3 flex-column" style="background-color: #FEAD76; width: 20vw; 
            padding-left: 2vw; padding-right: 2vw;">
            <button type="button" class="mt-4 btn py-3" style="background-color: white; border-radius: 25px;">
                Fundamentals of
                <br />
                Computer Science 2
            </button>
            <button type="button" class="btn mt-4 py-3" style="background-color: white; border-radius: 25px;">
                Mathematics of
                <br />
                Data Models
            </button>
        </div>
        <div class="flex-column d-flex align-items-center justify-content-center"
            style="background-color: #E37D37; width: 85vw;">
            <div class="flex-column"
                style="background-color: white; width: 80%; height: 85%; border-radius: 50px; padding-top:8vh">
                <div class="text-center">
                    <h2 class="font-primary">Fundamentals of Computer Science II</h2>
                    <p style="margin-top: 5vh">This class is an introduction to advanced programming concepts.
                        <br />This class is taught in Java and uses a custom image library.
                    </p>
                </div>

                <p style="margin-left:5vw; margin-top: 5vh;">
                    Classmates looking for buddies:
                </p>
            </div>


        </div>

    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</html>