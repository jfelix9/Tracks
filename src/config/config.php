<?php
session_start();
/*
$host = "ilinkserver.cs.utep.edu";
$user = "jifelix2";
$password = "*utep2020!";
$dbname = "s20pm_team7";
*/

$host = "localhost";
$user = "user";
$password = "pass";
$dbname = "cooldb";

$conn = new mysqli($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}