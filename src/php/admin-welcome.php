<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1>Admin Dashboard</h1>

    <form action="admin-welcome.php" method="post">
        <input type="submit" name="adminhome" value="home" class="btn" />
    </form>
    <form action="login.php" method="post">
        <input type="submit" name="backtologin" value="logout" class="btn" />
    </form>
    <form action="admin-search.php" method="post">
        <input type="submit" name="searchadmin" value="lookup student" class="btn" />
    </form>
    <form action="admin-student-list.php" method="post">
        <input type="submit" name="studentlistadmin" value="see student list" class="btn" />
    </form>
    <form action="admin-grad2021.php" method="post">
        <input type="submit" name="past2021s" value="see students graduating after 2021" class="btn" />
    </form>
    <form action="admin-gpa-ascending.php" method="post">
        <input type="submit" name="gpa-ascending" value="see students by ascending gpa" class="btn" />
    </form>
    <form action="admin-gpa-descending.php" method="post">
        <input type="submit" name="gpa-descending" value="see students by descending gpa" class="btn" />
    </form>
    <form action="admin-views.php" method="post">
        <input type="submit" name="views" value="Grant Students" class="btn" />
    </form>
    <form action="admin-degree-average.php" method="post">
        <input type="submit" name="degree-average" value="average gpa by degree" class="btn" />
    </form>
    <form action="delete-account.php" method="post">
        <input type="submit" name="delete-account" value="Delete Account" class="btn" />
    </form>

    <?php
    session_start();
    include_once '../config/config.php';

    $username = $_SESSION['username'];
    echo 'logged in as ' . $username . '<br>';

    $queryAdmin = "SELECT * FROM Student;";
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
        while ($row = $resultAdmin->fetch_assoc()) {
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