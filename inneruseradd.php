<?php
session_start();
$uusername = $_GET["username"];
$umobilenumber = $_GET["mobilenumber"];
include_once 'dbConfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shopname = $_COOKIE['username'];
    $smobilenumber = $_COOKIE['mobilenumber'];
    $totalAmount = $_POST["totalamount"];
    $credit = $_POST["credit"];
    $balance = $_POST["balance"];
    $itemsCount = $_POST["itemscount"];
    //$remainderDate = $_POST["rdate"];
    $notes = $_POST["notes"];
   // $sql1 = "SELECT balance FROM owneraccounts WHERE smobilenumber = '$smobilenumber' AND umobilenumber = '$umobilenumber' ORDER BY id DESC LIMIT 1";
//echo $sql1;
//$result1 = $conn->query($sql1);

//if ($result1->num_rows > 0) {
    //$row = $result1->fetch_assoc();
   // $tamount = $row['balance']+$balance;
//}
//else{
  //$tamount=0;
//}
//echo $balance;
//echo $tamount;
//echo $row['balance'];
    // Prepare SQL statement to insert data into the table
    //$sql = "INSERT INTO owneraccounts (username,shopname,umobilenumber,smobilenumber,totalamount,credit,balance,itemscount,purchasedate,rdate,notes)
   // VALUES ('$uusername','$shopname','$umobilenumber', '$smobilenumber','$totalAmount', '$credit', '$tamount', '$itemsCount',CURDATE(), '$remainderDate', '$notes')";

//if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    //echo $uusername;
   // echo $umobilenumber;
    
    header("Location: shower5.php?username=$uusername&mobilenumber=$umobilenumber&totalamount=$totalAmount&credit=$credit&balance=$balance&itemscount=$itemscount&notes=$notes");
    exit();
//}
 //else {
    echo "Error: " . $sql . "<br>" . $conn->error;
//}

}

$conn->close();
?>
