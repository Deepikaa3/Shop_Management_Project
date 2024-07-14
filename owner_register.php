<?php
session_start();
// Establish connection to your database (replace these with your actual credentials)
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $shopcategory = $_POST["shopcategory"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $district = $_POST["district"];
    $state = $_POST["state"];
    $pincode = $_POST["pincode"];
   

    if(isset($_COOKIE['username']) && isset($_COOKIE['mobilenumber'])) {
        $username = $_COOKIE['username'];
        $mobilenumber = $_COOKIE['mobilenumber'];
    $sql = "UPDATE ownersignup SET username='$username', shop_category='$shopcategory', aaddress='$address', city='$city', district='$district', sstate='$state', pincode='$pincode' WHERE mobile_number = $mobilenumber";

    if ($conn->query($sql) === TRUE) {
        echo 'alert("New record created successfully")';
        header('Location: home.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    }

$conn->close();
?>
