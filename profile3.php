<?php
session_start();
// Establish connection to your database (replace these with your actual credentials)
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$dob = $_POST["dob"];
	$gender = $_POST["gender"];
	$aaddress = $_POST["aaddress"];
	$city = $_POST["city"];
	$district = $_POST["district"];
	$sstate = $_POST["sstate"];
	$pincode = $_POST["pincode"];
	$profession = $_POST["profession"];

	if (isset($_COOKIE['umobilenumber'])) {
		$umobilenumber = $_COOKIE['umobilenumber'];
		$sql = "UPDATE usersignup SET username='$username', dob='$dob', gender='$gender', aaddress='$address', city='$city', district='$district', sstate='$state', pincode='$pincode', profession='$profession' WHERE mobilenumber = '$umobilenumber'";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("Record updated successfully");</script>';
			header('Location: profile.php');
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}

$conn->close();
?>
