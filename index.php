<?php 
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
{
  header("Location: home.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hotelier - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="welcomepage_owner.css" rel="stylesheet">
    <style>
  /* Define the glowing animation */
  @keyframes glowing {
    0% {
      box-shadow: 0 0 10px #ffcc00;
    }
    50% {
      box-shadow: 0 0 20px #ffcc00;
    }
    100% {
      box-shadow: 0 0 10px #ffcc00;
    }
  }

  /* Apply the glowing animation to the buttons */
  .glow {
    animation: glowing 2s infinite;
    border-radius: 25px;
  }
</style>
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.html" class="navbar-brand w-100 px-3 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-center align-items-center justify-content-center text-uppercase">Credit&nbsp;Connect</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row gx-0 bg-white d-none d-lg-flex">
                        <div class="col-lg-7 px-5 text-start">
                           
                        </div>
                       
                    </div>
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.html" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 px-5 text-primary text-center align-items-center justify-content-center text-uppercase">Credit&nbsp;Connect</h1>
                        </a>
                        
                        
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0 mb-2">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="w-100" src="same.jpg" alt="Image" preload>

                        <div class="carousel-caption d-flex mb-8 mt-0 align-items-center justify-content-center pt-0">
                            <div class="p-1 mt-0" style="max-width: 700px;">
                              <div class="t"> <h6 class="section-title text-white mt-0 mb-0 animated slideInDown" style="font-style:italic;top:-50px;font-size:39px;">Welcome to Credit <br>Connect</h6></div>
                                <div class="text"> <h1 class="display-3 text-white mb-4 animated slideInDown" style="font-weight:10px;color:#bcbcba;"><br>Stay Connected!</h1></div>
                                <a href="loginpage.php" class="btn btn-outline-warning py-md-2 px-md-2 me-3 animated slideInLeft glow">
  <p>Owner</p>
</a>
<a href="user_signup&login_page/loginpage.php" class="btn btn-outline-warning py-md-0 px-md-2 animated slideInRight glow">
  <p>Customer</p>
</a>
</div>
                        </div>
                    </div>
          
                
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="welcomepage_owner.js"></script>
</body>
</html>