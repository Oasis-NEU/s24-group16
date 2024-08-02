<!-- This is the page you reach after clicking "Find Class" in the navbar-->
<?php
//Resumes the session
session_start();

//The navbar is 'embedded' here and includes all the standard script/ style links as well.
include_once __DIR__ . '/navbar.php';
?>

<!-- The main content of the page-->
<div style="background-color: #F7FF9A;" class="d-flex justify-content-center">
    <div clas="flex-column">
        <!-- The search input box -->
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
        
        <!-- The search results box -->
        <div class="d-flex" style="background-color: white; width: 70vw; border-radius: 100px; margin-top: 8vh;">
            <div style= "padding-left: 50px; padding-top: 30px;">
            <h2 style="margin-bottom: 50px;">Results:</h2>
                <?php
                include 'retrieve/retrieve-searchclass.php';
                ?>
            </div>
        </div>
</div>
</div>
</body>
</html>