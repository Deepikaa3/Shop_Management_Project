<?php
$servername = "localhost";
$username = "u259202658_project1user";
$password = "Password#KK8910";
$dbname = "u259202658_project1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}