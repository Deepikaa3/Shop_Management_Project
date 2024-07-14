<?php
session_start();
$uusername = $_GET["username"];
$umobilenumber = $_GET["mobilenumber"];
include_once 'dbConfig.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shopname = $_COOKIE['username'];
    $smobilenumber = $_COOKIE['mobilenumber'];
    if($totalAmount = $_POST["credit"])
    {
        $debit=$_POST["credit"];
    
    }
    else{
        $debit=0;
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
    $sql1 = "SELECT SUM(totalamount) AS totalamount, SUM(credit) AS total_debit FROM owneraccounts WHERE smobilenumber = '$smobilenumber' AND umobilenumber = '$umobilenumber'";
    $result1 = $conn->query($sql1);
    $bidBalanceQuery = "SELECT balance FROM owneraccounts WHERE smobilenumber = '$smobilenumber' AND umobilenumber = '$umobilenumber' AND bid != 0";
    $bidBalanceResult = $conn->query($bidBalanceQuery);

    if (!$bidBalanceResult) {
        die("Error fetching bid balance: " . $conn->error);
    }
    
    $bidBalances = [];
    
    if ($bidBalanceResult->num_rows > 0) {
        while ($row = $bidBalanceResult->fetch_assoc()) {
            $bidBalances[] = $row['balance'];
        }
    }
    
    // Sum all balances where bid != 0
    $sumBidBalances = array_sum($bidBalances);
    
    if ($result1->num_rows > 0) {
        $row = $result1->fetch_assoc();

        // Get total credit and debit amounts
        $tamount = $row['totalamount'];
        $totalDebit = $row['total_debit'];
//echo $sumBidBalances;
//alert($sumBidBalances);
        // Calculate balance
        $balance = $tamount-$totalDebit+$sumBidBalances-$debit;

        // Prepare SQL statement to insert data into the table
        //$sql = "INSERT INTO owneraccounts (username, shopname, umobilenumber, smobilenumber, totalamount,credit, balance, purchasedate)
                //VALUES ('$uusername', '$shopname', '$umobilenumber', '$smobilenumber', '$totalAmount', '$credit', '$balance', CURDATE())";

        //if ($conn->query($sql) === TRUE) {
            header("Location: shower6.php?username=$uusername&mobilenumber=$umobilenumber&totalamount=$debit&balance=$balance");
        exit();
        //} else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        //}
    } else {
        echo "Error: Unable to retrieve credit and debit amounts.";
    }
}

$conn->close();
?>
