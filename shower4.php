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

<body class="g-sidenav-show   bg-gray-100 mt-0">

<div class="min-height-300 bg-primary position-absolute w-100"></div>
   
  
   
   <main class="main-content position-relative border-radius-lg ">
     
     <!-- Navbar -->
     <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
     <i class="fa fa-arrow-left fa-1x text-white" onclick="goBack()"></i> 
     
         
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
               
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
            <div class="col-xl-6 mb-xl-0 mb-4">
            <h6 class="font-weight-bolder text-white mb-0 text-lg text-center">Tracker</h6>
              </div>
            </div>
            
            
            </div>
          </div>
        </div>
       
      </div>
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
            <h6 class="mb-0 text-center">Purchase Information</h6>

            </div>
            <?php
 include_once 'dbConfig.php';

$username = $_GET['username'];
$umobilenumber = $_GET['mobilenumber'];
$bid = 0;
$tbalance = $_GET['balance'];
//$credit = 0;
//$totalamount = 0;
//$tamount= $totalamount + $tbalance;
$shopname = $_COOKIE['username'];
$smobilenumber = $_COOKIE['mobilenumber'];

// Your database insertion logic here...
// Assuming $bid is already defined
$bid += 1;

$sql = "INSERT INTO owneraccounts (username, shopname, umobilenumber, smobilenumber, balance, bid, purchasedate)
        VALUES (
            '$username',
            '$shopname',
            '$umobilenumber',
            '$smobilenumber',
            '$tbalance',
            '$bid',
            CURDATE()
        )";


if ($conn->query($sql) === TRUE) {
    //header("Location: sample2.php?username=$username&mobilenumber=$umobilenumber");
    //exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Output HTML content after PHP logic
?>
<div class="card-body pt-4 p-3">
    <ul class="list-group">
        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
            <div class="d-flex flex-column">
                <h6 class='mb-3 text-center text-lg'>&nbsp;&nbsp;&nbsp;<?= $username ?></h6>
                <h6 class='mb-2 text-sm'>User Mobilenumber: <span class='text-dark font-weight-bold ms-sm-2'><?= $umobilenumber ?></span></h6>
                <h6 class='mb-2 text-sm'>Balance Amount: <span class='text-dark ms-sm-2 font-weight-bold'><?= $tbalance ?></span></h6>

                <?php
                if (!empty($data['notes'])) {
                    echo "<h6 class='text-xs'>Notes: <span class='text-dark ms-sm-2 font-weight-bold'>" . $data['notes'] . "</span></h6>";
                }
                ?>

                <div class="ms-auto text-end">
                    <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-primary px-3" onclick="confirmAndSubmit()">Confirm & Submit</button>

                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
<?php

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
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmAndSubmit() {
    // Perform any confirmation logic if needed

    // Get username and mobilenumber from PHP variables
    var username = '<?= $username ?>';
    var mobilenumber = '<?= $umobilenumber ?>';

    // Show SweetAlert for success
    Swal.fire({
        icon: 'success',
        title: 'Successfully added',
        showConfirmButton: false,
        timer: 1500 // Close after 1.5 seconds
    }).then(() => {
        // Redirect to sample2.php after SweetAlert is closed
        window.location.href = 'sample2.php?username=' + encodeURIComponent(username) + '&mobilenumber=' + encodeURIComponent(mobilenumber);
    });
}

</script>
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
  <style>
        /*=============== GOOGLE FONTS ===============
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");*/
        
       
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
                            <a href="index3.php" class="nav__link">
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
       
    function goBack() {
      var username = '<?= $username ?>';
    var mobilenumber = '<?= $umobilenumber ?>';

    // After confirmation, navigate to sample2.php with parameters
    window.location.href = 'sample2.php?username=' + encodeURIComponent(username) + '&mobilenumber=' + encodeURIComponent(mobilenumber);

    }
   
  </script>
  <!-- Include SweetAlert library -->


</body>

</html>