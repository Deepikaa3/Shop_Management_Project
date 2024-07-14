<html>
    <head>
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Accounts
  </title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

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
  <style>
        /* Custom styles */
        .input-group .input-group-text .btn-custom {
            margin-right: 22px;
        }

        .btn-custom.active {
            background-color: #007bff;
            color: #fff;
        }
        /* Select the input element within the search bar */
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
    <body>
<?php
//<!-- Modified Script 2 incorporating card view style -->
include_once 'config.php';
$output = '';
$umobilenumber=$_COOKIE['umobilenumber']; 

if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
        SELECT shopname, balance, smobilenumber FROM owneraccounts 
        WHERE shopname LIKE '%" . $search . "%'
        OR smobilenumber LIKE '" . $search . "%' GROUP BY smobilenumber  
    ";
} else {
    $query = "
        SELECT * FROM owneraccounts ORDER BY shopname
    ";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "
    <div class='card-bodyy p-3'>
        <ul class='list-group'>
          <div id='result'>
    ";

    while ($row = mysqli_fetch_array($result)) {
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
  $img = isset($row1['images']) ? $row1['images'] : null;
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
$umobilenumber=$_COOKIE['umobilenumber'];
//echo '<span class="text-dark text-sm">' . $row["umobilenumber"] . ' <span class="font-weight-bold"></span></span>';
$query ="SELECT COUNT(DISTINCT smobilenumber) AS totalshops, SUM(totalamount) AS tamount, SUM(credit) AS tcredit FROM owneraccounts  WHERE umobilenumber='$umobilenumber'  GROUP BY smobilenumber";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $totalshops = $row["totalshops"];
  $tamount = $row["tamount"];
  $tcredit = $row["tcredit"];
  $totalbalance=$tamount-$tcredit;
} else {
  $totalshops = 0;
  $totalbalance = 0;
  $tcredit = 0;
  $tamount=0;
}

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

    echo "
        </div>
        </ul>
        </div>
    ";
} else {
    echo 'Data Not Found';
}
?>
</body>
</html>