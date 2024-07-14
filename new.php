<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 <!-- Your head content here -->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  
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
        /* Add this style to your CSS */
        .scroll-header {
            /* Add any styles you want for the scroll header */
            background-color: #fff; /* Change this to the desired background color */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Change this to the desired box shadow */
        }

        .toggle-sidebar {
            /* Add any styles you want for the toggled sidebar */
            /* For example, you can set the width or background color */
            width: 200px;
            background-color: #f1f1f1;
            /* Adjust these styles based on your design */
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



<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
       
      </a>
        </li><!-- End Search Icon-->
        <?php
// Establish database connection (replace with your credentials)
include_once 'config.php';

$username=$_COOKIE['username'];
$umobilenumber=$_COOKIE['umobilenumber'];
$sql3="SELECT count from usersignup WHERE mobilenumber='$umobilenumber'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) {
      $count=$row3['count'];
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
$sql = "SELECT SUM(balance) AS total_balance, smobilenumber, shopname,rdate
        FROM owneraccounts 
        WHERE umobilenumber = '$umobilenumber'
        AND (rdate = CURDATE() OR rdate = DATE_ADD(CURDATE(), INTERVAL 1 DAY) OR rdate = DATE_ADD(CURDATE(), INTERVAL 1 WEEK))
        GROUP BY smobilenumber, shopname";
$result = $conn->query($sql);
$count = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $amountDue = $row['total_balance'];
        $shopname = $row['shopname'];
        $smobilenumber = $row['smobilenumber'];
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
        $notificationMessage = "You have to pay $amountDue rupees within $timeLabel to $shopname.";
       echo '<div class="font" style="font-family:poppins";>';
        echo '<li class="notification-item">';
      }
         
// Establish database connection (replace with your credentials)
include_once 'config.php';

$username = $_COOKIE['username'];
$umobilenumber = $_COOKIE['umobilenumber'];
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
    $imageurl = "img/{$image}";
    //echo '<li class="notification-item">';
                echo '<div class="d-flex align-items-center">';

                // Display user image
                echo '<img src="' . $imageurl . '" alt="Profile" class="rounded-circle" style="width: 30px; height: 30px; margin-right: 10px; font-family:sans-serif;">';

                // Display notification message
                echo '<div>';
                echo '<p class="text-dark font-weight-bold text-sm font-italic mt-0">' . $notificationMessage . '</p>';
                echo '</div>';

                echo '</div>';
                echo '</li>';
        
        $count += 1;
    
    //echo' <span class="badge bg-primary badge-number">'.$count.'</span>';
  

 
      
      }
      
    }
  }
  else{
    $notificationMessage = "no notifications";
    echo '<p class="text-center align-items-center">' . $notificationMessage . '</p>';

  }
  $sql4="UPDATE usersignup SET count = '$count' WHERE mobilenumber = '$umobilenumber'";  
 $conn->query($sql4);
//echo '</li>'; // Close the list item
?>
  
            

           


          </ul>

        </li>
        <?php
include_once 'config.php';
$username = $_COOKIE['username'];
$umobilenumber = $_COOKIE['umobilenumber'];
$sql = "SELECT imgid,imgname,images FROM usersignup WHERE mobilenumber = '$umobilenumber'";
$result = $conn->query($sql);

if ($result === false) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['imgid'];
    $image = $row['images'];
    $name = $row['imgname'];
    $imageurl = "img/{$image}";
    echo '<li class="nav-item dropdown pe-3">';
    echo ' <a class="nav-link nav-profile d-flex align-items-center pe-0" href="profile.php">';
   // echo '  <img src="' . $imageurl . '" alt="Profile" class="rounded-circle">';?>
    <img src="<?php if(isset($row['images'])) echo $imageurl; else echo 'boy.png';?>" class="rounded-circle">
    <?php echo '<span class="d-none d-md-block dropdown-toggle ps-2"></span>';
    echo ' </a><!-- End Profile Iamge Icon -->';
} else {
    echo "0 results or error in fetching data";
}

      
    

// Close the connection
//$conn->close();
?>

        

          
           

            

            

      
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  <aside id="sidebar" class="sidebar">
  <!-- ======= Sidebar ======= -->
  <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="bi bi-house"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="search.php">
          <i class="bi bi-search"></i><span>Search</span>
        </a>
             
      <li class="nav-item">
        <a class="nav-link collapsed" href="useraccounts.php">
          <i class="bi bi-journal-text"></i><span>Accounts</span>
          </a>
     
        
      <li class="nav-item">
        <a class="nav-link collapsed" href="index3.php">
          <i class="bi bi-clock"></i><span>Transaction History</span>
        </a>
      
      
        
      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-person"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>
  </aside>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

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
    <script>
$(document).ready(function () {
    // Toggle sidebar on button click
    $('.toggle-sidebar-btn').on('click', function () {
        $('body').toggleClass('toggle-sidebar');
    });

    // Add scroll header functionality
    function scrollHeader() {
        const header = $('#header');
        // When the scroll is greater than 80 viewport height, add the scroll-header class to the header tag
        if ($(window).scrollTop() >= 80) {
            header.addClass('scroll-header');
        } else {
            header.removeClass('scroll-header');
        }
    }

    // Trigger scrollHeader function on scroll
    $(window).on('scroll', scrollHeader);
});
</script>
    </body>
</html>