<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="home/assets/img/favicon.png" rel="icon">
  <link href="home/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
  *{
    font-family: sans-serif;
  }
  .sidebar .sidebar-nav span{
    font-size:18px;
    font-weight:200;
  }
 
  </style>
  </head>

<body>

  <!-- ======= Header ======= -->
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
$conn->close();
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
$conn->close();
?>


        

          
           

            

            

      
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="bi bi-house"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="search.php">
          <i class="bi bi-search"></i><span>Search</span>
        </a>
             
      <li class="nav-item">
        <a class="nav-link collapsed" href="sample1.php">
          <i class="bi bi-journal-text"></i><span>Accounts</span>
          </a>
      <li class="nav-item">
        <a class="nav-link collapsed" href="addcustomers.php">
            <i class="bi bi-person"></i><span>Add Customers</span>
            </a>
        
      <li class="nav-item">
        <a class="nav-link collapsed" href="user_signup&login_page/index3.php">
          <i class="bi bi-clock"></i><span>Transaction History</span>
        </a>
      
     
        
      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-person"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
  <?php
include 'dbconfig.php';
$shopname = $_COOKIE['username'];
$smobilenumber = $_COOKIE['mobilenumber'];

// Query to get total users count, total balance, total amount, total credit, and total balance
$sql = "SELECT
            umobilenumber,
            COUNT(DISTINCT umobilenumber) AS totalUsers,
            SUM(balance) AS tbalance,
            SUM(totalamount) AS tamount,
            SUM(credit) AS tcredit,
            CASE WHEN MAX(bid) != 0 THEN MAX(balance) ELSE 0 END AS bidBalance
        FROM owneraccounts  
        WHERE smobilenumber = '$smobilenumber'  
        GROUP BY smobilenumber";

$result = $conn->query($sql);
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
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalUsers = $row["totalUsers"];
    $tbalance = $row["tbalance"];
    $tamount = $row["tamount"];
    $tcredit = $row["tcredit"];
    $bidBalance = $row["bidBalance"];
    
    // Calculate totalBalance as tamount - tcredit - bidBalance
    $totalBalance = $tamount - $tcredit + $sumBidBalances ;
} else {
    $totalUsers = 0;
    $tbalance = 0;
    $tamount = 0;
    $tcredit = 0;
    $bidBalance = 0;
    $totalBalance = 0;
}

// Close the database connection
$conn->close();
?>


    <div class="pagetitle">
      <h1>Credit Connect</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard pb-0">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-6">
          <div class="card info-card sales-card" style="height: 90%;">

            <div class="card-body">
              <h5 class="card-title">Total Customers<span></span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-xxl">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-1">
                  <h6><?php echo $totalUsers; ?></h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-6">
          <div class="card info-card revenue-card" style="height: 90%;">

            <div class="filter">
              <!--- <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
              </ul>-->
            </div>

            <div class="card-body">
              <h5 class="card-title">Total Bill Amount<span></span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center text-xxl">
                  <i class="bi bi-currency-rupee"></i>
                </div>
                <div class="ps-1">
                  <h6><?php echo  number_format($tcredit, 2) ; ?></h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                 <!--- <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                   
                  </ul>-->
                </div>

                <div class="card-body">
                  <h5 class="card-title">Balance Outstanding<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-rupee"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php echo  number_format($totalBalance, 2) ; ?></h6>
                     
                      
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                

                <div class="card-body">
                  <h5 class="card-title">Reports <span></span></h5>
                  <?php
include 'dbconfig.php';

$sql = "SELECT 
            WEEK(purchasedate) AS week,
            SUM(credit) AS total_credit,
            SUM(totalamount) AS total_debit,
            SUM(balance) AS total_balance 
        FROM owneraccounts 
        WHERE smobilenumber = '$smobilenumber'
        GROUP BY WEEK(purchasedate), smobilenumber";

$result = $conn->query($sql);

$weeks = [];
$creditData = [];
$debitData = [];
$balanceData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $weeks[] = "Week " . $row["week"];
        $creditData[] = $row["total_credit"];
        $debitData[] = $row["total_debit"];
        $balanceData[] = $row["total_balance"];
    }

    $reportAvailable = true;
} else {
    $reportAvailable = false;
}

$weeksJSON = json_encode($weeks);
$creditDataJSON = json_encode($creditData);
$debitDataJSON = json_encode($debitData);
$balanceDataJSON = json_encode($balanceData);
?>

<!-- Line Chart -->
<div id="reportsChart"></div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    <?php if ($reportAvailable): ?>
        // Sample data for all weeks (replace this with your actual data)
        const creditData = <?php echo $creditDataJSON; ?>;
        const debitData = <?php echo $debitDataJSON; ?>;
        const balanceData = <?php echo $balanceDataJSON; ?>;
        const weekCategories = <?php echo json_encode($weeks); ?>;
        console.log(creditData);
console.log(debitData);
console.log(balanceData);
console.log(weekCategories);
        new ApexCharts(document.querySelector("#reportsChart"), {
            series: [
                { name: 'Payment Amount', data: creditData },
                { name: 'Bill Amount', data: debitData },
                { name: 'Balance Amount', data: balanceData }
            ],
            chart: {
                height: 350,
                type: 'area',
                toolbar: { show: false },
            },
            markers: { size: 4 },
            colors: ['#2eca6a', '#4154f1', '#ff0000'],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,  
                    opacityTo: 0.4,
                    stops: [0, 90, 100]
                }
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth', width: 2 },
            xaxis: { type: 'category', categories: weekCategories },
            yaxis: { labels: { formatter: (val) => "₹" + val } },
            tooltip: { x: { format: 'dd/MM/yy' } },
        }).render();
    <?php else: ?>
        // Display message when no data is available
        document.querySelector("#reportsChart").innerHTML = "<p>No customers and balance report yet.</p>";
    <?php endif; ?>
});

</script>
<script>
$(document).ready(function() {
    // ... (previous code)

    // Handle click on "View Accounts" link
    $('.view-accounts-link').click(function(e) {
        e.preventDefault();

        // Get the update count link from the data attribute
        var updateCountLink = $(this).data('update-count-link');

        // Use AJAX to update the count in the database
        $.ajax({
            type: 'GET', // Change to GET method
            url: updateCountLink, // Use the update count link
            success: function(response) {
                // Handle the response if needed
                console.log(response);

                // Redirect to the accounts page
                window.location.href = $(e.target).attr('href');
            },
            error: function(error) {
                // Handle errors if needed
                console.log(error);
            }
        });
    });

    // ... (rest of the code)
});
</script>



                </div>

              </div>
            </div><!-- End Reports -->
<br><br>
            <!-- Recent Sales -->
            
  <!-- Vendor JS Files -->
  <script src="home/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="home/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="home/assets/vendor/echarts/echarts.min.js"></script>
  <script src="home/assets/vendor/quill/quill.min.js"></script>
  <script src="home/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="home/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="ahome/ssets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="home/assets/js/main.js"></script>



       
        
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
        <!--=============== MAIN JS ===============-->
        <script>
          
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