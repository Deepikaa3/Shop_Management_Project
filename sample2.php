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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  
  <style>
        /* Custom styles */
        .input-group .input-group-text .btn-custom {
            margin-right: 22px;
        }

        .btn-custom.active {
            background-color: #007bff;
            color: #fff;
        }
        .dashboard .top-selling {
  font-size: 14px;
}

.dashboard .top-selling .table thead {
  background: #f6f6fe;
}

.dashboard .top-selling .table thead th {
  border: 0;
}

.dashboard .top-selling .table tbody td {
  vertical-align: middle;
}

.dashboard .top-selling img {
  border-radius: 5px;
  max-width: 60px;
}
  
.card {
      max-width: 400px;
      margin: auto;
    }

    #myModal {
      display: none;
      position: fixed;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%) translateY(100%);
      transition: transform 0.3s ease-out;
    
    }

    #myModal.show {
      transform: translateX(-50%) translateY(30%);
    }
    .form-group{
        font-size: 20px;
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

<body class="g-sidenav-show   bg-gray-100 m-0">
<?php
session_start();
include_once 'dbConfig.php';
$totalcredit = 0;
$totalBalance = 0;
$clickedUsername = isset($_GET['username']) ? $_GET['username'] : null;
$mobilenumber = isset($_GET['mobilenumber']) ? $_GET['mobilenumber'] : null;
$shopname=$_COOKIE['username'];
$smobilenumber=$_COOKIE['mobilenumber'];

if ($clickedUsername !== null) {
    $conn = new mysqli($servername, $username, $password, $dbname);


    /*$sql = "SELECT SUM(balance) AS totalbalance,SUM(totalamount) AS tamount, SUM(credit) AS tcredit, balance, umobilenumber 
            FROM owneraccounts 
            WHERE umobilenumber =$mobilenumber AND smobilenumber = '$smobilenumber'"; // Using $_COOKIE directly, can be a vulnerability
*/
$bidBalanceQuery = "SELECT balance FROM owneraccounts WHERE smobilenumber = '$smobilenumber' AND umobilenumber = '$mobilenumber' AND bid != 0";
$bidBalanceResult = $conn->query($bidBalanceQuery);

$bidBalances = [];

if ($bidBalanceResult->num_rows > 0) {
    while ($row = $bidBalanceResult->fetch_assoc()) {
        $bidBalances[] = $row['balance'];
    }
}

// Sum all balances where bid != 0
$sumBidBalances = array_sum($bidBalances);

$sql = "SELECT
            umobilenumber,
            COUNT(DISTINCT umobilenumber) AS totalUsers,
            SUM(balance) AS tbalance,
            SUM(totalamount) AS tamount,
            SUM(credit) AS tcredit,
            CASE WHEN MAX(bid) != 0 THEN MAX(balance) ELSE 0 END AS bidBalance
        FROM owneraccounts  
        WHERE smobilenumber = '$smobilenumber' AND umobilenumber='$mobilenumber' 
        ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $totalUsers = $row["totalUsers"];
      $tbalance = $row["tbalance"];
      $tamount = $row["tamount"];
      $tcredit = $row["tcredit"];
      $bidBalance = $row["bidBalance"];
      
      // Calculate totalBalance as tamount - tcredit - bidBalance
      $totalBalance = $tamount - $tcredit + $sumBidBalances;
     // echo $totalBalance;
  } else {
      $totalUsers = 0;
      $tbalance = 0;
      $tamount = 0;
      $tcredit = 0;
     // $bidBalance = 0;
     // $totalBalance = 0;
  }
}
?>
<div class="row">
  <div class="col-md-12">
   
  </div>
</div>
<div class="min-height-200 bg-primary position-absolute w-100"></div>
   
  
   
  <main class="main-content position-relative border-radius-lg ">
    
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <i class="fa fa-arrow-left fa-1x text-white" onclick="goBack()"></i> 
    <div class="container-fluid px-3">
        <nav aria-label="breadcrumb">
       
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            </ol>
            <?php
 include_once 'dbConfig.php';

$shopname = $_COOKIE['username'];
$smobilenumber = $_COOKIE['mobilenumber'];
$rdate = isset($_GET['rdate']) ? $_GET['rdate'] : null;
$sql = "SELECT username, umobilenumber, purchasedate, SUM(balance) AS tbalance 
        FROM owneraccounts 
        WHERE smobilenumber ='$smobilenumber'
        GROUP BY umobilenumber";
            $result = $conn->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $umobilenumber = isset($_GET['mobilenumber']) ? $_GET['mobilenumber'] : null;
                      $username = $row["username"];
                      $sql3 = "SELECT * FROM usersignup WHERE mobilenumber ='$umobilenumber'";
            $result3 = $conn->query($sql3);
            $sql2 = "SELECT usersignup.images from usersignup JOIN owneraccounts ON usersignup.mobilenumber = owneraccounts.umobilenumber WHERE owneraccounts.umobilenumber ='$umobilenumber' AND owneraccounts.smobilenumber ='$smobilenumber' LIMIT 1";
            $result1 = $conn->query($sql2);
            $row1 = $result1->fetch_assoc();
            if($result1->num_rows>0)
               {
                $row3 = $result3->fetch_assoc();
               // $id = $row1['imgid'];
                $img = $row1['images'];
               // $name = $row1['imgname'];
               }}
              //<i class="fa fa-address-book-o mt-1 mr-2" aria-hidden="true" style="font-size: 30px;"></i>-->
           ?>
           <h6 class="text-center font-weight-bolder text-lg text-white mb-0 d-flex align-items-center justify-content-center">
        
           <img src="<?php if(isset($row1['images'])) echo 'user_signup&login_page/img/'.$row1['images']; else echo 'boy.png';?>" class="icon-md me-3">
                       
           <?php
        } else {
            //echo "0 results";
        }
    } else {
        echo "Error: " . $conn->error;
    }
    //session_destroy();
  
    ?>
            <span> <?php echo  $clickedUsername . '<br>&nbsp;&nbsp;&nbsp;' . $mobilenumber; ?></span>
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
    <i class="fa fa-phone" onclick="redirectToPhoneCallPage('<?php echo $mobilenumber; ?>')" aria-hidden="true" style="color: white; font-size:20px; transform: rotate(100deg);"></i>
  

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
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Balance Outstanding</p>
                      <h5 class="font-weight-bolder">
                      <?php echo  ' &#8377;' . number_format($totalBalance, 2);?>
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
     
      <style>
  .custom-radio .custom-control-input:checked~.custom-control-label::before {
    width: 0.8em; /* Adjust the size as needed */
    height: 0.8em; /* Adjust the size as needed */
  }
</style>

<div class="row mt-2 mb-3">
  <div class="col-lg-5">
    <form id="reminderForm" action="edit6.php" method="POST">
      <div class="body1">
        <a href="#">
        <span id="reminderText" style="cursor: pointer;">Set remainder date:</span>
        <i id="calendarIcon" class="ml-2 fas fa-calendar" style="cursor: pointer;"></i>
</a>
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Set Reminder Date</h4>
                <button type="button" class="close" id="closeModalButton">&times;</button>
              </div>

              <div class="modal-body">
                <p>It will send a reminder notification on the selected date.</p>
                <input type="hidden" name="username" value="<?php echo $username; ?>">
  <input type="hidden" name="mobilenumber" value="<?php echo $umobilenumber; ?>">

                <div class="form-group">
                  <label for="reminderType pb-3">Select Reminder Type:<br></label>
                  <div class="form-check custom-radio pt-3">
                    <input type="radio" class="form-check-input custom-control-input" id="weekly" name="reminderType" value="weekly">
                    <label class="form-check-label custom-control-label" for="weekly">Weekly<br></label>
                  </div>
                  <div class="form-check custom-radio pt-3">
                    <input type="radio" class="form-check-input custom-control-input" id="monthly" name="reminderType" value="monthly">
                    <label class="form-check-label custom-control-label" for="monthly">Monthly</label>
                  </div>
                  <div class="form-check custom-radio pt-3">
                    <input type="radio" class="form-check-input custom-control-input" id="calendarDate" name="reminderType" value="calendarDate">
                    <label class="form-check-label custom-control-label" for="calendarDate">Calendar Date</label>
                  </div>

                  <div class="form-group" id="calendarDateInput" style="display: none;">
                    <label for="selectedDate">Select Date:</label>
                    <input type="date" autocomplete="off" name="dob" id="dob" required/>
                    <div class="error"></div>
                  </div>
                </div>
              </div>

              <div class="modal-footer mx-0 text-center justify-content-center">
                <button type="button" class="btn btn-primary mx-3" id="setButton">Set</button>
                <button type="button" class="btn btn-secondary mx-3" id="removeButton">Remove</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<?php
 include_once 'dbConfig.php';

$shopname=$_COOKIE['username'];
$smobilenumber=$_COOKIE['mobilenumber'];
//session_start(); // Start the session
$sql3="SELECT rdate from owneraccounts WHERE smobilenumber='$smobilenumber' AND umobilenumber='$mobilenumber'";
$result3 = $conn->query($sql3);

if (!$result3) {
    die('Error: ' . $conn->error);
}
if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) {
      $rdate=$row3['rdate'];
      //echo $count;
// Check if rdate is set in the session 
} }else {
    // Default value if rdate is not set
    $rdate = 'Not set';
}
//unset($_SESSION['rdate']);
//session_write_close();
?>

<script>
  $(document).ready(function() {
    // Check if the reminder date is set and not equal to 'Not set'
    var initialReminderDate = "<?php echo ($rdate !== 'Not set') ? $rdate : ''; ?>";

    // Set initial reminder text based on whether the date is set
    $('#reminderText').text('Reminder date is ' + initialReminderDate);

    document.getElementById('reminderText').addEventListener('click', showModal);
    document.getElementById('calendarIcon').addEventListener('click', showModal);

    function showModal() {
        $('#myModal').modal('toggle');
    }

    // Initialize Bootstrap Datepicker when modal is shown
    $('#myModal').on('shown.bs.modal', function() {
        // Show or hide calendar date input based on radio button selection
        $('input[name="reminderType"]').change(function() {
            if (this.value === 'calendarDate') {
                $('#calendarDateInput').show();

                // Initialize the Bootstrap Datepicker
                $('#dob').datepicker({
                    format: 'yyyy-mm-dd',   // Format of the date
                    autoclose: true,        // Close the datepicker when a date is selected
                    todayHighlight: true, 
                    startDate: new Date()    // Highlight today's date
                });
            } else {
                $('#calendarDateInput').hide();
            }
           
        });
    });

    // Close button action
    $('#closeModalButton').click(function() {
        $('#myModal').modal('hide');
    });
  
    // Set button action
    $('#setButton').click(function() {
        // Use AJAX to submit the form data to edit6.php
        $.ajax({
            type: 'POST',
            url: $('#reminderForm').attr('action'),
            data: $('#reminderForm').serialize(),
            success: function(response) {
                // Handle the response if needed
                console.log(response);

                // Update the text with the newly set reminder date
                $('#reminderText').text('Reminder date is ' + $('#dob').val());
                if ($('input[name="reminderType"]:checked').val() === 'weekly' || $('input[name="reminderType"]:checked').val() === 'monthly') {
                    location.reload();
                }
                // Hide the modal
                $('#myModal').modal('hide');
            },
            error: function(error) {
                // Handle errors if needed
                console.log(error);
            }
        });
    });

    // Remove button action
    $('#removeButton').click(function() {
        $('#reminderText').text('Set remainder date for payment');
        $('#myModal').modal('hide');
    });
});

</script>




        <?php
    include_once 'dbConfig.php';
$username = $_GET['username'];
$umobilenumber=$_GET['mobilenumber'];
$shopname = $_COOKIE['username'];
$smobilenumber = $_COOKIE['mobilenumber'];
$result = $conn->query($sql);
$rdate = isset($_GET['rdate']) ? $_GET['rdate'] : null;
if ($result) {
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
          $umobilenumber = isset($_GET['mobilenumber']) ? $_GET['mobilenumber'] : null;

        $sql= "SELECT * FROM owneraccounts WHERE smobilenumber='$smobilenumber' AND umobilenumber = '$umobilenumber'";
        echo '<div class="d-flex align-items-center justify-content-between mb-2">';
       
        echo ' <div class="fixed-plugin mb-1">';
        echo '   <div class="btn-group mt-3"  data-toggle="modal" data-target="#exampleModal">';
        echo '     <a href="#" class="btn btn-primary square-button mx-3"  data-toggle="modal" data-target="#exampleModal"> New  Payment</a>';
      
        echo '   </div>';
        echo '     <a href="inneruser6.php?username='.$clickedUsername.'&mobilenumber='.$mobilenumber.'" class="btn btn-secondary square-button mt-3 mx-3">Settle Amount</a>';
        echo ' </div>';
        echo '</div>';
        echo ' <h6 class="mt-0 text-dark text-lg font-weight-bold mb-3">Transactions</h6>';
      }
    
  }
?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top:200px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width:20px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo' <a href="inneruser.php?username='.$clickedUsername.'&mobilenumber='.$mobilenumber.'">';?>
    
    <button type="button" class="btn btn-primary text-center justify-content-center mx-5">Add &nbsp;New &nbsp;Transactions</button>
</a>
<p class="text-center justify-content-center align-items-center"> If the Customer already have any old Balance 
     <?php echo' <a href="inneruser2.php?username='.$clickedUsername.'&mobilenumber='.$mobilenumber.'">';?>Click here to enter
  </a> the Outstanding Amount
</p>
      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <?php
 include_once 'dbConfig.php';
$totalcredit = 0;
$totalBalance = 0;

if ($clickedUsername !== null) {
   // $conn = new mysqli($servername, $username, $password, $dbname);

   
    $smobilenumber = $_COOKIE['mobilenumber'];
    // Default SQL query to fetch all customers
    $sql = "SELECT purchasedate, itemscount, totalamount, credit, balance FROM owneraccounts where umobilenumber ='$mobilenumber' ORDER BY id DESC";

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

    $headerDisplayed = false; // Flag to track whether the header has been displayed

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Check if any row has credit, debit, or balance amounts
            if ($row["credit"] != 0 || $row["balance"] != 0 || $row["totalamount"] != 0) {
                // Display table header only once if not displayed yet
                if (!$headerDisplayed) {
                    echo '
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th class="px-0" scope="col">Transaction Date</th>
                                        <th scope="col">Bill Amount</th>
                                        <th scope="col">Amount Payed</th>
                                        <th scope="col">Balance</th>
                                    </tr>
                                </thead>
                                <tbody>';
                    $headerDisplayed = true; // Set the flag to true after displaying the header
                }
                echo '
                <tr onclick="navigateToShower(\'' . $clickedUsername . '\', \'' . $mobilenumber . '\', \'' . $row["purchasedate"] . '\', \'' . $row["totalamount"] . '\', \'' . $row["balance"] . '\', \'' . $row["itemscount"] . '\', \'' . $row["credit"] . '\')">
                    <th class="px-0 text-center" scope="row">' . $row["purchasedate"] . '</th>
                    <td class="text-center">' . ($row["totalamount"] !== null && is_numeric($row["totalamount"]) ? '&#8377;' . number_format($row["totalamount"], 2) : '-') . '</td>
                    <td class="fw-bold text-center">' . ($row["credit"] !== null && is_numeric($row["credit"]) ? '&#8377;' . number_format($row["credit"], 2) : '-') . '</td>
                    <td class="text-center">' . ($row["balance"] !== null && is_numeric($row["balance"]) ? '&#8377;' . number_format($row["balance"], 2) : '-') . '</td>
                </tr>';
                
                
                
            }
          
        }

        if (!$headerDisplayed) {
            // No rows with credit, debit, or balance amounts, display a message
            echo '<p class="text-center">No data available.</p>';
        } else {
            // Close the table
            echo '
            </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
    <br>';
       
        }
    } else {
        echo "No Outstanding Yet.";
    }
  }
?>



              </ul>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </main>
 
<!--<div class="btn-group">
<?php echo'<a href="inneruser3.php?username='.$clickedUsername.'&mobilenumber='.$mobilenumber.'">';?>
  
    <input type="submit" class="btn btn-primary square-button" value="You Got"/></a>
</div>-->

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
    <script>
    function navigateToShower(username, mobilenumber, date, totalamount, balance, itemscount, credit) {
        window.location.href = `shower.php?username=${username}&mobilenumber=${mobilenumber}&date=${date}&totalamount=${totalamount}&balance=${balance}&itemscount=${itemscount}&credit=${credit}`;
    }
    function redirectToPhoneCallPage(phoneNumber) {
  // Use the 'tel:' URL scheme to open the dialer with the specified phone number
  window.location.href = 'tel:' + phoneNumber;
}
</script>


  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
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
        
        /* Minimalist design, active link */
        /* .active-link::before{
          content: '';
          position: absolute;
          bottom: -.5rem;
          width: 4px;
          height: 4px;
          background-color: var(--first-color);
          border-radius: 50%;
        } */
        
        /* Change background header */
        .scroll-header {
          box-shadow: 0 1px 12px hsla(var(--hue), var(--sat), 15%, 0.15);
        }
        
       
        /* For small devices */
        /* Remove if you choose, the minimalist design */
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
        
          /* Minimalist design */
          /* .active-link::before{
              bottom: -.75rem;
          } */
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
        <!--=============== HEADER ===============-->
        
              

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
        
      

        <main>
            <!--=============== HOME ===============-->
            
           
        </main>
        
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
         <script>
     function goBack() {
        // Specify the URL you want to go back to
        var customURL = "sample1.php"; // Replace with your desired URL
        window.location.href = customURL;
    }
  </script>
</body>

</html>