<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
  <?php
include_once 'config.php';
$username = $_COOKIE['username'];
$umobilenumber = $_COOKIE['umobilenumber'];

$query ="SELECT COUNT(DISTINCT smobilenumber) AS totalshops, SUM(totalamount) AS tamount, SUM(credit) AS tcredit FROM owneraccounts  WHERE umobilenumber='$umobilenumber'  GROUP BY umobilenumber";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $totalshops = $row["totalshops"];
  $tamount = $row["tamount"];
  $tcredit = $row["tcredit"];
  $totalBalance=$tamount-$tcredit;
} else {
  $totalshops = 0;
  $totalBalance = 0;
  $tcredit = 0;
  $tamount=0;
}

?>

 <?php include 'new.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Credit Connect</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard pb-0 pt-2">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-6">
              <div class="card info-card sales-card" style="height:90%;">

                
                <div class="card-body">
                  <h5 class="card-title">Total shops<span></span></h5>
                  <?php
          
            if ($conn->connect_error) {
                die('Connection error: ' . $conn->connect_error);
            } else {
                $query = "SELECT count(DISTINCT smobilenumber) as tsmobilenumber FROM owneraccounts GROUP BY umobilenumber";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $number = $row["tsmobilenumber"];
                  
                    }
                  }
                } 
                    
            ?>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $totalshops;?></h6>
                     

                    </div>
                  </div>
                </div>
                   
              
            
      
              </div>
            </div><!-- End Sales Card -->
        

            <!-- Revenue Card -->
            <div class="col-6">
              <div class="card info-card revenue-card" style="height:90%; width:230px;">

               

                <div class="card-body">
                  <h5 class="card-title">Total Credit Amount<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-rupee"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo number_format($tcredit,2); ?></h6>
                      
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                

                <div class="card-body">
                  <h5 class="card-title">Balance Outstanding<span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-rupee"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo number_format($totalBalance,2); ?></h6>
                     
                      
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
include_once 'config.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username=$_COOKIE['username'];
$umobilenumber=$_COOKIE['umobilenumber'];
$sql = "SELECT 
            WEEK(purchasedate) AS week,
            SUM(credit) AS total_credit,
            SUM(totalamount) AS total_debit,
            SUM(balance) AS total_balance 
        FROM owneraccounts 
        WHERE umobilenumber = '$umobilenumber'
        GROUP BY WEEK(purchasedate), umobilenumber";

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
                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

               
  <!-- Vendor JS Files -->
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



        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<style>
        /*=============== GOOGLE FONTS ===============
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");*/
        
       
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
    </body>
</html>