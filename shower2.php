<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    user
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      
    </div>
    
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
         
            <div class="container-fluid py-4 d-flex justify-content-center align-items-center">
                <div class="row">
                  <div class="col-lg-8">
                  
                  </div>
                </div>
              </div>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
           
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
             
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                     
                      <div class="d-flex flex-column justify-content-center">
              
                       
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      
                      <div class="d-flex flex-column justify-content-center">
                       
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                     
                      <div class="d-flex flex-column justify-content-center">
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-xl-6 mb-xl-0 mb-4">
            <h6 class="font-weight-bolder text-white mb-0 text-lg text-center">Tracker</h6>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                   
                   
                  </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                  <div class="card">
                    
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4">
             
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          
        </div>
      </div>
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0" text-center>Purchase Information</h6>
            </div>
            <?php
 include_once 'dbConfig.php';
$username = $_GET['shopname'];
$mobilenumber = $_GET['mobilenumber'];
$purchasedate = $_GET['date'];
$itemscount = $_GET['itemscount'];
$credit = $_GET['totalamount'];
$debit = $_GET['credit'];
$balance = $_GET['balance'];
$sql = "SELECT * FROM owneraccounts 
WHERE smobilenumber='$mobilenumber' LIMIT 1";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Display user details
            echo '<div class="card-body pt-4 p-3">';
                echo'  <ul class="list-group">';
                   echo' <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">';
                      echo'<div class="d-flex flex-column">';
                       
                        echo "<h6 class='mb-3 text-center text-lg'>&nbsp;&nbsp;Shop Name&nbsp;" .$row['shopname']. "</h6>";
            echo "<h6 class='mb-2 text-sm'>Shop Mobilenumber: <span class='text-dark font-weight-bold ms-sm-2'>" .$row['smobilenumber']. "</span></h6>";
            echo "<h6 class='mb-2 text-sm'>Total Amount: <span class='text-dark ms-sm-2 font-weight-bold'>" .$credit. "</span></h6>";
            echo "<h6 class='mb-2 text-sm'>Debit Amount: <span class='text-dark ms-sm-2 font-weight-bold'>" .$debit. "</span></h6>";
            echo "<h6 class='mb-2 text-sm'>Balance Amount: <span class='text-dark ms-sm-2 font-weight-bold'>" .$balance. "</span></h6>";
            echo "<h6 class='mb-2 text-sm'>Items Count: <span class='text-dark ms-sm-2 font-weight-bold'>" .$itemscount. "</span></h6>";
            echo "<h6 class='mb-2 text-sm'>Purchase Date: <span class='text-dark ms-sm-2 font-weight-bold'>" .$purchasedate. "</span></h6>";
            echo "<h6 class='mb-2 text-sm'>Credit Date: <span class='text-dark ms-sm-2 font-weight-bold'>" .$row['creditdate']. "</span></h6>";
         
            if (!empty($row['notes'])) {
              echo "<h6 class='text-xs'>Notes: <span class='text-dark ms-sm-2 font-weight-bold'>" . $row['notes'] . "</span></h6>";
          }
            // echo' <div class="ms-auto text-end">';
                       // echo' <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="edit.php?username='.$row['username'].'&mobilenumber='.$row['umobilenumber'].'&credit='.$credit.'&debit='.$debit.'&balance ='.$balance.'&itemscount='.$itemscount.'&notes='.$row['notes'].'"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>';
                 // echo'</div>';
                echo'</li>';
             echo' </ul>';
           echo' </div>';
        }
    } else {
        echo "0 results";
    }

$conn->close();
?>

          </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="card-body pt-4 p-3">
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
  <div class="fixed-plugin">
   
    <div class="card shadow-lg">
     
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        
        <!-- Sidenav Type -->
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>