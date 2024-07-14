<?php
session_start();
$uusername = $_GET["username"];
$umobilenumber = $_GET["mobilenumber"];
include_once 'dbConfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shopname = $_COOKIE['username'];
    $smobilenumber = $_COOKIE['mobilenumber'];
    if($totalAmount = $_POST["totalamount"])
    {
        $balance=$_POST["totalamount"];
    
    }
    else{
        $balance=0;
    }
    /*if($debit = $_POST['credit'])
    {
        $debit = $_POST['credit'];
    }
    else{
        $debit =0;
    }*/
    //$debit = 0;
    // Retrieve total credit and debit amounts for the user
   
        // Prepare SQL statement to insert data into the table
        //$sql = "INSERT INTO owneraccounts (username, shopname, umobilenumber, smobilenumber, totalamount,credit, balance, purchasedate)
                //VALUES ('$uusername', '$shopname', '$umobilenumber', '$smobilenumber', '$totalAmount', '$credit', '$balance', CURDATE())";

        //if ($conn->query($sql) === TRUE) {
            header("Location: shower4.php?username=$uusername&mobilenumber=$umobilenumber&balance=$balance");
        exit();
        //} else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        //}
    } else {
        echo "Error: Unable to retrieve credit and debit amounts.";
    }
//}

$conn->close();
?>
