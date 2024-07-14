<?php
session_start();
$uusername = $_GET["username"];
$umobilenumber = $_GET["mobilenumber"];
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_COOKIE['username'];
    $umobilenumber = $_COOKIE['umobilenumber'];
    $selectedOption = isset($_POST['rdateOption']) ? $_POST['rdateOption'] : '';
    $smobilenumber = $_GET['smobilenumber'];
    $shopname = $_GET['shopname'];
    // Prepare SQL statement to insert data into the table
    $sql = "UPDATE owneraccounts 
        SET remainderdate = '$selectedOption'
        WHERE umobilenumber = '$umobilenumber' AND smobilenumber = '$smobilenumber' ";

if ($conn->query($sql) === TRUE) {
     header("Location: useraccounts2.php?shopname=$shopname&smobilenumber=$smobilenumber");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

$conn->close();
?>
