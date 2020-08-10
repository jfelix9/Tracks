<!DOCTYPE html>
<html>
<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Student List</h1>

<form action="admin-welcome.php" method="post">
    <input type="submit" name="adminhome" value="home" class="btn"/>
</form>

<?php
    session_start();
    include_once 'config.php';

    $username = $_SESSION['username']; 
    echo 'logged in as ' . $username . '<br>';

    $queryAdmin = "SELECT * FROM Admin WHERE Auser_name = '" . $username . "';";
    $resultAdmin = $conn->query($queryAdmin);

    if ($resultAdmin->num_rows > 0) {
        $queryAdmin = "SELECT * FROM Student;";
    } else {

        $queryAdmin = "SELECT * FROM Faculty WHERE Fuser_name = '" . $username . "';";
        $resultAdmin = $conn->query($queryAdmin);
        if ($resultAdmin->num_rows > 0) {
            $queryAdmin = "SELECT * FROM Student WHERE Fuser_name = '" . $username . "';";
        }
    }

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