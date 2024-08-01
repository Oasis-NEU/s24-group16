<!-- This is the page you reach after clicking "Find Class" in the navbar-->
<?php
//Resumes the session
session_start();

//The navbar is 'embedded' here and includes all the standard script/ style links as well.
include_once __DIR__ . '/navbar.php';
?>

<div style="background-color: #F7FF9A;" class="d-flex justify-content-center">
    <div clas="flex-column">
        <div style="background-color: white; width: 70vw; 
        margin-top: 8vh; padding-top: 5vh; padding-bottom: 5vh; border-radius: 100px;">
        <form method="post" id="searchclass" class="row">

            <div class="col-5 text-center">
            <label style="font-size: 3vh; margin-bottom: 10px;">Search classes by name</label>
            <br>
            <input type="text" name="search-name" placeholder="Name..." style="border-radius: 100px; height: 40px;">
            <button class="btn btn-theme-orange" style="border-radius: 100px; height: 40px;">Search</button>
            </div>
            <div class="col-7 text-center">
            <label style="font-size: 3vh; margin-bottom: 10px;">Search by department code and course number</label>
            <br>
            <input type="text" name="search-code" placeholder="Code..." style="border-radius: 100px; height: 40px;">
            <input type="number" name="search-number" placeholder="Number..." style="border-radius: 100px; height: 40px;">
            <button class="btn btn-theme-orange" style="border-radius: 100px; height: 40px;">Search</button>
            </div>

        </form>
        </div>
        
        <div style="background-color: #fffff; width: 70vw;">
            <div name="results" style="background-color: #F7FF9A">
                <?php
                include 'retrieve/retrieve-searchclass.php';
                ?>
            </div>
        </div>
</div>
</div>
</body>

</html>