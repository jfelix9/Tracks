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
<h1>New Admin Signup</h1>

<form method="POST" action="admin-signup.php">
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
    </div>
	<input type="submit" value="sign up" class="btn-signup"/>
</form>

<form action="login.php" method="post">
<input type="submit" name="gotologin" value="back to login page" class="btn"/>
</form>

<?php
if(isset($_POST['user_name'])){

	$query = "INSERT INTO Admin VALUES ('" . $_POST['user_name'] . "', '" . $_POST['fname'] . "', '" . $_POST['minit'] . "', '" . $_POST['lname'] . "', '" . $_POST['pass_word'] . "');";
	$result = $conn->query($query);

	echo "you're all signed up! you can go back to the log in page now";
}
?>

</body>
</html>