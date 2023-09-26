<?php
session_start();
include_once 'config.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Tracks</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <?php
  if (isset($_POST['username'])) {
    $input_username = isset($_POST['username']) ? $_POST['username'] : " ";
    $input_password = isset($_POST['password']) ? $_POST['password'] : " ";

    $_SESSION['username'] = $input_username;

    $queryStudent = "SELECT * FROM Student WHERE Suser_name='" . $input_username . "' AND Spass_word='" . $input_password . "';";
    $resultStudent = $conn->query($queryStudent);

    if ($resultStudent->num_rows > 0) {
      //if there is a result, that means that the user was found in the database
      $_SESSION['student_user'] = $input_username;
      $_SESSION['logged_in'] = true;
      header("Location: student-welcome.php");
      //echo"User found";
    }

    $queryAdvisor = "SELECT * FROM Faculty WHERE Fuser_name='" . $input_username . "' AND Fpass_word='" . $input_password . "';";
    $resultAdvisor = $conn->query($queryAdvisor);

    if ($resultAdvisor->num_rows > 0) {
      //if there is a result, that means that the user was found in the database
      $_SESSION['advisor_user'] = $input_username;
      $_SESSION['logged_in'] = true;
      header("Location: faculty-welcome.php");
      //echo"User found";
    }

    $queryAdmin = "SELECT * FROM Admin WHERE Auser_name='" . $input_username . "' AND Apass_word='" . $input_password . "';";
    $resultAdmin = $conn->query($queryAdmin);

    if ($resultAdmin->num_rows > 0) {
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

  <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1>TRACKS</h1>
    <h2>a PhD progress tracking tool</h2>
  </div>
  <div class="col-md-10 mx-auto col-lg-5">
    <div class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
      <form method="POST" action="login.php">
        <div class="form-floating mb-3">
          <input type="text" name="username" id="username" placeholder="username" class="form-control" />
          <label for="username">Username</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="password" id="password" placeholder="password" class="form-control" />
          <label for="password">Password</label>
        </div>
        <input type="submit" name="login" value="log in" class="w-100 btn btn-lg btn-primary" />
      </form>
      <form action="student-signup.php" method="post">
        <input type="submit" name="signup" value="student sign up" class="m-2" />
      </form>
      <form action="admin-signup.php" method="post">
        <input type="submit" name="admin-signup" value="admin sign up" class="m-2" />
      </form>
      <form action="faculty-signup.php" method="post">
        <input type="submit" name="faculty-signup" value="faculty sign up" class="m-2" />
      </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>