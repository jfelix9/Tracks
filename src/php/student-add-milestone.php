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
<h1>Add milestone</h1>

<form action="student-welcome.php" method="post">
    <input type="submit" name="home" value="home" class="btn"/>
</form>

<form action="student-add-milestone.php" method="post">
    <input type="text" name="newmilestone" value="milestone"/>
    <input type="date" name="dateachieved">
    <input type="submit" name="addmilestone" value="add milestone" class="btn"/>
</form>

</body>

<?php
    $newmilestonedate = strtotime($_POST['dateachieved']);
	$newmilestonedate = date('Y-m-d', $newmilestonedate);

	$queryStudent = "INSERT INTO Student_milestones VALUES ('" . $_SESSION['student_user'] . "', '" . $_POST['newmilestone'] . "', '" . $newmilestonedate . "');";
	$resultStudent = $conn->query($queryStudent);
?>