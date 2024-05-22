<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Buddy Networking App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container-bottom {
            display: flex;
            justify-content: bottom;
            align-items: bottom;
            height: 100vh;
        }

        form {
            background-color: #4654e1;
            width: 300px;
            height: 44px;
            border-radius: 5px;
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 10px;
        }

        input[type="text"] {
            all: unset;
            font: 16px system-ui;
            color: #fff;
            flex = 1;
            border-radius: 5px;
            border: none;
            padding: 8px;
            background-color: transparent;
        }

        input[type="text"]::placeholder {
            color: #fff;
            opacity:0.7;
        }

        button {
            all: unset;
            cursor: pointer;
            width: 150px;
            height: 44px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #6c757d;
            border-radius: 5px;
        }

        button:hover {
            background-color: #495057;
        }

        label {
            color: #fff;
            margin-right: 8px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark py-3">
        <div class="container">
            <a href="#" class="navbar-brand">Study Buddy Networking App</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="Login.php" class="nav-link">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ViewProfile.html" class="nav-link">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="YourClasses.html" class="nav-link">
                            Your Classes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="FindClasses.php" class="nav-link">
                            Find Classes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container container-center">
        

    </body>

    <form method="post">
    <label for="search">Search</label>
    <input type="text" id="search" name="search" placeholder="Find your classes">
    <input type="submit" name="submit">	
    </form>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=study-buddy",'root','NeWPassY7!0$%');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `class` WHERE title = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{ 
        ?>
         <div class="container container-bottom">
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><?php echo $row->title; ?></td>
                <td><?php echo $row->classdescription;?></td>
            </tr>

        </table>
    </div>

	<?php
        }	
		else{
			echo "Name Does not exist";
		}
}

?>