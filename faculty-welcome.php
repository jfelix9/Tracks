<!DOCTYPE html>
<html>
<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Faculty Dashboard</h1>

<form action="faculty-welcome.php" method="post">
    <input type="submit" name="adminhome" value="home" class="btn"/>
</form>
<form action="login.php" method="post">
    <input type="submit" name="backtologin" value="logout" class="btn"/>
</form>
<form action="faculty-search.php" method="post">
    <input type="submit" name="searchadmin" value="lookup student" class="btn"/>
</form>
<form action="faculty-student-list.php" method="post">
    <input type="submit" name="studentlistadmin" value="see student list" class="btn"/>
</form>
<form action="faculty-gpa-ascending.php" method="post">
    <input type="submit" name="gpa-ascending" value="see students by ascending gpa" class="btn"/>
</form>
<form action="faculty-gpa-descending.php" method="post">
    <input type="submit" name="gpa-descending" value="see students by descending gpa" class="btn"/>
</form>
<form action="delete-account.php" method="post">
    <input type="submit" name="delete-account" value="delete account" class="btn"/>
</form>

<?php
    session_start();
    include_once 'config.php';

    $username = $_SESSION['username']; 
    echo 'logged in as ' . $username . '<br>';

    $queryAdmin = "SELECT * FROM Student WHERE Fuser_name = '" . $username . "';";
    $resultAdmin = $conn->query($queryAdmin);
    
    if ($resultAdmin->num_rows > 0) {
        echo "<table>
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