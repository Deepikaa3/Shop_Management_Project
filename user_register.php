<?php
session_start();
// Establish connection to your database (replace these with your actual credentials)
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $district = $_POST["district"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];
    $pro = $_POST["pro"];
   

    if(isset($_COOKIE['username']) && isset($_COOKIE['umobilenumber'])) {
        $username = $_COOKIE['username'];
        $mobilenumber = $_COOKIE['umobilenumber'];
    $sql = "UPDATE usersignup SET username='$username', dob='$dob',gender='$gender', aaddress='$address', city='$city', district='$district', sstate='$state', pincode='$pincode',profession='$pro' WHERE mobilenumber = '$mobilenumber'";

    if ($conn->query($sql) === TRUE) {
        echo 'alert("New record created successfully")';
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    }

$conn->close();
?>
