<!DOCTYPE html>
<html lang="en">

<head>

  
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - NiceAdmin Bootstrap Template</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <?php include 'new.php'; ?>
   <!-- ======= Header ======= -->
  <?php
  include 'config.php';
    $smobilenumber=$_COOKIE['mobilenumber'];
    $query = "SELECT username,shop_name, shop_category, mobile_number, aaddress , city, district, sstate, pincode FROM ownersignup WHERE mobile_number = '$smobilenumber'";
    $result = $conn->query($query);
    
     if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $shopname = $row["shop_name"];
        $shopcategory = $row["shop_category"];
        $aaddress = $row["aaddress"];
        $city = $row["city"];
        $district = $row["district"];        
        $sstate = $row["sstate"];
        $pincode = $row["pincode"];   
        $smobilenumber = $row["mobile_number"];     
      }
    }
    ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
    
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
           
            <?php
require 'config.php';

$smobilenumber=$_COOKIE['mobilenumber'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM ownersignup WHERE mobile_number = '$smobilenumber'"));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Image</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <style media="screen">
    .upload{
      width: 140px;
      position: relative;
      margin: auto;
      text-align: center;
    }
    .upload img{
      border-radius: 50%;
      border: 8px solid #DCDCDC;
      width: 125px;
      height: 125px;
    }
    .upload .rightRound{
      position: absolute;
      bottom: 0;
      right: 0;
      background: #00B4FF;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }
    .upload .leftRound{
      position: absolute;
      bottom: 0;
      left: 0;
      background: red;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
    }
    .upload .fa{
      color: white;
    }
    .upload input{
      position: absolute;
      transform: scale(2);
      opacity: 0;
    }
    .upload input::-webkit-file-upload-button, .upload input[type=submit]{
      cursor: pointer;
    }
  </style>
  <body>
    <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
      <input type="hidden" name="id" value="<?php echo $user['imgid']; ?>">
      <div class="upload">
        <img src="img/<?php echo $user['images']; ?>" id = "image">
        <!--<img src="<?php if(isset($row['images'])) echo $imageurl; else echo 'boy.png';?>" class="rounded-circle">
  -->
        <div class="rightRound" id = "upload">
          <input type="file" name="fileImg" id = "fileImg" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera"></i>
        </div>

        <div class="leftRound" id = "cancel" style = "display: none;">
          <i class = "fa fa-times"></i>
        </div>
        <div class="rightRound" id = "confirm" style = "display: none;">
          <input type="submit">
          <i class = "fa fa-check"></i>
        </div>
      </div>
    </form>

    <script type="text/javascript">
      document.getElementById("fileImg").onchange = function(){
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

        document.getElementById("cancel").style.display = "block";
        document.getElementById("confirm").style.display = "block";

        document.getElementById("upload").style.display = "none";
      }

      var userImage = document.getElementById('image').src;
      document.getElementById("cancel").onclick = function(){
        document.getElementById("image").src = userImage; // Back to previous image

       document.getElementById("cancel").style.display = "none";
       document.getElementById("confirm").style.display = "none";

       document.getElementById("upload").style.display = "block";
      }
    </script>

    <?php
    $smobilenumber=$_COOKIE['mobilenumber'];
    if(isset($_FILES["fileImg"]["name"])){
      $id = $_POST["imgid"];

      $src = $_FILES["fileImg"]["tmp_name"];
      $imageName = uniqid() . $_FILES["fileImg"]["name"];

      $target = "img/" . $imageName;

      move_uploaded_file($src, $target);

      $query = "UPDATE ownersignup SET images = '$imageName' WHERE mobile_number = '$smobilenumber'";
      mysqli_query($conn, $query);
?>
<script>
  window.location.href="oprofile.php";
</script>
<?php
    }
    ?>
  </body>
</html>  
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                 
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username</div>
                    <div class="col-lg-9 col-md-8"><?php echo $username;?></div>
                  </div>

                 
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Shopname</div>
                    <div class="col-lg-9 col-md-8"><?php echo $shopname;?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Shop Category</div>
                    <div class="col-lg-9 col-md-8"><?php echo $shopcategory;?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Mobile Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $smobilenumber;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $aaddress;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">City</div>
                    <div class="col-lg-9 col-md-8"><?php echo $city;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">District</div>
                    <div class="col-lg-9 col-md-8"><?php echo $district;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">State</div>
                    <div class="col-lg-9 col-md-8"><?php echo $sstate;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Pincode</div>
                    <div class="col-lg-9 col-md-8"><?php echo $pincode;?></div>
                  </div>

                  

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                 
<form action="oprofile1.php" method="post">
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" autocomplete="off" type="text" class="form-control" id="fullName" value="<?php echo $username;?> "required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Shop Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="shopname"autocomplete="off" type="text" class="form-control" id="fullName" value="<?php echo $shopname;?> ">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Shop Category</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="shopcategory" autocomplete="off"type="text" class="form-control" id="fullName" value="<?php echo $shopcategory;?> "required>
                      </div>
</div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="aaddress"autocomplete="off" type="text" class="form-control" id="Country" value="<?php echo $aaddress;?>"required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">City</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="city"autocomplete="off" type="text" class="form-control" id="Address" value="<?php echo $city;?>"required>
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">District</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="district"autocomplete="off" type="text" class="form-control" id="Address" value="<?php echo $district;?>"required>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">State</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="sstate" autocomplete="off"type="text" class="form-control" id="Address" value="<?php echo $sstate;?>"required>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Pincode</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="pincode" autocomplete="off"type="number" class="form-control" id="Address" value="<?php echo $pincode;?>"required>
                        </div>
                      </div>

                      
                        <div class="text-center pt-3">
                      <input type="submit" class="btn btn-primary" value="Save Changes" >
   
                    
                  
                    </div>
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
 
                  </form><!-- End Profile Edit Form -->

                </div>
 
   
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>