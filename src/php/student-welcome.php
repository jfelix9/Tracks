<?php
    session_start();
    include_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Student Dashboard</h1>


<form action="student-welcome.php" method="post">
    <input type="submit" name="home" value="home" class="btn"/>
</form>
<form action="login.php" method="post">
    <input type="submit" name="backtologin" value="logout" class="btn"/>
</form>
<form action="student-add-milestone.php" method="post">
    <input type="submit" name="addmilestone" value="add milestone" class="btn"/>
</form>
<form action="student-add-course.php" method="post">
    <input type="submit" name="addcourse" value="add course" class="btn"/>
</form>
<form action="student-add-conference.php" method="post">
    <input type="submit" name="addconference" value="add conference" class="btn"/>
</form>
<form action="student-add-paper.php" method="post">
    <input type="submit" name="addpaper" value="add paper" class="btn"/>
</form>
<form action="student-edit-profile.php" method="post">
    <input type="submit" name="editprofile" value="edit profile" class="btn"/>
</form>
<form action="account-deleted.php" method="post">
    <input type="submit" name="deleteaccount" value="Delete Account" class="btn"/>
</form>

<?php
    $username = $_SESSION['student_user']; 

    echo "hello " . $username . "<br><br>";

    $queryStudent = "SELECT * FROM Student WHERE Suser_name='" . $username . "';";
    $resultStudent = $conn->query($queryStudent);
    
    $row = mysqli_fetch_array($resultStudent);

    echo '<h2>Basic Info</h2><br>';

    echo 'Username: ' . $row['Suser_name'] . '<br>';
    echo 'First Name: ' . $row['Sfname'] . '<br>';
    echo 'Middle Initial: ' . $row['Sminit'] . '<br>';
    echo 'Last Name: ' . $row['Slname'] . '<br>';
    echo 'ID: ' . $row['Sid'] . '<br>';
    echo 'Graduated: ' . $row['Sgraduated'] . '<br>';
    echo 'Degree Name: ' . $row['Sdegree'] . '<br>';
    echo 'GPA: ' . $row['Sgpa'] . '<br>';
    echo 'Expected Graduation Year: ' . $row['Sgrad_year'] . '<br>';
    echo 'Grant Information: ' . $row['Sgrant_info'] . '<br>';
    echo 'Advisor: ' . $row['Auser_name'] . '<br><br>';

    $queryStudent = "SELECT * FROM Student_milestones WHERE Suser_name='" . $username . "';";
    $resultStudent = $conn->query($queryStudent);
    
    $row = mysqli_fetch_array($resultStudent);

    if ($resultStudent->num_rows > 0) {
        echo "<div>
        <table>
            <tr>
                <th>milestones</th>
                <th>date</th>
            </tr>";

        // output data of each row
        while($row = $resultStudent->fetch_assoc()) {
            echo "<tr id=\"hello\">
                <td>" . $row["Smilestones"]. "</td>
                <td>" . $row["Mdate_achieved"]. "</td> 
                </div> 
                </tr>";
        }
        echo '<br>';
        echo '<br>';
    } else {
        echo "0 milestones recorded <br>";
        echo '<br>';
        echo '<br>';
    }

    //echo '<h2>Courses Info</h2><br>';

    $queryStudent = "SELECT * FROM Student_courses WHERE Suser_name='" . $username . "';";
    $resultStudent = $conn->query($queryStudent);
    
    $row = mysqli_fetch_array($resultStudent);

    if ($resultStudent->num_rows > 0) {
        echo "<div><table>
            <tr>
                <th>courses</th>
            </tr>";

        // output data of each row
        while($row = $resultStudent->fetch_assoc()) {
            echo "<tr id=\"hello\">
                <td>" . $row["Scourses"]. "</td> </div>
                </tr>";
        }
        echo '<br>';
        echo '<br>';
    } else {
        echo "0 courses recorded <br>";
        echo '<br>';
        echo '<br>';
    }

    //echo '<h2>Conferences Info</h2><br>';

    $queryStudent = "SELECT * FROM Student_conferences WHERE Suser_name='" . $username . "';";
    $resultStudent = $conn->query($queryStudent);
    
    $row = mysqli_fetch_array($resultStudent);

    if ($resultStudent->num_rows > 0) {
        echo "<div><table>
            <tr>
                <th>conferences</th>
            </tr>";

        // output data of each row
        while($row = $resultStudent->fetch_assoc()) {
            echo "<tr id=\"hello\">
                <td>" . $row["Sconferences"]. "</td> 
                </tr></div>";
        }
        echo '<br>';
        echo '<br>';
    } else {
        echo "0 conferences recorded <br>";
        echo '<br>';
        echo '<br>';
    }

    //echo '<h2>Papers Info</h2><br>';

    $queryStudent = "SELECT * FROM Student_papers WHERE Suser_name='" . $username . "';";
    $resultStudent = $conn->query($queryStudent);
    
    $row = mysqli_fetch_array($resultStudent);

    if ($resultStudent->num_rows > 0) {
        echo "<div><table>
            <tr>
                <th>paper</th>
                <th>date published</th>
            </tr>";

        // output data of each row
        while($row = $resultStudent->fetch_assoc()) {
            echo "<tr id=\"hello\">
                <td>" . $row["Spapers"]. "</td>
                <td>" . $row["Pdate_published"]. "</td> 
                </tr></div>";
        }
        echo '<br>';
        echo '<br>';
    } else {
        echo "0 papers recorded <br>";
    }
    echo '<br>';
    echo '<br>';
?>


</body>
</html>