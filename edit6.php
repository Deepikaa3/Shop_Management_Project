<?php
session_start();

include_once 'dbConfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Use $_POST to get form data
    $username = $_POST["username"];
    $umobilenumber = $_POST["mobilenumber"];

    $shopname = $_COOKIE['username'];
    $smobilenumber = $_COOKIE['mobilenumber'];
    $selectedOption = isset($_POST['reminderType']) ? $_POST['reminderType'] : '';
    $selectedDate = isset($_POST['dob']) ? $_POST['dob'] : '';

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

    // Use the selected date if 'calendarDate' option is chosen
    $newDate = ($selectedOption === 'calendarDate') ? $selectedDate : date('Y-m-d', strtotime($interval));
   
    // Prepare SQL statement to update 'rdate'
    $sql = "UPDATE owneraccounts 
            SET rdate = '$newDate',remainderdate='$selectedOption'
            WHERE smobilenumber = '$smobilenumber' AND umobilenumber = '$umobilenumber' ";

    if ($conn->query($sql) === TRUE) {
        // Set the session variable
        $_SESSION['rdate'] = $newDate;

        // Redirect the user to the HTML page
        header("Location: sample2.php?username=$username&mobilenumber=$umobilenumber");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
