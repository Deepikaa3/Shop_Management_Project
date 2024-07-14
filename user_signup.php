<?php
session_start();
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $mobilenumber = $_POST["mobilenumber"];
    $_SESSION['username'] = $username;
    $_SESSION['umobilenumber'] = $mobilenumber;
    setcookie('username', $username, time() + 60 * 60 * 24 * 30);
    setcookie('umobilenumber', $mobilenumber, time() + 60 * 60 * 24 * 30);

    if (isset($_POST['submit'])) {
        $mobile_query = "SELECT * FROM usersignup WHERE mobilenumber = '$mobilenumber'";
        $mobile_query_run = mysqli_query($conn, $mobile_query);
        
        if(mysqli_num_rows($mobile_query_run) > 0) {
            echo '<script language = "javascript">';
            echo 'alert("Mobile number already exists, please login to continue")';
            echo '</script>';
            header('Location: loginpage.php');
            exit();
        } else {
            $sql = "INSERT INTO usersignup (username, mobilenumber, create_date, create_time) VALUES ('$username', '$mobilenumber', CURDATE(), CURTIME())";
            if ($conn->query($sql) === TRUE) {
                echo '<script language = "javascript">';
                echo 'alert("New record created successfully")';
                echo '</script>';
                header('Location: register_user.php');
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>
