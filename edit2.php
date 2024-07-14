<?php
session_start();
include_once 'dbConfig.php';

$username = $_GET["username"];
$umobilenumber = $_GET["mobilenumber"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shopname = $_COOKIE['username'];
    $smobilenumber = $_COOKIE['mobilenumber'];
    $selectedOption = isset($_POST['rdateOption']) ? $_POST['rdateOption'] : '';

    // Calculate the new date based on the selected option
    switch ($selectedOption) {
        case 'weekly':
            $interval = '+7 days';
            break;
        case 'monthly':
            $interval = '+1 month';
            break;
        // Add more cases as needed
        default:
            $interval = '+0 days'; // No change
            break;
    }

    // Calculate the new date based on the interval
    $newDate = date('Y-m-d', strtotime($interval));

    // Prepare SQL statement to update 'rdate'
    $sql = "UPDATE owneraccounts 
            SET rdate = '$newDate'
            WHERE smobilenumber = '$smobilenumber' AND umobilenumber = '$umobilenumber' ";
            
    if ($conn->query($sql) === TRUE) {
        header("Location: sample2.php?username=$username&mobilenumber=$umobilenumber");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
