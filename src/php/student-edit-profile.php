<!DOCTYPE html>
<html>
<head>
	<title>Tracks</title>
	<link rel="stylesheet" href="styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<?php
    session_start();
	include_once '../config/config.php';
?>
</head>
<body>
<div class="container">
<div class="px-4 pt-5 my-5 text-center border-bottom">
<h1>Edit Profile</h1>
</div>

<form method="POST" action="student-edit-profile.php">
	<div>Username: 
	<input type="text" name="user_name" placeholder="username"/>
	<div>First Name: 
	<input type="text" name="fname" placeholder="first name"/>
	<div>Middle Initial: 
	<input type="text" name="minit" placeholder="middle initial"/>
	<div>Last Name: 
	<input type="text" name="lname" placeholder="last name"/>
	<div> Password: 
	<input type="password" name="pass_word" placeholder="password"/>
	<div> ID Number: 
	<input type="number" min="0" max="99999999" name="id" placeholder="id"/>
	<div>
	<input type="checkbox" name="graduated"/>
	<label for="graduated"> Already graduated</label>
	<div>Degree Name: 
	<input type="text" name="degree" placeholder="degree name"/>
	<div>Overall GPA: 
	<input type="number" step="0.01" min="0.00" max="4.00" name="gpa" placeholder="gpa"/>
	<div>Expected Graduation Date: 
	<input type="date" name="end_date" placeholder="expected graduation date"/>
	<div>Grant Info: 
	<input type="text" name="grant_info" placeholder="grant info"/>
	<div>Advisor Username: 
	<input type="text" name="facultyname" placeholder="Advisor"/>
	<div>
	<input type="submit" value="submit changes" class="btn-signup"/>
</form>

<form action="student-welcome.php" method="post">
    <input type="submit" name="home" value="home" class="btn"/>
</form>

<?php
echo "hello " . $_SESSION['student_user'];

if( !empty($_POST['fname']) )
{
    $newfname= $_POST['fname'];
	$sql  = "UPDATE Student SET Sfname='" . $newfname . "' WHERE Suser_name='" . $_SESSION['student_user'] . "'";
	$resultStudent = $conn->query($sql);
}

if( !empty($_POST['minit']) )
{
    $newminit= $_POST['minit'];
	$sql  = "UPDATE Student SET Sminit='" . $newminit . "' WHERE Suser_name='" . $_SESSION['student_user'] . "'";
	$resultStudent = $conn->query($sql);
}

if( !empty($_POST['lname']) )
{
    $newlname= $_POST['lname'];
	$sql  = "UPDATE Student SET Slname='" . $newlname . "' WHERE Suser_name='" . $_SESSION['student_user'] . "'";
	$resultStudent = $conn->query($sql);
}

if( !empty($_POST['pass_word']) )
{
    $newpassword= $_POST['pass_word'];
	$sql  = "UPDATE Student SET Spass_word='" . $newpassword . "' WHERE Suser_name='" . $_SESSION['student_user'] . "'";
	$resultStudent = $conn->query($sql);
}

if( !empty($_POST['id']) )
{
    $newid= $_POST['id'];
	$sql  = "UPDATE Student SET Sid=" . $newid . " WHERE Suser_name='" . $_SESSION['student_user'] . "'";
	$resultStudent = $conn->query($sql);
}

if( !empty($_POST['degree']) )
{
    $newdegree= $_POST['degree'];
	$sql  = "UPDATE Student SET Sdegree='" . $newdegree . "' WHERE Suser_name='" . $_SESSION['student_user'] . "'";
	$resultStudent = $conn->query($sql);
}

if( !empty($_POST['gpa']) )
{
    $newgpa= $_POST['gpa'];
	$sql  = "UPDATE Student SET Sgpa='" . $newgpa . "' WHERE Suser_name='" . $_SESSION['student_user'] . "'";
	$resultStudent = $conn->query($sql);
}

if( !empty($_POST['end_date']) ){
	
	$gradate = strtotime($_POST['end_date']);
	$gradate = date('Y-m-d', $gradate);

	$sql  = "UPDATE Student SET Sgrad_year='" . $gradate . "' WHERE Suser_name='" . $_SESSION['student_user'] . "'";
	$resultStudent = $conn->query($sql);
}


if( !empty($_POST['grant_info']) )
{
    $newgrant= $_POST['grant_info'];
	$sql  = "UPDATE Student SET Sgrant_info='" . $newgrant . "' WHERE Suser_name='" . $_SESSION['student_user'] . "'";
	$resultStudent = $conn->query($sql);
}

if( !empty($_POST['facultyname']) )
{
    $newfaculty= $_POST['facultyname'];
	$sql  = "UPDATE Student SET Auser_name='" . $newfaculty . "' WHERE Suser_name='" . $_SESSION['student_user'] . "'";
	$resultStudent = $conn->query($sql);
}
?>
</div>
</body>
</html>