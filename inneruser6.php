
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

<body class="g-sidenav-show bg-gray-100">
  <?php
  // Inneruser.php
$uusername = $_GET['username'];
$mobilenumber = $_GET['mobilenumber'];
echo '<form action="inneruseradd6.php?username=' . urlencode($uusername) . '&mobilenumber=' . urlencode($mobilenumber) . '" method="post" onsubmit="return validateForm()">';
?>



  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
    
  </div>
  
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
   
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2 mt-n11">
      <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
         
        </nav>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
         
          </div>
         
        </div>
      </div>
    </nav>
    <i class="fa fa-arrow-left fa-1x mt-4 mx-3 text-white" onclick="goBack()"></i>
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
         $uusername = $_GET['username'];
         $mobilenumber = $_GET['mobilenumber'];
         echo' <div class="col-auto my-auto">';
            echo'<div class="h-100">';
             echo' <h5 class="mb-1">
               '.$uusername.'
              </h5>';
              echo'<p class="mb-0 font-weight-bold text-sm">
             '. $mobilenumber.'
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
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label text-sm">Amount Paid</label>
                    <input class="form-control"autocomplete="off" type="number" id="totalamount" value="$" name="credit">                </div>
                </div>
               <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label text-sm"> Debit Amount</label>
                    <input class="form-control" type="number" id="credit" value="$" name="credit">                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">-->
                    
                    <input type="hidden" name="username" value="<?php echo htmlspecialchars($uusername); ?>">
 <!-- </div>-->
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    
                    <input type="hidden" name="mobilenumber" value="<?php echo htmlspecialchars($mobilenumber); ?>">
  </div>
                </div>
              
            <div class="form-group"></div>
            </div> 
          </div>
             <br>
              <div class="text-center">
              <button class="btn btn-primary btn-sm ms-auto" type="submit">Submit</button>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>
  
  <script>
    function goBack() {
      var customURL = "sample1.php"; // Replace with your desired URL
        window.location.href = customURL;
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
  function calculateBalance() {
    const totalAmount = parseFloat(document.getElementById('totalamount').value);
    const credit = parseFloat(document.getElementById('credit').value);
    const balanceInput = document.getElementById('balance');

    if (!isNaN(totalAmount) && !isNaN(credit)) {
      const calculatedBalance = totalAmount - credit;
      balanceInput.value = isNaN(calculatedBalance) ? '' : calculatedBalance;
    }
  }
</script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  
</form>
</body>

</html>