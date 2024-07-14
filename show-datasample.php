<?php
include_once 'config.php';
$username = $_COOKIE['username'];
$umobilenumber = $_COOKIE['umobilenumber'];


$sql = "SELECT shopname, smobilenumber, purchasedate, SUM(balance) AS totalbalance 
        FROM owneraccounts 
        WHERE umobilenumber ='$umobilenumber'
        GROUP BY smobilenumber";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['query']) && !empty($_POST['query'])) {
        $searchKeyword = $_POST['query'];
        $sql = "SELECT shopname, smobilenumber, purchasedate, SUM(balance) AS totalbalance 
                FROM owneraccounts 
                WHERE umobilenumber ='$umobilenumber' AND shopname = '$searchKeyword' 
                GROUP BY smobilenumber";
    } elseif (isset($_POST['cat_name'])) {
        $catname = $_POST['cat_name'];

        switch ($catname) {
            case 'Zerobalance':
                $sql = "SELECT shopname, smobilenumber, SUM(balance) AS totalbalance 
                FROM owneraccounts 
                WHERE umobilenumber ='$umobilenumber'
                GROUP BY smobilenumber
                HAVING totalbalance = 0 OR totalbalance <= 0";
               // echo $sql;
        
                break;
            case 'Minbalance':
                $sql = "SELECT shopname, smobilenumber, SUM(balance) AS totalbalance 
        FROM owneraccounts 
        WHERE umobilenumber ='$umobilenumber' 
        GROUP BY smobilenumber HAVING totalbalance > 0
        ORDER BY totalbalance ASC";
       // echo $sql;
                break;
            case 'Maxbalance':
                $sql = "SELECT shopname, smobilenumber, SUM(balance) AS totalbalance 
        FROM owneraccounts 
        WHERE umobilenumber ='$umobilenumber' 
        GROUP BY smobilenumber HAVING totalbalance > 0
        ORDER BY totalbalance DESC";
        //echo $sql;

                break;
            
            default:
                // Default query remains the same as the initial query
                break;
        }
    }
}

$result = $conn->query($sql);

if ($result) {
   // echo'<div class="result mt-3">';
            //echo'<div class="card-body mt-0 mb-0">';
            //echo'<ul class="list-group mb-0">';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $smobilenumber=$row['smobilenumber'];
            $shopname = $row["shopname"];
            $sql3 = "SELECT * FROM ownersignup WHERE mobile_number ='$smobilenumber'";
  $result3 = $conn->query($sql3);
  $sql2 = "SELECT ownersignup.images from ownersignup JOIN owneraccounts ON ownersignup.mobile_number = owneraccounts.smobilenumber WHERE owneraccounts.smobilenumber ='$smobilenumber' AND owneraccounts.umobilenumber ='$umobilenumber'";
  $result1 = $conn->query($sql2);
  $row1 = $result1->fetch_assoc();
  if($result3->num_rows>0)
     {
      $row3 = $result3->fetch_assoc();
      $id = $row3['imgid'];
      $img = $row1['images'];
      $name = $row3['imgname'];
      
     }
     echo'<div class="result pt-2">';
     echo '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">';
     echo '<div class="d-flex align-items-center">';
     ?><img src="<?php if(isset($row1['images'])) echo 'img/'.$row1['images']; else echo 'boy.png';?>" class="icon-md me-3">
                          
     <?php //echo '<div class="icon icon-shape icon-md me-3 bg-gradient-dark shadow text-center"></div>';
     echo '<div class="d-flex flex-column">';
     echo "<a href='useraccounts2.php?shopname=".$row["shopname"]."&mobilenumber=".$row["smobilenumber"]."'>";
    echo '<h6 class="mb-1 text-dark text-lg font-weight-bold">' . $row["shopname"] . '</h6>';
     //echo '<span class="text-dark text-sm">' . $row["umobilenumber"] . ' <span class="font-weight-bold"></span></span>';
     $sqlDebit = "SELECT SUM(totalamount) AS tamount, SUM(credit) AS tcredit
     FROM owneraccounts 
     WHERE smobilenumber ='$smobilenumber' AND umobilenumber = '$umobilenumber'";
   $resultDebit = $conn->query($sqlDebit);
   if ($resultDebit->num_rows > 0) {
    //$rowDebit = $resultDebit->fetch_assoc();
   $rowDebit = $resultDebit->fetch_assoc();
   $tamount = $rowDebit['tamount'];
   $tcredit = $rowDebit['tcredit'];
   $totalbalance=$tamount-$tcredit;
   }
   //$totalbalance=0;
   // Rest of your code remains unchanged  
   echo '<span class="text-dark text-sm font-weight-bold">&nbsp;Balance:'; ?>
     <?php echo '₹' . number_format($totalbalance, 2); ?>
   <?php
   echo'</span>';echo '</div></div>';
  echo '<div class="d-flex"><button class="btn btn-link btn-icon-only btn-rounded btn-md text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></div>';
  echo '</li>';
   echo'</a>';
   echo'</div>';
        }
        echo'<br><br>';
        echo'</ul>';
        echo'</div>';
        echo'</div>';
    } else {
        echo "0 results";
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>