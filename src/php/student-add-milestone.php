<?php
session_start();
include_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1>Add milestone</h1>

    <form action="student-welcome.php" method="post">
        <input type="submit" name="home" value="home" class="btn" />
    </form>

    <form action="student-add-milestone.php" method="post">
        <input type="text" name="newmilestone" value="milestone" />
        <input type="date" name="dateachieved">
        <input type="submit" name="addmilestone" value="add milestone" class="btn" />
    </form>

    <?php
    $newmilestonedate = strtotime($_POST['dateachieved']);
    $newmilestonedate = date('Y-m-d', $newmilestonedate);

    $queryStudent = "INSERT INTO Student_milestones VALUES ('" . $_SESSION['student_user'] . "', '" . $_POST['newmilestone'] . "', '" . $newmilestonedate . "');";
    $resultStudent = $conn->query($queryStudent);
    ?>
</body>

</html>