 <?php
 include_once 'dbConfig.php';

$shopname = $_COOKIE['username'];
$smobilenumber = $_COOKIE['mobilenumber'];


$sql = "SELECT username, umobilenumber, purchasedate, SUM(balance) AS totalbalance 
        FROM owneraccounts 
        WHERE smobilenumber ='$smobilenumber'
        GROUP BY umobilenumber";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['query']) && !empty($_POST['query'])) {
        $searchKeyword = $_POST['query'];
        $sql = "SELECT username, umobilenumber, purchasedate, SUM(balance) AS totalbalance 
                FROM owneraccounts 
                WHERE smobilenumber ='$smobilenumber' AND username = '$searchKeyword' 
                GROUP BY umobilenumber";
    } elseif (isset($_POST['cat_name'])) {
        $catname = $_POST['cat_name'];

        switch ($catname) {
            case 'Zerobalance':
                $sql = "SELECT username, umobilenumber, SUM(balance) AS totalbalance 
                FROM owneraccounts 
                WHERE smobilenumber ='$smobilenumber'
                GROUP BY umobilenumber
                HAVING totalbalance = 0 OR totalbalance <= 0";
        //echo $sql;
                break;
            case 'Minbalance':
                $sql = "SELECT username, umobilenumber, SUM(balance) AS totalbalance 
        FROM owneraccounts 
        WHERE smobilenumber ='$smobilenumber'
        GROUP BY umobilenumber HAVING totalbalance > 0
        ORDER BY totalbalance ASC  ";
                break;
            case 'Maxbalance':
                $sql = "SELECT username, umobilenumber, SUM(balance) AS totalbalance 
        FROM owneraccounts 
        WHERE smobilenumber ='$smobilenumber'
        GROUP BY umobilenumber HAVING totalbalance > 0
        ORDER BY totalbalance DESC";

                break;
            case 'regularpay':
                $sql = "SELECT username, umobilenumber, SUM(balance) AS totalbalance 
                            FROM owneraccounts 
                            WHERE smobilenumber ='$smobilenumber'
                            AND (remainderdate = 'weekly' AND DATE_ADD(purchasedate, INTERVAL 7 DAY) > CURDATE()
                            OR remainderdate = 'monthly' AND DATE_ADD(purchasedate, INTERVAL 1 MONTH) > CURDATE()
                            OR remainderdate = 'onday')
                            GROUP BY umobilenumber 
                            HAVING totalbalance = 0
                            ORDER BY totalbalance DESC";
                break;
            case 'delaypay':
                $sql = "SELECT username, umobilenumber, SUM(balance) AS totalbalance 
                                FROM owneraccounts 
                                WHERE smobilenumber ='$smobilenumber'
                                AND ((remainderdate = 'weekly' AND DATE_ADD(purchasedate, INTERVAL 7 DAY) <= CURDATE())
                                OR (remainderdate = 'monthly' AND DATE_ADD(purchasedate, INTERVAL 1 MONTH) <= CURDATE())
                                OR remainderdate = 'onday')
                                GROUP BY umobilenumber 
                                HAVING totalbalance <> 0
                                ORDER BY totalbalance DESC";
                break;
            default:
                // Default query remains the same as the initial query
                break;
        }
    }
}
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $umobilenumber=$row['umobilenumber'];
          $username = $row["username"];
          $sql3 = "SELECT * FROM usersignup WHERE mobilenumber ='$umobilenumber'";
$result3 = $conn->query($sql3);
$sql2 = "SELECT usersignup.images from usersignup JOIN owneraccounts ON usersignup.mobilenumber = owneraccounts.umobilenumber WHERE owneraccounts.umobilenumber ='$umobilenumber' AND owneraccounts.smobilenumber ='$smobilenumber'";
$result1 = $conn->query($sql2);
$row1 = $result1->fetch_assoc();
if($result3->num_rows>0)
   {
    $row3 = $result3->fetch_assoc();
    $id = $row3['imgid'];
    $img = $row1['images'];
    $name = $row3['imgname'];
    
   }
  // echo'<div class="row pt-3"> ';
  echo'<div class="result pt-2">';
  echo '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">';
  echo '<div class="d-flex align-items-center">';
  ?><img src="<?php if(isset($row1['images'])) echo 'user_signup&login_page/img/'.$row1['images']; else echo 'boy.png';?>" class="icon-md me-3">
                       
  <?php //echo '<div class="icon icon-shape icon-md me-3 bg-gradient-dark shadow text-center"></div>';
  echo '<div class="d-flex flex-column">';
  echo "<a href='sample2.php?username=".$row["username"]."&mobilenumber=".$row["umobilenumber"]."'>";
 echo '<h6 class="mb-1 text-dark text-lg font-weight-bold">' . $row["username"] . '</h6>';
  //echo '<span class="text-dark text-sm">' . $row["umobilenumber"] . ' <span class="font-weight-bold"></span></span>';
  //$sqlDebit = "SELECT SUM(balance) AS totalbalance 
  //FROM owneraccounts 
  //WHERE smobilenumber ='$smobilenumber' AND umobilenumber = '$umobilenumber'";
//$resultDebit = $conn->query($sqlDebit);
//$rowDebit = $resultDebit->fetch_assoc();
//$totalbalance = $rowDebit['totalbalance'];
$sql1 = "SELECT SUM(totalamount) AS tamount, SUM(credit) AS tcredit 
FROM owneraccounts 
WHERE smobilenumber ='$smobilenumber' AND umobilenumber = '$umobilenumber'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0){
 $row1 = $result1->fetch_assoc();
 $tamount = $row1["tamount"];
 $tcredit = $row1['tcredit'];
}
$bidBalanceQuery = "SELECT balance FROM owneraccounts WHERE smobilenumber = '$smobilenumber' AND umobilenumber = '$umobilenumber' AND bid != 0";
    $bidBalanceResult = $conn->query($bidBalanceQuery);
    
    $bidBalances = [];
    
    if ($bidBalanceResult->num_rows > 0) {
        while ($row = $bidBalanceResult->fetch_assoc()) {
            $bidBalances[] = $row['balance'];
        }
    }
    
    // Sum all balances where bid != 0
    $sumBidBalances = array_sum($bidBalances);
    
$totalbalance = $tamount-$tcredit + $sumBidBalances;
// Rest of your code remains unchanged  
echo '<span class="text-dark text-sm font-weight-bold">&nbsp;Balance:'; ?>
  <?php echo '₹' . number_format($totalbalance, 2); ?>
<?php
echo'</span>';
echo '</div></div>';
  echo '<div class="d-flex"><button class="btn btn-link btn-icon-only btn-rounded btn-md text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></div>';
  echo '</li>';
   echo'</a>';
   echo'</div>';
        }
    } else {
        echo "0 results";
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
