<?php session_start(); ?>
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
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
      
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
</head>

<body>
   <?php include 'new.php' ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Credit Connect</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard p-0 mt-4">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            
            <?php
include_once 'config.php';
$smobilenumber = $_COOKIE['mobilenumber'];
$query = "SELECT username, credit, balance, totalamount, creditdate, purchasedate, umobilenumber FROM owneraccounts WHERE smobilenumber = '$smobilenumber' ORDER BY id DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $umobilenumber = $row['umobilenumber'];
        $username = $row["username"];
        $credit = $row["totalamount"];
        $debit = $row["credit"];
        $balance = $row["balance"];
        $totalamount = $row["totalamount"];
        $purchasedate = $row["purchasedate"];

        $sql3 = "SELECT * FROM usersignup WHERE mobilenumber ='$umobilenumber'";
        $result3 = $conn->query($sql3);
        $sql2 = "SELECT usersignup.images FROM usersignup JOIN owneraccounts ON usersignup.mobilenumber = owneraccounts.umobilenumber WHERE owneraccounts.umobilenumber ='$umobilenumber'";
        $result1 = $conn->query($sql2);
        $row1 = $result1->fetch_assoc();

        if ($result3->num_rows > 0) {
            $row3 = $result3->fetch_assoc();
            $id = $row3['imgid'];
            $img = $row1['images'];
            $name = $row3['imgname'];
        }
    }
}
?>

<?php
include_once 'config.php';

$smobilenumber = $_COOKIE['mobilenumber'];
$query = "SELECT username, credit, balance, totalamount, creditdate, purchasedate, umobilenumber FROM owneraccounts WHERE smobilenumber = '$smobilenumber' ORDER BY id DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
?>
    <!-- Top Selling -->
    <div class="col-12">
        <div class="card top-selling overflow-auto">
            <div class="card-body pb-0 mt-2">
                <h5 class="card-title">Transaction History</h5>

                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Bill Amount</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Balance Amount</th>
                            <th scope="col">Transaction Date</th>
                            <!-- <th scope="col">Credit date</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $umobilenumber = $row['umobilenumber'];
                            $username = $row["username"];
                            $credit = $row["totalamount"];
                            $debit = $row["credit"];
                            $balance = $row["balance"];
                            $totalamount = $row["totalamount"];
                            $purchasedate = $row["purchasedate"];

                            $sql3 = "SELECT * FROM usersignup WHERE mobilenumber ='$umobilenumber'";
                            $result3 = $conn->query($sql3);
                            $sql2 = "SELECT usersignup.images FROM usersignup JOIN owneraccounts ON usersignup.mobilenumber = owneraccounts.umobilenumber WHERE owneraccounts.umobilenumber ='$umobilenumber'";
                            $result1 = $conn->query($sql2);
                            $row1 = $result1->fetch_assoc();

                            if ($result3->num_rows > 0) {
                                $row3 = $result3->fetch_assoc();
                                $id = $row3['imgid'];
                                $img = $row1['images'];
                                $name = $row3['imgname'];
                            }
                        ?>
                            <tr>
                                <div class="d-flex align-items-center text-sm">
                                    <?php if ($row["balance"] !== NULL || $row["totalamount"] !== NULL || $row["creditdate"] !== NULL) { ?>
                                        <th scope="row">
                                            <a href="#"><img src="<?php echo isset($row1['images']) ? 'img/' . $row1['images'] : 'boy.png'; ?>" class="icon-md me-3 text-lg" alt=""></a>
                                        </th>
                                        <td class="text-center"><a href="#" class="text-primary fw-bold"><?php echo $username; ?></a></td>
                                        <td class="text-center"><?php echo ($credit !== null && is_numeric($credit)) ? '₹' . number_format($credit, 2) : '-'; ?></td>
                                        <td class="text-center"><?php echo ($debit !== null && is_numeric($debit)) ? '₹' . number_format($debit, 2) : '-'; ?></td>
                                        <td class="fw-bold text-center"><?php echo ($balance !== null && is_numeric($balance)) ? '₹' . number_format($balance, 2) : '-'; ?></td>
                                        <td class="text-center"><?php echo $purchasedate; ?></td>
                                        <!-- <td class="text-center"><?php echo $creditdate; ?></td>-->
                                    <?php } ?>
                                </div>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div><!-- End Top Selling -->
<?php
} else {
    echo '<div class="text-center align-items-center py-3"><p>No history Found</p></div>';
}
?>

        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

         

               

                
         
         


 
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
                      <a href="../home.php" class="nav__link active-link">
                          <i class='bx bx-home-alt nav__icon'></i>
                          <span class="nav__name">Home</span>
                      </a>
                  </li>
                  
                  <li class="nav__item">
                      <a href="../sample1.php" class="nav__link">
                          <i class='bx bx-user nav__icon'></i>
                          <span class="nav__name">Accounts</span>
                      </a>
                  </li>

                  <li class="nav__item">
                      <a href="../search.php" class="nav__link">
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