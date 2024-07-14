<?php
session_start();
// Establish connection to your database (replace these with your actual credentials)
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$shopname = $_POST["shopname"];
	$shopcategory = $_POST["shopcategory"];
	$aaddress = $_POST["aaddress"];
	$city = $_POST["city"];
	$district = $_POST["district"];
	$sstate = $_POST["sstate"];
	$pincode = $_POST["pincode"];
	$smobilenumber = $_POST["mobilenumber"];

	if (isset($_COOKIE['mobilenumber'])) {
		$smobilenumber = $_COOKIE['mobilenumber'];
		$sql = "UPDATE ownersignup SET username='$username', shop_name='$shopname', shop_category='$shopcategory', aaddress='$aaddress', city='$city', district='$district', sstate='$sstate', pincode='$pincode' WHERE mobile_number = '$smobilenumber'";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("Record updated successfully");</script>';
			header('Location: oprofile.php');
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

$conn->close();
?>
