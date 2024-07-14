<?php
session_start();
$uusername = $_GET["username"];
$umobilenumber = $_GET["mobilenumber"];
$servername = "localhost";
include_once 'dbConfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shopname = $_COOKIE['username'];
    $smobilenumber = $_COOKIE['mobilenumber'];
    $credit = $_POST["credit"];

    // Retrieve total credit and debit amounts for the user
    $sql1 = "SELECT SUM(totalamount) AS total_credit, SUM(credit) AS total_debit FROM owneraccounts WHERE smobilenumber = '$smobilenumber' AND umobilenumber = '$umobilenumber'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {
        $row = $result1->fetch_assoc();

        // Get total credit and debit amounts
        $totalCredit = $row['total_credit'];
        $totalDebit = $row['total_debit'] + $credit;
        $totalAmount = 0;
        // Calculate balance
        $balance = $totalCredit - $totalDebit;
$Credit = 0;
        $_SESSION['insertedData'] = [
            'username' => $uusername,
            'shopname' => $shopname,
            'umobilenumber' => $umobilenumber,
            'smobilenumber' => $smobilenumber,
            'totalAmount' => $totalAmount,
            'credit' => $credit,
            'balance' => $balance,
        ];
        
        

        // Redirect to the next page
        header("Location: shower4.php?username=$uusername&mobilenumber=$umobilenumber&totalamount=$Credit&credit=$totalDebit&balance=$balance");
        exit();
    } else {
        echo "Error: Unable to retrieve credit and debit amounts.";
    }
}

$conn->close();
?>
