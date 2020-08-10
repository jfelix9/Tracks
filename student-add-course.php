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
<h1>Add Course</h1>

<form action="student-welcome.php" method="post">
    <input type="submit" name="home" value="home" class="btn"/>
</form>

<form action="student-add-course.php" method="post">
    <input type="text" name="newcourse" value="new course"/>
    <input type="submit" name="addcourse" value="add course" class="btn"/>
</form>

<?php

	$queryStudent = "INSERT INTO Student_courses VALUES ('" . $_SESSION['student_user'] . "', '" . $_POST['newcourse'] . "');";
	$resultStudent = $conn->query($queryStudent);
?>