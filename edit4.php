
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
  <style>
    button {
  margin-left: 0%;
  margin-top: 2%;
  border-radius: 50% !important;
  background-color: white;
  color: black;
  border: none !important;
  padding: 30px 30px !important;
  -webkit-transition: background-color 1s, color 1s, -webkit-transform 0.5s;
     transition: background-color 1s, transform 0.5s;
}

button:hover {
  background-color: white;
  color: black;
  -webkit-transform: translateX(-5px);
  -webkit-box-shadow: 5px 0px 18px 0px rgba(105,105,105,0.8);
  -moz-box-shadow: 5px 0px 18px 0px rgba(105,105,105,0.8);
  box-shadow: 5px 0px 18px 0px rgba(105,105,105,0.8);
}
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
<?php
include_once 'config.php';
// Retrieve user information from cookies

// Retrieve transaction details from the GET parameters
$shopname = isset($_GET['shopname']) ? htmlspecialchars($_GET['shopname']) : '';
$smobilenumber = isset($_GET['smobilenumber']) ? htmlspecialchars($_GET['smobilenumber']) : '';
$credit = isset($_GET['credit']) ? floatval($_GET['credit']) : 0;
$debit = isset($_GET['debit']) ? floatval($_GET['debit']) : 0;
$balance = isset($_GET['balance']) ? floatval($_GET['balance']) : 0;
$itemscount = isset($_GET['itemscount']) ? intval($_GET['itemscount']) : 0;
$notes = isset($_GET['notes']) ? htmlspecialchars($_GET['notes']) : '';


$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$umobilenumber = isset($_COOKIE['umobilenumber']) ? $_COOKIE['umobilenumber'] : '';

// Calculate total balance for the user in the specific shop
$sql = "SELECT SUM(balance) AS totalBalance,SUM(credit) AS totalcredit, SUM(totalamount) AS tamount
        FROM owneraccounts
        WHERE umobilenumber = '$umobilenumber' AND smobilenumber = '$smobilenumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalBalance = $row["totalBalance"];
    $totalcredit = $row["totalcredit"];
    $tamount = $row["tamount"];
} else {
    $totalBalance = 0;
}

// Close the database connection
$conn->close();

// Creating the form with sanitized values
echo '<form action="edit2.php?shopname='.urlencode($shopname).'&smobilenumber='.urlencode($smobilenumber).'&credit='.urlencode($tamount).'&debit='.urlencode($totalcredit).'&balance='.urlencode($totalBalance).'&itemscount='.urlencode($itemscount).'" method="post" onsubmit="return validateForm()">';
?>
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
           
  <span class="mask bg-primary opacity-6"></span>
  </div>
  
 
  <div class="main-content position-relative max-height-vh-100 h-100">
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2 mt-n11">
      
        
    </nav>
    <i class="fa fa-arrow-left fa-1x text-white mx-3 mt-4" onclick="goBack()"></i> 
    <!-- End Navbar -->
    <div class="card shadow-lg mx-4 card-profile-bottom mt-9">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="blue.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <?php
         echo' <div class="col-auto my-auto">';
            echo'<div class="h-100">';
             echo' <h5 class="mb-1">
               '.$shopname.'
              </h5>';
              echo'<p class="mb-0 font-weight-bold text-sm">
             '. $smobilenumber.'
              </p>';
            echo'</div>';
          echo'</div>';
          ?>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                  
              </div>
            </div>
            <div class="card-body">
              
              <div class="row">
                <div class="col-md-6">
               

                <div class="col-md-6">
                  <!--<div class="form-group">-->
                    
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($shopname); ?>">
 <!-- </div>-->
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    
                    <input type="hidden" name="mobilenumber" value="<?php echo htmlspecialchars($smobilenumber); ?>">
  </div>
                </div>
                <div class="col-md-6">
 

              </div>
              <div class="col-md-6">
  <div class="form-group">
    <label for="example-text-input" class="form-control-label text-sm">Remainder Date</label>
    
      <div class="input-group-append">
        <select class="form-control" id="rdateOption" name="rdateOption">
          <option value="weekly">Weekly</option>
          <option value="monthly">Monthly</option>
          <option value="on_day">On Day</option>
        </select>
      </div>
    </div>
  </div>
</div>

            
            <div class="form-group"></div>
            </div> 
          </div>
             <br>
             <div class="input-group-append text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
          </div>
        </div>
        </div>
    </div>
  </div>
  
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
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

    function calculateBalanceOnLoad() {
        const totalAmount = parseFloat(document.getElementById('totalamount').value);
        const credit = parseFloat(document.getElementById('credit').value);
        const balanceInput = document.getElementById('balance');

        if (!isNaN(totalAmount) && !isNaN(credit)) {
            const calculatedBalance = totalAmount - credit;
            balanceInput.value = isNaN(calculatedBalance) ? '' : calculatedBalance;
        }
    }

    // Call the function when the page loads
    window.onload = calculateBalanceOnLoad;
</script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</form>
</body>

</html>