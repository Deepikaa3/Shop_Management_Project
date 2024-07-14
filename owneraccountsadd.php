<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
session_start();
include_once 'dbConfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["mobilenumber"])) {
    $username = $_POST["username"];
    $shopname = $_COOKIE['username'];
    $umobilenumber = $_POST["mobilenumber"];
    $smobilenumber = $_COOKIE['mobilenumber'];

    // Check if the mobile number already exists in the database
    $check_query = "SELECT * FROM owneraccounts WHERE umobilenumber = '$umobilenumber' AND smobilenumber='$smobilenumber'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $row = $check_result->fetch_assoc();
        $username=$row['username'];
        echo "<script>
        Swal.fire({
            icon: 'info',
            title: 'Information',
            text: 'The user is already exists.'
        }).then(function() {
            window.location.href = 'sample2.php?username=$username&mobilenumber=$umobilenumber'; // Redirect to sample2.php
        });
      </script>";
exit();
       
       
    } else {
        // Mobile number doesn't exist, proceed with insertion
        $sql = "INSERT INTO owneraccounts (username, shopname, umobilenumber, smobilenumber) VALUES ('$username', '$shopname', '$umobilenumber', '$smobilenumber')";
//echo $username;
//echo $umobilenumber;
        if ($conn->query($sql) === TRUE) {
            echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'new customer is added',
            text: 'New Customer is  successfullyadded.'
        }).then(function() {
            window.location.href = 'sample1.php'; // Redirect to sample2.php
        });
      </script>";
           
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

</body>
</html>