
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Accounts
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <style>
        /* Custom styles */
        .input-group .input-group-text .btn-custom {
            margin-right: 22px;
        }

        .btn-custom.active {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
<?php
 include_once 'dbConfig.php';
$uusername = $_GET['username'];
$mobilenumber = $_GET['mobilenumber'];
$totalcredit = 0;
$totalBalance = 0;


if ($username !== null) {
    $conn = new mysqli($servername, $username, $password, $dbname);

    

    $sql = "SELECT SUM(credit) AS totalcredit, SUM(balance) AS totalBalance, umobilenumber 
            FROM owneraccounts 
            WHERE username = '" . $uusername . "'"; // Using $_COOKIE directly, can be a vulnerability

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalcredit = $row["totalcredit"];
        $totalBalance = $row["totalBalance"];
        $mobilenumber = $row["umobilenumber"];
    } else {
        $totalcredit = 0;
        $totalBalance = 0;
    }

    $conn->close();
}
?>

<!-- Rest of your HTML/PHP code remains unchanged -->


  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
     
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <div class="card-body text-center p-3 w-100 pt-0">
         
        </div>

      </div>
     </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            </ol>
            <h6 class="text-center font-weight-bolder text-white mb-0 d-flex align-items-center justify-content-center">
    <i class="fa fa-address-book-o mt-1 mr-2" aria-hidden="true" style="font-size: 30px;"></i>
    <span><?php echo $uusername . '<br>&nbsp;&nbsp;&nbsp;' . $mobilenumber; ?></span>
</h6>



        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                
              </a>
            </li>
            
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-phone" aria-hidden="true" style="color: white; font-size:20px;"></i><!-- Added style for color -->
              
              </a>
            </li>
            
            
             
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Running Balance</p>
                      <h5 class="font-weight-bolder">
                      <?php echo '$' . number_format($totalBalance, 2); ?>
                      </h5>
                      <p class="mb-0">
                        <span class="text-success text-sm font-weight-bolder"></span>
                      </p>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Credit Amount</p>
                      <h5 class="font-weight-bolder">
                      <?php echo  '$' . number_format($totalcredit, 2);?>
                      </h5>
                     
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                      <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
       
      </div>
     


      <div class="row mt-4">
  <div class="col-lg-5">
    <div class="card">
      <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between align-items-center">
         
          <div class="input-group">
            <span class="input-group-text"> <div class="container mt-4">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <a href='?filter=all&username=<?php echo $uusername; ?>&mobilenumber=<?php echo $mobilenumber; ?>' class="btn btn-custom">All</a>
    <a href='?filter=due_today&username=<?php echo $uusername; ?>&mobilenumber=<?php echo $mobilenumber; ?>' class="btn btn-custom">Due Today</a>
    <a href='?filter=no_due&username=<?php echo $uusername; ?>&mobilenumber=<?php echo $mobilenumber; ?>' class="btn btn-custom">No Due</a>
</div>
    </div>
    <i class="fa fa-filter" aria-hidden="true"></i>
</span>
            
  </div>
          
        </div>
        <h6 class="mb-0"><br></h6>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
        <?php
// PHP code to fetch usernames from the database and display in the card
include_once 'dbConfig.php';
$uusername = $_GET['username'];
$mobilenumber =$_GET['mobilenumber'];


$totalcredit = 0;
$totalBalance = 0;

if ($uusername !== null) {
$conn = new mysqli($servername, $username, $password, $dbname);



// Default SQL query to fetch all customers
$sql = "SELECT purchasedate,credit,balance FROM owneraccounts where username ='" . $uusername . "'";
$filter = "";

// Check which button is clicked and modify the SQL query accordingly
if (isset($_GET['filter'])) {
    $filterType = $_GET['filter'];
    
    if ($filterType === 'due_today') {
        $filter = "AND balance > 0";
    } elseif ($filterType === 'no_due') {
        $filter = " AND balance = 0";
    }
}

$sql .= $filter;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
      echo '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">';
      echo '<div class="d-flex align-items-center">';
      echo '<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center"></div>';
      echo '<div class="d-flex flex-column">';
      echo '<h6 class="mb-1 text-dark text-sm">' . $row["purchasedate"] . '</h6>';
      echo '<h1 class="text-sm">Debit  &nbsp;&nbsp;' . $row["balance"] . '&nbsp;&nbsp;&nbsp;Credit  &nbsp;&nbsp;' . $row["credit"] . ' <span class="font-weight-bold"></span></h1>';
      echo '</div></div>';
      echo '<div class="d-flex"><a href="pages/shower.php?username=' . $uusername . '&mobilenumber=' . $mobilenumber . '">';
      echo '<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">';
      echo '<i class="fa fa-eye" aria-hidden="true" style="font-size: 20px;"></i>';
      echo '</button></a></div>';
  }
  
} else {
    echo "0 results";
}
$conn->close();
}
?>

              </ul>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </main>
  <?php
  echo'<div class="fixed-plugin">';
    echo'<a class="fixed-plugin-button text-dark position-fixed px-3 py-2" href="pages/inneruser.php?username=' . $uusername . '&mobilenumber=' . $mobilenumber . '" >';
       echo' <i class="fa fa-plus" aria-hidden="true"></i>';
   echo' </a>';
echo'</div>';
?>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Add click event listener to buttons
        $('.btn-custom').on('click', function () {
            $('.btn-custom').removeClass('active'); // Remove active class from all buttons
            $(this).addClass('active'); // Add active class to the clicked button
        });
    </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</body>

</html>