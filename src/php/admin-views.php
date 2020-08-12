<!DOCTYPE html>
<html>
<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Grant Students</h1>

<form action="admin-welcome.php" method="post">
    <input type="submit" name="adminhome" value="home" class="btn"/>
</form>

<?php
    session_start();
    include_once 'config.php';

    $username = $_SESSION['username']; 
    echo 'logged in as ' . $username . '<br>';

    $sql = "SELECT * FROM student_grant_info_nih;";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table>
            <tr>
                <th>Students with NIH Grant</th>
                <th>First Name</th>
                <th>Middle Initial</th>
                <th>Last Name</th>
                <th>ID</th>
                <th>Degree</th>
                <th>Graduation Date</th>
            </tr>";

        // output data of each row
        while($row = $result->fetch_assoc()) {
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


    
    $sql = "SELECT * FROM Student_total_NSF";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
            <tr>
                <th>Total Students with NSF Grant</th>
            </tr>";

        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["total_students"] . "</td>
            </tr>";
        }
    } else {
        echo "0 results";
    }

?>

</body>
</html>