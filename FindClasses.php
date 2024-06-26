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

    <div id="search">
        <form role="search" id="form" method="post">
            <input type="search" id="query" name="q" placeholder="Search..." aria-label="Search through site content">
            <button>
                <svg viewBox="0 0 1024 1024">
                    <path class="path1" d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z"></path>
                </svg>
            </button>
        </form>
    </div>
    <script>
        const f = document.getElementById('form');
        const q = document.getElementById('query');
        //const google = 'https://www.google.com/search?q=site%3A+';
        //const site = 'http://127.0.0.1:5500/static/html/YourClasses.html';

        //function submitted(event) {
            //event.preventDefault();
            //const url = google + site + '+' + q.value;
            //const win = window.open(url, '_blank');
            //win.focus();
        //}

        f.addEventListener('submit', submitted);
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

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
        <html>
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
        </html>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>