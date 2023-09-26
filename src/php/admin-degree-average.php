<!DOCTYPE html>
<html>
<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<h1>Degree Average</h1>

<form action="admin-welcome.php" method="post">
    <input type="submit" name="adminhome" value="home" class="btn"/>
</form>

<?php
    session_start();
    include_once 'config.php';

    $username = $_SESSION['username']; 
    echo 'logged in as ' . $username . '<br>';

    /*
    $queryAdmin = "SELECT * FROM Admin WHERE Auser_name = '" . $username . "';";
    $resultAdmin = $conn->query($queryAdmin);

    if ($resultAdmin->num_rows > 0) {
        
    } else {

        $queryAdmin = "SELECT * FROM Faculty WHERE Fuser_name = '" . $username . "';";
        $resultAdmin = $conn->query($queryAdmin);
        if ($resultAdmin->num_rows > 0) {
            $queryAdmin = "SELECT Sdegree, AVG(Sgpa) FROM Student WHERE Fuser_name = '" . $username . "'  GROUP BY 1;";
        }
    }
    */

    $queryAdmin = "SELECT Sdegree, AVG(Sgpa) FROM Student GROUP BY 1;";
    $resultAdmin = $conn->query($queryAdmin);
    
    if ($resultAdmin->num_rows > 0) {
        echo "<table style=\"width:100%\">
            <tr>
                <th>degree</th>
                <th>gpa</th>
            </tr>";

        // output data of each row
        while($row = $resultAdmin->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["Sdegree"] . "</td>
            <td>" . $row["AVG(Sgpa)"] . "</td>
            </tr>";
        }
    } else {
        echo "0 results";
    }
    
?>

</body>
</html>