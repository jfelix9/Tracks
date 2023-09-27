<?php
session_start();
include_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Tracks</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1>Add Paper</h1>

    <form action="student-welcome.php" method="post">
        <input type="submit" name="home" value="home" class="btn" />
    </form>

    <form action="student-add-paper.php" method="post">
        <input type="text" name="newpaper" placeholder="paper title">
        <input type="date" name="datepublished">
        <input type="submit" name="addpaper" value="add paper" class="btn" />
    </form>

    <?php
    $newpaper = strtotime($_POST['datepublished']);
    $newpaper = date('Y-m-d', $newpaper);

    $queryStudent = "INSERT INTO Student_papers VALUES ('" . $_SESSION['student_user'] . "', '" . $_POST['newpaper'] . "', '" . $newpaper . "');";
    $resultStudent = $conn->query($queryStudent);
    ?>