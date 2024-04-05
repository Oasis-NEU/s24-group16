<head>
        <title>
            Study Buddy Networking App
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body style="background-color: #384047">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark py-3">
            <div class="container">
            <a href="#" class="navbar-brand">Study Buddy Networking App</a>
            
            <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navmenu">
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
                        <a href="SearchClass.php" class="nav-link">
                            Find Classes
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
         <?php 
    $mysqli = require __DIR__ . "/database.php";

    if($mysqli->connect_error){
      die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT * FROM class";

    $result = $mysqli->query($sql);
    if (!$result){
      die("Error in SQL query: " . $mysqli->error);
    }

    $users = $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows as associative array

    $mysqli->close(); // Close the database connection
?>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Add Class</h1>

<table id="customers">
<tr>
    <th> Course Number</th>
    <th> Title </th>
    <th> Description </th>
    <th> Add </th>
</tr>
<?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['class_id'] ?></td>
        <td><?php echo $user['title'] ?></td>
        <td><?php echo $user['classdescription'] ?></td>
        <td><a href="#" class="btn btn-danger">Add</a></td>
    </tr>
<?php endforeach; ?>     
</table>
                                    
</body>
</html>
