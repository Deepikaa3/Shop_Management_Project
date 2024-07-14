<?php

include_once 'config.php';
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
{
  header("Location:inedx.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $mobilenumber = $_POST["mobilenumber"];
    $_SESSION['username'] = $username;
    $_SESSION['umobilenumber'] = $mobilenumber;
    setcookie('username',$username,time()+60*60*24*30);
    setcookie('umobilenumber',$mobilenumber,time()+60*60*24*30);
       $mobile_query = "SELECT * FROM usersignup WHERE mobilenumber =' $mobilenumber'";
        $mobile_query_run = mysqli_query($conn, $mobile_query);
        if($mobile_query_run)
        {
           if(mysqli_num_rows($mobile_query_run)>0)
           {
            $_SESSION['logged_in'] = true;
            header('Location: index.php');
            exit();
            echo'<script language = "javascript">';
            echo'alert("Successfully Loged in")';
            echo'</script>';
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
