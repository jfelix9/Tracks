<!DOCTYPE html>
<html>
<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css"> 
    <?php
        session_start();
        include_once 'config.php';
    
        $username = $_SESSION['username'];

        $sql = "DELETE FROM Student WHERE Suser_name = '" . $username . "';";
        $result = $conn->query($sql);

        $sql2 = "DELETE FROM Faculty WHERE Fuser_name = '" . $username . "';";
        $result = $conn->query($sql2);

        $sql3 = "DELETE FROM Admin WHERE Auser_name = '" . $username . "';";
        $result = $conn->query($sql3);
    ?>
</head>
<body>
<h1>You're account has been deleted</h1>

<form action="login.php" method="post">
    <input type="submit" name="backtologin" value="Okay" class="btn"/>
</form>

</body>
</html>