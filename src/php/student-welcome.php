<?php
session_start();
include_once '../config/config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tracks</title>
    <!-- <link rel="stylesheet" href="../css/styles.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="student-welcome.php">TRACKS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="student-welcome.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student-add-milestone.php">Add Milestone</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student-add-course.php">Add Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student-add-conference.php">Add Conference</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="student-add-paper.php">Add Paper</a>
                    </li>
                </ul>
                <form action="student-edit-profile.php" method="post" class="d-flex">
                    <input type="submit" name="editprofile" value="edit profile" class="form-control me-2 btn btn-outline-success" />
                </form>
                <form action="login.php" method="post" class="d-flex">
                    <input type="submit" name="backtologin" value="logout" class="form-control me-2 btn btn-outline-success" />
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="px-4 pt-5 my-5 text-center border-bottom">
            <h1>Student Dashboard</h1>
        </div>

        <!-- <form action="student-welcome.php" method="post">
            <input type="submit" name="home" value="home" class="btn" />
        </form>
        <form action="login.php" method="post">
            <input type="submit" name="backtologin" value="logout" class="btn" />
        </form>
        <form action="student-add-milestone.php" method="post">
            <input type="submit" name="addmilestone" value="add milestone" class="btn" />
        </form>
        <form action="student-add-course.php" method="post">
            <input type="submit" name="addcourse" value="add course" class="btn" />
        </form>
        <form action="student-add-conference.php" method="post">
            <input type="submit" name="addconference" value="add conference" class="btn" />
        </form>
        <form action="student-add-paper.php" method="post">
            <input type="submit" name="addpaper" value="add paper" class="btn" />
        </form>
        <form action="student-edit-profile.php" method="post">
            <input type="submit" name="editprofile" value="edit profile" class="btn" />
        </form>
        <form action="account-deleted.php" method="post">
            <input type="submit" name="deleteaccount" value="Delete Account" class="btn" />
        </form> -->

        <?php
        $username = $_SESSION['student_user'];

        $queryStudent = "SELECT * FROM Student WHERE Suser_name='" . $username . "';";
        $resultStudent = $conn->query($queryStudent);

        $row = mysqli_fetch_array($resultStudent);

        echo '<h2>Basic Info</h2><br>';
        echo '<dl class="row">';
        echo '<dt class="col-sm-3">Username</dt><dd class="col-sm-9">' . $row['Suser_name'] . '<dd>';
        echo '<dt class="col-sm-3">Name</dt><dd class="col-sm-9">' . $row['Sfname'] . '&nbsp;' . $row['Slname'] . '<dd>';
        // echo '<dt class="col-sm-3">First Name</dt><dd class="col-sm-9">' . $row['Sfname'] . '<dd>';
        // echo '<dt class="col-sm-3">Middle Initial</dt><dd class="col-sm-9">' . $row['Sminit'] . '<dd>';
        // echo '<dt class="col-sm-3">Last Name</dt><dd class="col-sm-9">' . $row['Slname'] . '<dd>';
        echo '<dt class="col-sm-3">ID</dt><dd class="col-sm-9">' . $row['Sid'] . '<dd>';
        // echo '<dt class="col-sm-3">Graduated</dt><dd class="col-sm-9">' . $row['Sgraduated'] . '<dd>';
        echo '<dt class="col-sm-3">Degree Name</dt><dd class="col-sm-9">' . $row['Sdegree'] . '<dd>';
        echo '<dt class="col-sm-3">GPA</dt><dd class="col-sm-9">' . $row['Sgpa'] . '<dd>';
        echo '<dt class="col-sm-3">Expected Graduation Year</dt><dd class="col-sm-9">' . $row['Sgrad_year'] . '<dd>';
        echo '<dt class="col-sm-3">Grant Information</dt><dd class="col-sm-9">' . $row['Sgrant_info'] . '<dd>';
        echo '<dt class="col-sm-3">Advisor</dt><dd class="col-sm-9">' . $row['Auser_name'] . '<dd>';
        echo '</dl>';

        $queryStudent = "SELECT * FROM Student_milestones WHERE Suser_name='" . $username . "';";
        $resultStudent = $conn->query($queryStudent);

        $row = mysqli_fetch_array($resultStudent);

        echo '<h2>Milestones</h2>';

        if ($resultStudent->num_rows > 0) {
            echo "<div>
        <table>
            <tr>
                <th>milestones</th>
                <th>date</th>
            </tr>";

            // output data of each row
            while ($row = $resultStudent->fetch_assoc()) {
                echo "<tr id=\"hello\">
                <td>" . $row["Smilestones"] . "</td>
                <td>" . $row["Mdate_achieved"] . "</td> 
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

        echo '<h2>Courses </h2>';

        $queryStudent = "SELECT * FROM Student_courses WHERE Suser_name='" . $username . "';";
        $resultStudent = $conn->query($queryStudent);

        $row = mysqli_fetch_array($resultStudent);

        if ($resultStudent->num_rows > 0) {
            echo "<div><table>
            <tr>
                <th>courses</th>
            </tr>";

            // output data of each row
            while ($row = $resultStudent->fetch_assoc()) {
                echo "<tr id=\"hello\">
                <td>" . $row["Scourses"] . "</td> </div>
                </tr>";
            }
            echo '<br>';
            echo '<br>';
        } else {
            echo "0 courses recorded <br>";
            echo '<br>';
            echo '<br>';
        }

        echo '<h2>Conferences</h2>';

        $queryStudent = "SELECT * FROM Student_conferences WHERE Suser_name='" . $username . "';";
        $resultStudent = $conn->query($queryStudent);

        $row = mysqli_fetch_array($resultStudent);

        if ($resultStudent->num_rows > 0) {
            echo "<div><table>
            <tr>
                <th>conferences</th>
            </tr>";

            // output data of each row
            while ($row = $resultStudent->fetch_assoc()) {
                echo "<tr id=\"hello\">
                <td>" . $row["Sconferences"] . "</td> 
                </tr></div>";
            }
            echo '<br>';
            echo '<br>';
        } else {
            echo "0 conferences recorded <br>";
            echo '<br>';
            echo '<br>';
        }

        echo '<h2>Papers</h2>';

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
            while ($row = $resultStudent->fetch_assoc()) {
                echo "<tr id=\"hello\">
                <td>" . $row["Spapers"] . "</td>
                <td>" . $row["Pdate_published"] . "</td> 
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

    </div>
</body>

</html>