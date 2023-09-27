<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <?php
    session_start();
    include_once '../config/config.php';
    ?>
</head>

<body>
    <h1>Add Course</h1>

    <form action="student-welcome.php" method="post">
        <input type="submit" name="home" value="home" class="btn" />
    </form>

    <form action="student-add-course.php" method="post">
        <input type="text" name="newcourse" value="new course" />
        <input type="submit" name="addcourse" value="add course" class="btn" />
    </form>
    <?php

    $queryStudent = "INSERT INTO Student_courses VALUES ('" . $_SESSION['student_user'] . "', '" . $_POST['newcourse'] . "');";
    $resultStudent = $conn->query($queryStudent);
    ?>
</body>

</html>