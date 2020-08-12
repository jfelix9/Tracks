<?php
    session_start();
    include_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tracks</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h1>Tracker</h1>
<h2>a PhD progress tracking tool for UTEP</h2>

<?php
if(isset($_POST['username'])){
  $input_username = isset($_POST['username']) ? $_POST['username'] : " ";
  $input_password = isset($_POST['password']) ? $_POST['password'] : " ";

  $_SESSION['username'] = $input_username;
  
  $queryStudent = "SELECT * FROM Student WHERE Suser_name='" . $input_username . "' AND Spass_word='" . $input_password . "';";
  $resultStudent = $conn->query($queryStudent);

  if ($resultStudent->num_rows > 0  ) {
    //if there is a result, that means that the user was found in the database
    $_SESSION['student_user'] = $input_username;
    $_SESSION['logged_in'] = true;
    header("Location: student-welcome.php");
    //echo"User found";
  }

  $queryAdvisor = "SELECT * FROM Faculty WHERE Fuser_name='" . $input_username . "' AND Fpass_word='" . $input_password . "';";
  $resultAdvisor = $conn->query($queryAdvisor);

  if ($resultAdvisor->num_rows > 0  ) {
    //if there is a result, that means that the user was found in the database
    $_SESSION['advisor_user'] = $input_username;
    $_SESSION['logged_in'] = true;
    header("Location: faculty-welcome.php");
    //echo"User found";
  }

  $queryAdmin = "SELECT * FROM Admin WHERE Auser_name='" . $input_username . "' AND Apass_word='" . $input_password . "';";
  $resultAdmin = $conn->query($queryAdmin);

  if ($resultAdmin ->num_rows > 0  ) {
    //if there is a result, that means that the user was found in the database
    $_SESSION['admin_user'] = $input_username;
    $_SESSION['logged_in'] = true;
    header("Location: admin-welcome.php");
    //echo"User found";
  } else {
    echo "We couldn't find that user ¯\_(ツ)_/¯";
  }
}
?>

<form method="POST" action="login.php">
<label for="username">Username: </label>
<input type="text" name="username" id="username" placeholder="username"/>
<label for="password">Password: </label>
<input type="password" name="password" id="password" placeholder="password"/>
<input type="submit" name="login" value="log in" class="btn"/>
</form>
<form action="student-signup.php" method="post">
    <input type="submit" name="signup" value="student sign up" class="btn"/>
</form>
<form action="admin-signup.php" method="post">
    <input type="submit" name="admin-signup" value="admin sign up" class="btn"/>
</form>
<form action="faculty-signup.php" method="post">
    <input type="submit" name="faculty-signup" value="faculty sign up" class="btn"/>
</form>

</body>
</html>