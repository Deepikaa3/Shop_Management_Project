<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Accounts
  </title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
   <!-- Favicons -->
   <link href="home/assets/img/favicon.png" rel="icon">
  <link href="home/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="home/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="home/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="home/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="home/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="home/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="home/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="home/assets/css/style.css" rel="stylesheet">
  <style>
        /* Custom styles */
        .input-group .input-group-text .btn-custom {
            margin-right: 22px;
        }

        .btn-custom.active {
            background-color: #007bff;
            color: #fff;
        }
        /* Select the input element within the search bar */
.search-bar input[type="text"] {
  height: 40px; /* Adjust the height as needed */
 max-width: 280px; 
  border: 0.1px solid black;
  padding:10px;
  margin-left:0px;
  border-radius:50px;
  
}
.search-bar button
{
  height:40px;
  width:30px;
  border-radius:20px;
}
.dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      padding: 12px 16px;
      z-index: 1;
      height:270px;
      width:270px;
      margin:40px;
    }
    .dropdown-content label {
      display: block;
      font-size:14px;
      margin-bottom: 5px;
      padding:6px;
    }
    .dropdown-content button{
      width:60px;
     margin-left:30px;
      background:#blue;
    }
    /* You might need to adjust these styles to fit your layout */
.input-group {
  position: relative;
  width: 100%;
}
.box
 {
  width:10%;
  float: left;
 }


.fixed-plugin .fixed-plugin-button {
 margin-left:380px;
}



.form-control {
  padding-left: 10.5em; /* Adjust as needed */
  background-image: url('search.png'); /* Replace with your search icon */
  background-repeat: no-repeat;
  background-size: 1.5em; /* Adjust size as needed */
  background-position: 8px center; /* Adjust position as needed */

}

@media (max-width: 767px) {
    /* Adjust the column classes for mobile view */
    .col-md-6 {
      width: 100%;
      padding-right: 15px; /* Add some spacing between elements */
      padding-left: 15px;
    }
  }
  @media (max-width: 767px) {
    /* Decrease the font size of the dropdown options */
    .form-control1 {
      font-size: 14px; /* Adjust the font size as needed */
    }

    /* Limit the height of the dropdown options */
    .form-control1 option {
      font-size: 10px; /* Match the font size */
      max-height:10px; /* Adjust the max height as needed */
      overflow: hidden;
    }
  }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100" class="toggle-sidebar">
  
<?php
   include_once 'dbConfig.php';
  $shopname = $_COOKIE['username'];
  $smobilenumber = $_COOKIE['mobilenumber'];
  $bidBalanceQuery = "SELECT balance FROM owneraccounts WHERE smobilenumber = '$smobilenumber' AND bid != 0";
    $bidBalanceResult = $conn->query($bidBalanceQuery);
    
    $bidBalances = [];
    
    if ($bidBalanceResult->num_rows > 0) {
        while ($row = $bidBalanceResult->fetch_assoc()) {
            $bidBalances[] = $row['balance'];
        }
    }
    
    // Sum all balances where bid != 0
    $sumBidBalances = array_sum($bidBalances);
  // Query to get total users count and total balance
  $sql = "SELECT COUNT(DISTINCT umobilenumber) AS totalUsers, SUM(totalamount) AS tamount, SUM(credit) AS tcredit FROM owneraccounts  WHERE smobilenumber='$smobilenumber'  GROUP BY smobilenumber";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalUsers = $row["totalUsers"];
    $tamount = $row["tamount"];
    $tcredit = $row['tcredit'];
}
else{
  $totalUsers = 0;
  $tamount = 0;
  $tcredit = 0;
} 
$totalbalance= $tamount-$tcredit +  $sumBidBalances ;
  // Close the database connection
?>

  <div class="min-height-200 bg-primary position-absolute w-100"></div>
  
    
  <main class="main-content position-relative border-radius-lg ">
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="#" class="logo d-flex align-items-center">
    <img src="logo.png" alt="">
    <span class="d-none d-lg-block">Credit Connect</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->



<nav class="header-nav ms-4">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
       
      </a>
    </li><!-- End Search Icon-->
    <?php
include 'dbconfig.php';

$shopname=$_COOKIE['username'];
$smobilenumber=$_COOKIE['mobilenumber'];
$sql3="SELECT count from ownersignup WHERE mobile_number='$smobilenumber'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
while ($row3 = $result3->fetch_assoc()) {
  $count=$row3['count'];
  //echo $count;
echo'<li class="nav-item dropdown">';
     echo' <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">';
       echo' <i class="bi bi-bell"></i>';
       if ($count > 0) {
       echo' <span class="badge bg-primary badge-number">'.$count.'</span>';
       }
     echo' </a><!-- End Notification Icon -->';

     echo' <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications" style="width:320px;">';
      }}     
// Get current date
$currentDate = date("Y-m-d");


// Query to fetch payments due tomorrow for the specific user
$sql = "SELECT SUM(balance) AS total_balance, umobilenumber, username,rdate
    FROM owneraccounts 
    WHERE smobilenumber = '$smobilenumber'
    AND (rdate = CURDATE() OR rdate = DATE_ADD(CURDATE(), INTERVAL 1 DAY) OR rdate = DATE_ADD(CURDATE(), INTERVAL 1 WEEK))
    GROUP BY umobilenumber, username";
$result = $conn->query($sql);
$count = 0;
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $amountDue = $row['total_balance'];
    $username = $row['username'];
    $umobilenumber = $row['umobilenumber'];
    $rdate = $row['rdate'];

    // Calculate the time difference in days
    $diff = strtotime($rdate) - strtotime('today');
    $daysDifference = floor($diff / (60 * 60 * 24));

    // Label the notification based on the days difference
    if ($daysDifference == 0) {
        $timeLabel = ' today';
    } elseif ($daysDifference == 1) {
        $timeLabel = ' tomorrow';
    } elseif ($daysDifference == 7) {
        $timeLabel = 'within a week';
    } else {
        // Handle other cases if needed
        $timeLabel = 'in ' . $daysDifference . ' days';
    }
  if ($amountDue>0){
    // Notification message for the user
    $uniqueIdentifier = uniqid(); 
    $notificationMessage = "$username has to pay $amountDue rupees $timeLabel.";
    $accountsPageLink = "sample2.php?username=$username&mobilenumber=$umobilenumber";
    $updateCountLink = "update_count.php?username=$username&mobilenumber=$umobilenumber"; // New line
  
    $notificationMessage .= ' <a href="' . $accountsPageLink . '">view</a>';
    
   echo '<div class="font" style="font-family:poppins";>';
    echo '<li class="notification-item">';
   
  }


$sql1 = "SELECT imgid, imgname, images FROM usersignup WHERE mobilenumber = '$umobilenumber'";
//echo $sql1;
$result1 = $conn->query($sql1);

if ($result1 === false) {
die("Error executing query: " . $conn->error);
}

// Check if there are rows before trying to fetch data
if ($result1->num_rows > 0) {
$row1 = $result1->fetch_assoc();
$id = $row1['imgid'];
$image = $row1['images'];
$name = $row1['imgname'];
$imageurl = "user_signup&login_page/img/{$image}";
}
// Display notification message
echo '<div class="d-flex align-items-center">';
?>
<img src="<?php if (isset($imageurl)) echo $imageurl; else echo 'boy.png'; ?>" class="rounded-circle" style="width: 30px; height: 30px; margin-right: 10px; font-family:sans-serif;">
<?php
echo '<div>';
echo '<p class="text-dark font-weight-bold text-sm font-italic mt-0">' . $notificationMessage . '</p>';
echo '</div>';
echo '</div>';
echo '</li>';

$count += 1;

}
}
else {
$notificationMessage = "no notifications";
echo '<p class="text-center align-items-center">' . $notificationMessage . '</p>';
}
$sql4="UPDATE ownersignup SET count = '$count' WHERE mobile_number = '$smobilenumber'";  
$conn->query($sql4);
// Close the database connection

?>
        
      
       


      </ul>

    </li>
    <?php
include 'dbconfig.php';
$shopname = $_COOKIE['username'];
$smobilenumber = $_COOKIE['mobilenumber'];
$sql = "SELECT imgid,imgname,images FROM ownersignup WHERE mobile_number = '$smobilenumber'";
$result = $conn->query($sql);

if ($result === false) {
die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$id = $row['imgid'];
$image = $row['images'];
$name = $row['imgname'];
$imageurl = "user_signup&login_page/img/{$image}";
echo '<li class="nav-item dropdown pe-3">';
echo ' <a class="nav-link nav-profile d-flex align-items-center pe-0" href="user_signup&login_page/oprofile.php">';
// echo '  <img src="' . $imageurl . '" alt="Profile" class="rounded-circle">';?>
<img src="<?php if(isset($row['images'])) echo $imageurl; else echo 'boy.png';?>" class="rounded-circle">
<?php echo '<span class="d-none d-md-block dropdown-toggle ps-2"></span>';
echo ' </a><!-- End Profile Iamge Icon -->';
} else {
echo "0 results or error in fetching data";
}

  


// Close the connection
?>


    

      
       

        

        

  
  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">


<?php include('new.php'); ?>
  <main id="main" class="main">
</aside><!-- End Sidebar-->
   
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              </div>
</div>          
        </div>
      </div>
    </nav>
  

    <!-- End Navbar -->
    <div class="container-fluid py-4">
    <div class="row mb-0">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-3 mt-3">
            <div class="card" style="border-radius: 20px;">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Balance Outstanding<br></p>
                                <h5 class="font-weight-bolder mx-3">
                                    <br>
                                    <?php echo '₹' . number_format($totalbalance, 2); ?>
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder"></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <!-- Move the margin styling to the card-body -->
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

      <!--    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
            <div class="card" style="border-radius:20px;">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Our Customers </p>
                      <h5 class="font-weight-bolder">
                      <?php echo $totalUsers; ?>
                      </h5>
                     
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                      <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>-->
              </div>
            </div>
          </div>
          
       
       
      </div>
    
       
        <div class="d-flex align-items-center justify-content-between mb-2">
  <h6 class="mt-0 text-dark text-lg font-weight-bold mb-3 mx-5">Transactions</h6>
 

</div>
<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- Add this line in the head section of your HTML to include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-e6CGZL8Zl+zN2E8U8Z+o4UrKyyegYjyOIdI1TegFqF7IGq5F2q2HJGOiS7FhI5Vx" crossorigin="anonymous">
<div class="container">
  <div class="row align-items-center">
    <div class="col-md-6">
      <div class="search-bar mt-0">
        <!-- Your search bar content goes here -->
      </div>
    </div>
    <div class="col-md-6">
      <div class="d-flex justify-content-between align-items-center mt-0">
        <div class="filter-container">
          <div class="filter-box">
            <div class="filter-dropdown mt-1">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="filterButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-filter"></i> &nbsp;Filter
              </button>
              <div class="dropdown-menu" aria-labelledby="filterButton">
                <a class="dropdown-item" href="#" onclick="selectdata('All')">All</a>
                <a class="dropdown-item" href="#" onclick="selectdata('Zerobalance')">Zero Balance</a>
                <a class="dropdown-item" href="#" onclick="selectdata('Minbalance')">Minimum Balance</a>
                <a class="dropdown-item" href="#" onclick="selectdata('Maxbalance')">Maximum Balance</a>
                <a class="dropdown-item" href="#" onclick="selectdata('regularpay')">Regular Pay Users</a>
                <a class="dropdown-item" href="#" onclick="selectdata('delaypay')">Delay Pay Users</a>
              </div>
            </div>
          </div>
        </div>
        
        <button type="button" class="btn btn-primary ml-2 mt-3 mx-3" data-toggle="modal" data-target="#exampleModal" onclick="addCustomer()">
          <i class="fas fa-plus"></i> &nbsp;Add Customer
        </button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top: 200px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 20px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-secondary px-3" onclick="checkExistingCustomer()">Existing Customer</button>
        <a href="addcustomers.php">
          <button type="button" class="btn btn-primary">New Customer</button>
        </a>
      </div>
      
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<script>
  function checkExistingCustomer() {
    // You can add your logic here to check if the customer is available
    // For demonstration purposes, let's show a simple alert
    alert("Please check if the customer is available in your accounts. If not, add a new customer.");
  }
</script>



<div class="card-bodyy p-3">
        <ul class="list-group">
          <div id="result">
               
        <?php
 include_once 'dbConfig.php';

$shopname = $_COOKIE['username'];
$smobilenumber = $_COOKIE['mobilenumber'];

$sql = "SELECT username, umobilenumber, purchasedate, SUM(balance) AS tbalance 
        FROM owneraccounts 
        WHERE smobilenumber ='$smobilenumber'
        GROUP BY umobilenumber ORDER BY id DESc";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['query']) && !empty($_POST['query'])) {
        $searchKeyword = $_POST['query'];
        $sql = "SELECT username, umobilenumber, purchasedate, SUM(balance) AS tbalance 
                FROM owneraccounts 
                WHERE smobilenumber ='$smobilenumber' AND username = '$searchKeyword' 
                GROUP BY umobilenumber ORDER BY id DESC";
    } elseif (isset($_POST['cat_name'])) {
        $catname = $_POST['cat_name'];

        switch ($catname) {
            case 'Zerobalance':
                $sql = "SELECT username, umobilenumber, SUM(balance) AS tbalance 
                        FROM owneraccounts 
                        WHERE balance = 0 
                        GROUP BY umobilenumber";
                break;
            case 'Minbalance':
                $sql = "SELECT username, umobilenumber, SUM(balance) AS tbalance 
                        FROM owneraccounts 
                        GROUP BY umobilenumber 
                        ORDER BY tbalance ASC";
                break;
            case 'Maxbalance':
                $sql = "SELECT username, umobilenumber, SUM(balance) AS tbalance 
                        FROM owneraccounts 
                        GROUP BY umobilenumber 
                        ORDER BY tbalance DESC";
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


<br>
<br>
              </ul>
            </div>
          </div>
        </div>
      </div>
</div>
    </div>
</div>

    </main>
    <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
      $('.btn-custom').on('click', function () {
            $('.btn-custom').removeClass('active'); // Remove active class from all buttons
            $(this).addClass('active'); // Add active class to the clicked button
        });
        function showdata() {
            $.ajax({
                url: 'show-datasample.php',
                method: 'GET', // Change this to 'POST' if necessary
                success: function(result) {
                    $("#result").html(result);
                }
            });
        }

        function selectdata(filter) {
    var filter_search = $('#filter_search').val();
    console.log('Filter Search:', filter_search);

    $.ajax({
        url: 'show-datasample.php',
        method: 'POST',
        data: { cat_name: filter },
        success: function(result) {
            $("#result").html(result);
        },
        error: function(error) {
            console.error('Ajax request error:', error);
        }
    });
}


        $(document).ready(function () {
            // Toggle sidebar on button click
            $('.toggle-sidebar-btn').on('click', function () {
                $('body').toggleClass('toggle-sidebar');
            });

            // Add scroll header functionality
            function scrollHeader() {
                const header = document.getElementById('header');
                // When the scroll is greater than 80 viewport height, add the scroll-header class to the header tag
                if (window.scrollY >= 80) header.classList.add('scroll-header');
                else header.classList.remove('scroll-header');
            }

            window.addEventListener('scroll', scrollHeader);
        });
    </script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<style>
        :root {
          --header-height: 3.7rem;
        
         
          --hue: 174;
          --sat: 63%;
          --first-color: hsl(var(--hue), var(--sat), 40%);
          --first-color-alt: hsl(var(--hue), var(--sat), 36%);
          --title-color: hsl(var(--hue), 12%, 15%);
          --text-color: hsl(var(--hue), 8%, 35%);
          --body-color: hsl(var(--hue), 100%, 99%);
          --container-color: #FFF;
        
         
          --body-font: 'Open Sans', sans-serif;
          --h1-font-size: 1.5rem;
          --normal-font-size: .938rem;
          --tiny-font-size: .775rem;
        
         
          --z-tooltip: 10;
          --z-fixed: 100;
        }
        
        @media screen and (min-width: 968px) {
          :root {
            --h1-font-size: 2.85rem;
            --normal-font-size: 1.6rem;
          }
        }
        
      
        * {
          box-sizing: border-box;
          padding: 0;
          margin: 0;
        }
        
        html {
          scroll-behavior: smooth;
        }
        
        body {
          margin: var(--header-height) 0 0 0;
          font-family: var(--body-font);
          font-size: var(--normal-font-size);
          background-color: var(--body-color);
          color: var(--text-color);
        }
        
        ul {
          list-style: none;
        }
        
        a {
          text-decoration: none;
        }
        
        img {
          max-width: 100%;
          height: auto;
        }
        
      
        .section {
          padding: 2.2rem 0 2rem;
        }
        
        .section__title {
          font-size: var(--h1-font-size);
          color: var(--title-color);
          text-align: center;
          margin-bottom: 1.5rem;
        }
        
        .section__height {
          height: 100vh;
        }
        
       
        .container {
          max-width: 968px;
          margin-left: 1rem;
          margin-right: 1rem;
        }
        
     
        .header {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          background-color: var(--container-color);
          z-index: var(--z-fixed);
          transition: .4s;
        }
        
       
        .nav {
          height: var(--header-height);
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
        
        .nav__img {
          width: 32px;
          border-radius: 50%;
        }
        
        .nav__logo {
          color: var(--title-color);
          font-weight: 600;
        }
        
        @media screen and (max-width: 767px) {
          .nav__menu {
            position: fixed;
            bottom: 0;
            left: 0;
            background-color: var(--container-color);
            box-shadow: 0 -1px 12px hsla(var(--hue), var(--sat), 15%, 0.15);
            width: 100%;
            height: 4rem;
            padding: 1rem 1rem;
            padding-top:1rem;
            display: grid;
            align-content: center;
            border-radius: 1.25rem 1.25rem 0 0;
            transition: .4s;
          }
        }
        
        .nav__list, 
        .nav__link {
          display: flex;
        }
        
        .nav__link {
          flex-direction: column;
          align-items: center;
          row-gap: 4px;
          color: var(--title-color);
          font-weight: 600;
        }
        
        .nav__list {
          justify-content: space-around;
        }
        
        .nav__name {
          font-size: var(--tiny-font-size);
          /* display: none;/ / Minimalist design, hidden labels */
        }
        
        .nav__icon {
          font-size: 1.7rem;
        }
        
        
        .active-link {
          position: relative;
          color: #004aad;
          transition: .3s;
        }
        .scroll-header {
          box-shadow: 0 1px 12px hsla(var(--hue), var(--sat), 15%, 0.15);
        }
       
        @media screen and (max-width: 320px) {
          .nav__name {
            display: none;
          }
        }
        
        /* For medium devices */
        @media screen and (min-width: 576px) {
          .nav__list {
            justify-content: center;
            column-gap: 3rem;
          }
        }
        
        @media screen and (min-width: 767px) {
          body {
            margin: 0;
          }
          .section {
            padding: 7rem 0 2rem;
          }
          .nav {
            height: calc(var(--header-height) + 1.5rem); /* 4.5rem */
          }
          .nav__img {
            display: none;
          }
          .nav__icon {
            display: none;
          }
          .nav__name {
            font-size: var(--normal-font-size);
            /* display: block; / / Minimalist design, visible labels */
          }
          .nav__link:hover {
            color: var(--first-color);
          }
        
          /* First design, remove if you choose the minimalist design */
          .active-link::before {
            content: '';
            position: absolute;
            bottom: -.75rem;
            width: 4px;
            height: 4px;
            background-color: var(--first-color);
            border-radius: 50%;
          }
        
        }
        
        /* For large devices */
        @media screen and (min-width: 1024px) {
          .container {
            margin-left: auto;
            margin-right: auto;
          }
        }
        .active-link .nav__icon {
  color: #004aad;
}
    </style>       

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="home.php" class="nav__link active-link">
                                <i class='bx bx-home-alt nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="sample1.php" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Accounts</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="search.php" class="nav__link">
                                <i class='bx bx-search-alt nav__icon'></i>
                                <span class="nav__name">Search</span>
                            </a>
                        </li>

                        <li class="nav__item">
                            <a href="user_signup&login_page/index3.php" class="nav__link">
                                <i class=''>
                               
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 21q-3.45 0-6.012-2.287T3.05 13H5.1q.35 2.6 2.313 4.3T12 19q2.925 0 4.963-2.037T19 12q0-2.925-2.037-4.962T12 5q-1.725 0-3.225.8T6.25 8H9v2H3V4h2v2.35q1.275-1.6 3.113-2.475T12 3q1.875 0 3.513.713t2.85 1.924q1.212 1.213 1.925 2.85T21 12q0 1.875-.712 3.513t-1.925 2.85q-1.213 1.212-2.85 1.925T12 21m2.8-4.8L11 12.4V7h2v4.6l3.2 3.2z"></path></svg></i>
                                <span class="nav__name">History</span>
                            </a>
                        </li>

                       
                    </ul>
                </div>

                <img src="assets/img/perfil.png" alt="" class="nav__img">
        
        <script>
  const filterIcon = document.getElementById('filterIcon');
  const dropdownMenu = document.getElementById('dropdownMenu');

  filterIcon.addEventListener('click', function() {
    if (dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '') {
      dropdownMenu.style.display = 'block';
    } else {
      dropdownMenu.style.display = 'none';
    }
  });

  // Close the dropdown if the user clicks outside of it
  window.addEventListener('click', function(event) {
    if (!event.target.matches('#filterIcon')) {
      dropdownMenu.style.display = 'none';
    }
  });

          
             const sections = document.querySelectorAll('section[id]')

         function scrollActive(){
    const scrollY = window.pageYOffset

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight,
            sectionTop = current.offsetTop - 50,
            sectionId = current.getAttribute('id')

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active-link')
        }else{
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)


function scrollHeader(){
    const header = document.getElementById('header')
    // When the scroll is greater than 80 viewport height, add the scroll-header class to the header tag
    if(this.scrollY >= 80) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)
        </script>   
    </body>
</html>