<!DOCTYPE html>
<html>
<head>
    <title>
        Study Buddy Networking App
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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

        svg {
            color: #fff;
            fill: currentColor;
            width: 32px; /* Increase icon size */
            height: 32px; /* Increase icon size */
            padding: 10px;
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark py-3">
        <div class="container">
            <a href="#" class="navbar-brand">Study Buddy Networking App</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="Login.html" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="ViewProfile.html" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="YourClasses.html" class="nav-link">Your Classes</a>
                    </li>
                    <li class="nav-item">
                        <a href="FindClasses.html" class="nav-link">Find Classes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<body>

<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">	
</form>

</body>
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
		<br><br><br>
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
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>