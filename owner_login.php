<?php

include 'dbconfig.php';
session_start();
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
       $mobile_query = "SELECT * FROM ownersignup WHERE mobile_number =' $mobilenumber'";
        $mobile_query_run = mysqli_query($conn, $mobile_query);
        if($mobile_query_run)
        {
           if(mysqli_num_rows($mobile_query_run)>0)
           {
           $_SESSION['logged_in'] = true;
           $cookie_lifetime = 365 * 24 * 60 * 60; // 1 year in seconds
session_set_cookie_params($cookie_lifetime);
            header('Location: home.php');
            exit();
            echo'<script language = "javascript">';
            echo'alert("Successfully Loged in")';
            echo'</script>';
            session_write_close();
        }
        else{
           
            header('Location: signuppage.php'); 
            exit();
            echo'<script language = "javascript">';
            echo'alert("Mobile number is not already exist please Signup to continue")';
           echo'</script>';
         }
    }
       
    
    }
   // echo'<script language = "javascript">';
    //echo'echo '.$username.';location.href="dee.php"';
    //echo'</script>';
   

$conn->close();
?>
