<?php

include_once 'dbConfig.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $umobilenumber = $_POST["mobilenumber"];
   
       $mobile_query = "SELECT * FROM owneraccounts WHERE umobilenumber =' $umobilenumber'";
        $mobile_query_run = mysqli_query($conn, $mobile_query);
        if($mobile_query_run)
        {
           if(mysqli_num_rows($mobile_query_run)>0)
           {
          
            header("Location: sample2.php?username=$username&mobilenumber=$umobilenumber");
        exit();
            echo'<script language = "javascript">';
            //echo'alert("Successfully Loged in")';
            echo'</script>';
        }
        else{
           
            header("Location:sample2.php?username=$username&mobilenumber=$umobilenumber");
            exit();
            echo'<script language = "javascript">';
           // echo'alert("Mobile number is not already exist please Signup to continue")';
           echo'</script>';
         }
    }
       
    
    }
   // echo'<script language = "javascript">';
    //echo'echo '.$username.';location.href="dee.php"';
    //echo'</script>';
   

$conn->close();
?>
