<?php
/**
 * CS 4342 Database Management
 * @author Kevin Apodaca
 * @since 2/12/20
 * @version 1.0
 * Description: The purpose of this file is to serve as a template for students to create users and populate them into the database.
 */

require_once('config.php');
?>

<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="css/styles.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">  
<title>CS4342 Test Sign Up</title>
</head>
<body>
<h1>CREATE ACCOUNT</h1>
<div id=menu>
<form action="create_account.php" method="post">
First Name: <input type="text" name="first_name"><br><br>
Middle Name: <input type="text" name="middle_name"><br><br>
Last Name: <input type="text" name="last_name"><br><br>

username: <input type="text" name="username"><br><br>
password: <input type="password" name="password"><br><br>

<input name='Submit' type="submit" value="Create">
</form>
<br>
<a href="index.php">Back</a></br>
</div>
<?php
if (isset($_POST['Submit'])){

    $userID = " ";
    /**
     * Grab information from the form submission and store values into variables.
     */
    $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : " ";
    $middleName = isset($_POST['middle_name']) ? $_POST['middle_name'] : " ";
    $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : " ";
    $username = isset($_POST['username']) ? $_POST['username'] : " ";
    $password = isset($_POST['password']) ? $_POST['password'] : " ";

    //insert to User table;
    $queryUser  = "INSERT INTO Student (U_username, U_password, U_first, U_middle, U_last)
                VALUES ('".$username."', '".$password."', '".$firstName."', '".$middleName."', '".$lastName."');";
    if ($conn->query($queryUser) === TRUE) {
       // echo "New record created successfully";
    } else {
        echo "Error: " . $queryUser . "<br>" . $conn->error;
    }
    echo "<p>Hello " .$firstName. " ".$middleName." ".$lastName."!<br> Your username is: ".$username."</p>";

}
?>

</body>
</html>
