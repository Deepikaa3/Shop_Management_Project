<?php
session_start();
include 'dbconfig.php';
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
{
  header("Location: home.php");
  exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $mobilenumber = $_POST["mobilenumber"];
    $_SESSION['username'] = $username;
    $_SESSION['mobilenumber'] = $mobilenumber;
    setcookie('username',$username,time()+60*60*24*30);
    setcookie('mobilenumber',$mobilenumber,time()+60*60*24*30);

if (isset($_POST['submit']))
{
    $mobile_query = "SELECT * FROM ownersignup WHERE mobile_number =' $mobilenumber'";
    $mobile_query_run = mysqli_query($conn, $mobile_query);
    if(mysqli_num_rows($mobile_query_run)>0)
    {
        echo'<script language = "javascript">';
        echo'alert("Mobile number is already exist please login to continue")';
        echo'</script>';
        header('Location: loginpage.php');
        exit();
    }
    else{
        $sql = "INSERT INTO ownersignup (shop_name, mobile_number,create_date,create_time) VALUES ('$username', '$mobilenumber',CURDATE(),CURTIME())";

        if ($conn->query($sql) === TRUE) {
            echo'<script language = "javascript">';
        echo'alert("New record created successfully")';
        echo'</script>';
        $_SESSION['logged_in'] = true;
            header('Location: register_owner.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}
    
   
}

$conn->close();
?>
