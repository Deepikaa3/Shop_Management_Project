<?php
session_start();
$uusername = $_GET["username"];
$umobilenumber = $_GET["mobilenumber"];
$id = $_GET['id'];
include_once 'dbConfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shopname = $_COOKIE['username'];
    $smobilenumber = $_COOKIE['mobilenumber'];
    $totalAmount = $_POST["totalamount"];
    $credit = $_POST["credit"];
    $balance = $_POST["balance"];
    $itemsCount = $_POST["itemscount"];
    $remainderDate = $_POST["rdate"];
    $notes = $_POST["notes"];
    // Prepare SQL statement to insert data into the table
    $sql = "UPDATE owneraccounts 
        SET totalamount = '$totalAmount', 
            credit = '$credit', 
            balance = '$balance', 
            itemscount = '$itemsCount',creditdate = CURDATE()
        WHERE umobilenumber = '$umobilenumber' AND smobilenumber ='$smobilenumber' AND id = '$id'";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    echo $uusername;
    echo $umobilenumber;
    // Redirect to the next page with username and mobilenumber
    header("Location: sample2.php?username=$uusername&mobilenumber=$umobilenumber");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

$conn->close();
?>
