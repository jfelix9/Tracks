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
<h1>Add conference</h1>

<form action="student-welcome.php" method="post">
    <input type="submit" name="home" value="home" class="btn"/>
</form>

<form action="student-add-conference.php" method="post">
    <input type="text" name="newconference" placeholder="conference name"/>
    <input type="submit" name="addconference" value="add conference" class="btn"/>
</form>

<?php

	$queryStudent = "INSERT INTO Student_conferences VALUES ('" . $_SESSION['student_user'] . "', '" . $_POST['newconference'] . "');";
	$resultStudent = $conn->query($queryStudent);
?>