<?php
session_start();
include 'navbar.php';
?>

<div  style="flex-direction: column; background-color: #F7FF9A;">
    <div styke="flex-grow: 1">
<form method="post" id = "searchclass">
    <label>Search for your class:</label>
    <input type="text" name="search" placeholder="Search...">
    <button >Search</button>
</form>
<div name="results" style="background-color: #F7FF9A">
        <?php
        include 'retrieve/retrieve-searchclass.php';
        ?>
</div>
</div>
</div>
</body>
</html>

