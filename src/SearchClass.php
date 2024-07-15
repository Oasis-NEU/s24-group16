<?php
session_start();

//execute database.php
$mysqli = require __DIR__ . "/database.php";

if ($_SERVER["REQUEST-METHOD"] == "POST") {
    $search = $_POST["search"];

    $query = "SELECT * FROM class 
    WHERE UPPER(name) LIKE UPPER('%?%')";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $search);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Study Buddy Networking App
    </title>
    <link href = "../static/styles/main.css" rel="stylesheet">

    <style>
        #search {
            background-color: #3745c2;
            margin: 200px 40%;
        }

        form {
            background-color: #4654e1;
            width: 300px;
            height: 44px;
            border-radius: 5px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        input {
            all: unset;
            font: 16px system-ui;
            color: #fff;
            height: 100%;
            width: 100%;
            padding: 6px 10px;
        }

        ::placeholder {
            color: #fff;
            opacity: 0.7;
        }

        button {
            all: unset;
            cursor: pointer;
            width: 44px;
            height: 44px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm" style="padding-top: 4vh; padding-bottom: 4vh;">
            <div class="container font-secondary">
            <div class="row align-items-center">
                <img class="col-4 font-primary" src="../static/img/StudyBuddyIcon.png" style="width: 8vw;">
                <span class="col-4"><a href="#" class="navbar-brand font-primary" style="line-height:110%; font-weight: 700;">Study Buddy<br>Networking</a></span>
            </div>
            
            <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navmenu" style="font-size: 20px; font-weight: 475;">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <?php
                        include 'display-navbar.php';
                        ?>
                </ul>
            </div>
            </div>
        </nav>

<form action = "process/process-searchclass.php", method="post" id = "searchclass">
    <label>Search for your class:</label>
    <input type="text" name="search" placeholder="Search...">
    <button>Search</button>
</form>
<div name="result">
        <?php

        if (empty($results)) {
            echo 'That class does not exist.';
        } else {
            foreach ($results as $val) {
                echo '<div>';
                echo htmlspecialchars($val['name']);
                echo '</div>';
                //Note: htmlspecialchars helps to 
                //prevent users from inputting javascript
                //and executing it in our website
            }
        }

        ?>
</div>

</body>
</html>

