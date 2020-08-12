<!DOCTYPE html>
<html>
<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Student Lookup</h1>

<form action="admin-welcome.php" method="post">
    <input type="submit" name="adminhome" value="home" class="btn"/>
</form>

<form method="POST" action="admin-search.php">
	<div class="search-input">
		<input type="text" name="lookedupusername" placeholder="username"/>
    <input type="submit" value="lookup" class="btn"/>
    </div>
</form>

<?php
    session_start();
    include_once 'config.php';

    $username = $_SESSION['username']; 
    echo 'logged in as ' . $username . '<br>';

    $studentqueried = $_POST['lookedupusername'];

    $queryAdmin = "SELECT * FROM Student WHERE Suser_name='" . $studentqueried . "';";
    $resultAdmin = $conn->query($queryAdmin);
    
    if ($resultAdmin->num_rows > 0) {
        echo "<table style=\"width:100%\">
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Middle Initial</th>
                <th>Last Name</th>
                <th>ID</th>
                <th>Degree</th>
                <th>Graduation Date</th>
            </tr>";

        // output data of each row
        while($row = $resultAdmin->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["Suser_name"] . "</td>
            <td>" . $row["Sfname"] . "</td>
            <td>" . $row["Sminit"] . "</td>
            <td>" . $row["Slname"] . "</td>
            <td>" . $row["Sid"] . "</td>
            <td>" . $row["Sdegree"] . "</td>
            <td>" . $row["Sgrad_year"] . "</td>
            </tr>";
        }
    } else {
        echo "0 results";
    }
    
?>

</body>
</html>