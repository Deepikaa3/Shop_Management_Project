
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Keep the Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="home/assets/css/style.css" rel="stylesheet">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <!-- Include other scripts -->
    <script src="home/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="home/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="home/assets/vendor/echarts/echarts.min.js"></script>
    <script src="home/assets/vendor/quill/quill.min.js"></script>
    <script src="home/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="home/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="ahome/ssets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
   
<style>
    .search {
      width: 570px;
      height: 80px;
      position: relative;
      margin: 60px auto;
      margin-left: 20px;

    }
    .search .input-group {
      width: 80%;
      height:40px;
    }
    .search input {
      width: calc(100% - 80px);
      height: 10px;
      font-size: 18px;
      border-radius: 5px;
    }
    .search button {
      width: 25px;
      height: 20px;
      color: white;
      background-color: #0F172B;
      font-size: 15px;
      border-radius: 5px;
    }
main.table {
    
    background-color: #fff5;

    backdrop-filter: blur(7px);

    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;

    overflow: hidden;
}

.table__header {
    width: 100%;
    height: 10%;
    background-color: #fff4;
    padding: .8rem 1rem;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table__header .input-group {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;

    display: flex;
    justify-content: center;
    align-items: center;

    transition: .2s;
}

.table__header .input-group:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 95%;
    max-height: calc(89% - 1.6rem);
    background-color: #fffb;

    margin: .8rem auto;
    border-radius: .6rem;

    overflow: auto;
    overflow: overlay;
}


.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{ 
    visibility: visible;
}


table {
    width: 96%;
    margin-left:10px;
}
tbody tr:not(:first-child) {
    margin-top: 20px; /* Adjust the margin-top as needed for space between rows */
   /* Ensures space is applied even if collapsing margins */
}

td img {
    width: 36px;
    height: 36px;
    margin-right: .5rem;
    border-radius: 50%;

    vertical-align: middle;
}

table, th, td {
    border-collapse: collapse;
    padding: 1rem;
    text-align: left;
}

thead th {
    position: relative;
    top: 0;
    left: 0;
    background-color: #EEEEEE;
    cursor: pointer;
    text-transform: capitalize;
    font-size:15px;
}

thead tr{
    margin-left:0px;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
}

.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}

.status.Completed {
    background-color: #86e49d;
    color: #006b21;
}

.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}

.status.pending {
  background-color: #d893a3;
    color: #b30021;
}

.status.shipped {
    background-color: #6fcaea;
}


@media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;
    
    text-align: center;
    font-size: 3rem;
    
    margin-left: .5rem;
    transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
    border: 1.4px solid #6c00bd;
}

thead th:hover {
    color: #6c00bd;
}

thead th.active span.icon-arrow{
    background-color: #6c00bd;
    color: #fff;
}

thead th.asc span.icon-arrow{
    transform: rotate(180deg);
}

thead th.active,tbody td.active {
    color: #6c00bd;
}
/* Add CSS styles as needed */
/* Add CSS styles as needed */
.status {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 5px;
    color: #fff;
    font-weight: bold;
    text-align: center;
}

.completed {
    background-color: green;
}

/* Your existing CSS styles... */

/* Adjust font size and add space */
td {
    font-size: 20px; /* Adjust font size as needed */
    padding: 15px; /* Add padding for space between table data */
    text-align: center; /* Center-align the content */
}
.search .icon{
  margin-top:0px;
  margin-right: 0px;
}

        @media (max-width: 767px) {
            .search {
                width: 90%; /* Adjust width for smaller screens */
                margin: 20px auto; 
                margin-top:20px;/* Center-align the search bar */
            }
            .input-group-addon{
              width: 40px;
            }

            .search .input-group {
                width: 100%;
                height:30px;
               
              
            }

            .search input {
                width: 70%; /* Adjust input width */
                font-size: 16px; /* Modify font size */
                height: 45px;
                 /* Adjust height for smaller screens */
            }

            .search button {
                width: 35%; /* Adjust button width */
                height: 45px; /* Adjust height for smaller screens */
                font-size: 18px;
                padding-top:0px;
                margin-top:0px;
                padding-right:20px;
                margin-right:200px; /* Modify font size */
            }
            .search i{
                padding-right:2px;
                
            }
        }
    </style>
</head>
<body>
<!-- End Sidebar-->
<?php include('new.php');?>
  <main id="main" class="main">

   
  <div class="search">
        <div class="input-group">
            <input autocomplete="off" type="text" name="search_text" id="search_text" placeholder="Search here.." class="form-control" />
            <span class="input-group-addon">
                <button type="button" class="btn btn-default"><i class="fas fa-search"></i></button>
            </span>
        </div>
    </div>

    <div id="result"></div>
    <?php include('project3.php'); ?>
    <script src="home/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="home/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="home/assets/vendor/echarts/echarts.min.js"></script>
  <script src="home/assets/vendor/quill/quill.min.js"></script>
  <script src="home/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="home/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="ahome/ssets/vendor/php-email-form/validate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <div class="row">
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
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <!-- Include Bootstrap JS along with Bootstrap's jQuery (Remove standalone jQuery import) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Include jQuery only once (Remove standalone jQuery import) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Include your other scripts here -->
    <script src="home/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="home/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="home/assets/vendor/echarts/echarts.min.js"></script>
    <script src="home/assets/vendor/quill/quill.min.js"></script>
    <script src="home/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="home/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="ahome/ssets/vendor/php-email-form/validate.js"></script>
   <script>
        $(document).ready(function () {
            function load_data(query) {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: { query: query },
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }

            $('#search_text').keyup(function () {
                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    document.getElementById("customers_table").innerHTML = "";
                }
            });
        });

        // Your other scripts go here
    </script>
</body>
</html>

