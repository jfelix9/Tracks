<?php
    session_start();
    include_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tracks</title>
	<link rel="stylesheet" href="styles.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<h1>New User Signup</h1>

<form method="POST" action="new-user.php">
	<div>Username: 
	<input type="text" name="user_name" placeholder="username" maxlength="10"/>
	<div>First Name: 
	<input type="text" name="fname" placeholder="first name" maxlength="50"/>
	<div>Middle Initial: 
	<input type="text" name="minit" placeholder="middle initial" maxlength="1"/>
	<div>Last Name: 
	<input type="text" name="lname" placeholder="last name" maxlength="50"/>
	<div> Password: 
	<input type="password" name="pass_word" placeholder="password" maxlength="50"/>
	<div> ID Number: 
	<input type="number" maxlength="8" name="id" placeholder="id"/>
	<div>
	<input type="checkbox" name="graduated"/>
	<label for="graduated"> Already graduated</label>
	<div>Degree Name: 
	<input type="text" name="degree" placeholder="degree name" maxlength="50"/>
	<div>Overall GPA: 
	<input type="number" step="0.01" min="0.00" max="4.00" name="gpa" placeholder="gpa"/>
	<div>Expected Graduation Date: 
	<input type="date" name="end_date" placeholder="expected graduation date"/>
	<div>Grant Info: 
	<input type="text" name="grant_info" placeholder="grant info" maxlength="50"/>
	<div>Advisor Username: 
	<input type="text" name="facultyname" placeholder="Advisor" maxlength="10"/>
	<div>
	<input type="submit" value="sign up" class="btn-signup"/>
</form>

<form action="login.php" method="post">
<input type="submit" name="gotologin" value="back to login page" class="btn"/>
</form>

<?php
if(isset($_POST['user_name'])){
	$gradate = strtotime($_POST['end_date']);
	$gradate = date('Y-m-d', $gradate);

	$queryStudent = "INSERT INTO Student VALUES ('" . $_POST['user_name'] . "', '" . $_POST['fname'] . "', '" . $_POST['minit'] . "', '" . $_POST['lname'] . "', '" . $_POST['pass_word'] . "', " . $_POST['id'] . ", '0', '" . $_POST['degree'] . "', " . $_POST['gpa'] . ", '" . $gradate . "', '" . $_POST['grant_info'] . "', '" . $_POST['facultyname'] . "');";
	$resultStudent = $conn->query($queryStudent);

	echo "you're all signed up! you can go back to the log in page now";
}
?>

</body>
</html>