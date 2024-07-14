<?php 
session_start();
?>
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
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
  <style>
        /* Custom styles */
        .input-group .input-group-text .btn-custom {
            margin-right: 22px;
        }

        .btn-custom.active {
            background-color: #007bff;
            color: #fff;
        }
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

<body class="g-sidenav-show   bg-gray-100">
<?php
  // Your database connection parameters
  include_once 'config.php';
  $username = $_COOKIE['username'];
  $umobilenumber = $_COOKIE['umobilenumber'];
  // Query to get total users count and total balance
  $sql = "SELECT COUNT(DISTINCT smobilenumber) AS totalShops, SUM(totalamount) AS tamount , SUM(credit) AS tcredit FROM owneraccounts  WHERE umobilenumber='$umobilenumber'  GROUP BY umobilenumber";
  $result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalShops = $row["totalShops"];
    $tamount = $row["tamount"];
    $tcredit = $row["tcredit"];
    $totalBalance=$tamount-$tcredit;
} else {
    $totalShops = 0;
    $totalBalance = 0;
}

  // Close the database connection
  
?>


  <div class="min-height-200 bg-primary position-absolute w-100"></div>
  <?php include('new.php'); ?>
    
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 mt-0 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            </ol>
         
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
              
            </li>
            
            
             
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-2">
            <div class="card" style="border-radius:20px;">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Balance Outstanding<br></p>
                      <h5 class="font-weight-bolder">
                      <?php echo '<br> &#8377;' . number_format($totalBalance, 2); ?>
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
     
       
      </div>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
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
                   </div>
            </div>
          </div>
        </div>
        
       
      </div>
    </div>
  </div>
</div>
  



<div class="card-bodyy p-3">
        <ul class="list-group">
          <div id="result">
               
        <?php
include_once 'config.php';

$username = $_COOKIE['username'];
$umobilenumber = $_COOKIE['umobilenumber'];

$sql = "SELECT shopname, smobilenumber, purchasedate, SUM(balance) AS tbalance 
        FROM owneraccounts 
        WHERE umobilenumber ='$umobilenumber'
        GROUP BY smobilenumber ORDER BY id";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['query']) && !empty($_POST['query'])) {
        $searchKeyword = $_POST['query'];
        $sql = "SELECT shopname, smobilenumber, purchasedate, SUM(balance) AS tbalance 
                FROM owneraccounts 
                WHERE umobilenumber ='$umobilenumber' AND shopname = '$searchKeyword' 
                GROUP BY smobilenumber";
    } elseif (isset($_POST['cat_name'])) {
        $catname = $_POST['cat_name'];

        switch ($catname) {
            case 'Zerobalance':
                $sql = "SELECT shopname, smobilenumber, SUM(balance) AS tbalance 
                        FROM owneraccounts 
                        WHERE balance = 0 
                        GROUP BY smobilenumber";
                break;
            case 'Minbalance':
                $sql = "SELECT shopname, smobilenumber, SUM(balance) AS tbalance 
                        FROM owneraccounts 
                        GROUP BY smobilenumber 
                        ORDER BY tbalance ASC";
                break;
            case 'Maxbalance':
                $sql = "SELECT shopname, smobilenumber, SUM(balance) AS tbalance 
                        FROM owneraccounts 
                        GROUP BY smobilenumber 
                        ORDER BY tbalance DESC";
                break;
            default:
                // Default query remains the same as the initial query
                break;
        }
    }
}
include 'config.php';
$result = $conn->query($sql);

if ($result) {
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
  // echo'<div class="row pt-3"> ';
  echo'<div class="result pt-2">';
  echo '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">';
  echo '<div class="d-flex align-items-center">';
  ?><img src="<?php if(isset($row1['images'])) echo 'img/'.$row1['images']; else echo 'boy.png';?>" class="icon-md me-3">
                       
  <?php //echo '<div class="icon icon-shape icon-md me-3 bg-gradient-dark shadow text-center"></div>';
  echo '<div class="d-flex flex-column">';
  echo "<a href='useraccounts2.php?shopname=".$row["shopname"]."&mobilenumber=".$row["smobilenumber"]."'>";
 echo '<h6 class="mb-1 text-dark text-lg font-weight-bold">' . $row["shopname"] . '</h6>';
 
$sql1 = "SELECT SUM(totalamount) AS tamount, SUM(credit) AS tcredit 
FROM owneraccounts 
WHERE smobilenumber ='$smobilenumber' AND umobilenumber = '$umobilenumber'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0){
 $row1 = $result1->fetch_assoc();
 $tamount = $row1["tamount"];
 $tcredit = $row1['tcredit'];
}
$totalbalance = $tamount-$tcredit;
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

  
<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- Add this line in the head section of your HTML to include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-e6CGZL8Zl+zN2E8U8Z+o4UrKyyegYjyOIdI1TegFqF7IGq5F2q2HJGOiS7FhI5Vx" crossorigin="anonymous">

        <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>

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


       
    </script>
<script>
   // Wait for the DOM to be ready before executing any code
   document.addEventListener('DOMContentLoaded', function () {
      // Find the filter button by its ID
      var filterButton = document.getElementById('filterButton');

      // Find the dropdown menu by its ID
      var dropdownMenu = document.getElementById('filterDropdown');

      // Add a click event listener to the filter button
      filterButton.addEventListener('click', function () {
         // Toggle the 'show' class on the dropdown menu
         dropdownMenu.classList.toggle('show');
      });

      // Close the dropdown if the user clicks outside of it
      window.addEventListener('click', function (event) {
         if (!event.target.matches('#filterButton')) {
            dropdownMenu.classList.remove('show');
         }
      });
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

<script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
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
 <!--=============== BOXICONS ===============-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</script>
<style>
   
        :root {
          --header-height: 3rem;
        
         
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
          --tiny-font-size: .625rem;
        
         
          --z-tooltip: 10;
          --z-fixed: 100;
        }
        
        @media screen and (min-width: 968px) {
          :root {
            --h1-font-size: 2.25rem;
            --normal-font-size: 1rem;
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
          padding: 4.5rem 0 2rem;
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
            padding: 0 1rem;
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
          font-size: 2rem;
        }
        
        
        .active-link {
          position: relative;
          color: #004aad;
          transition: .3s;
        }
    
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
        <title>Responsive bottom navigation</title>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        
              

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="index.php" class="nav__link active-link">
                                <i class='bx bx-home-alt nav__icon'></i>
                                <span class="nav__name">Home</span>
                            </a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="useraccounts.php" class="nav__link">
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
                            <a href="index1.php" class="nav__link">
                                <i class=''>
                               
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 21q-3.45 0-6.012-2.287T3.05 13H5.1q.35 2.6 2.313 4.3T12 19q2.925 0 4.963-2.037T19 12q0-2.925-2.037-4.962T12 5q-1.725 0-3.225.8T6.25 8H9v2H3V4h2v2.35q1.275-1.6 3.113-2.475T12 3q1.875 0 3.513.713t2.85 1.924q1.212 1.213 1.925 2.85T21 12q0 1.875-.712 3.513t-1.925 2.85q-1.213 1.212-2.85 1.925T12 21m2.8-4.8L11 12.4V7h2v4.6l3.2 3.2z"></path></svg></i>
                                <span class="nav__name">History</span>
                            </a>
                        </li>

                       
                    </ul>
                </div>

                <img src="assets/img/perfil.png" alt="" class="nav__img">
        
        </header>

        
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
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


 
</body>

</html>