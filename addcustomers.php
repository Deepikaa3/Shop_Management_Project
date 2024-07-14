<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addcustomers.css">
    <link rel="stylesheet" href=
"https://use.fontawesome.com/releases/v5.15.3/css/all.css"
		integrity=
"sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
		crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>Register</title>
</head>
<body>
    <form action="owneraccountsadd.php" id="form" method="post">
    <i class="fa fa-arrow-left fa-1x mt-4 mx-3 text-white" onclick="goBack()"></i>
   
    <div class="container">
        <img src="add.png">
            <h1>Add Customers</h1>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" autocomplete="off"id="username" name="username" placeholder="Enter Username">
                <div class="error"></div>
            </div>
            <div class="input-group">
                <label for="mobilenumber">Mobilenumber</label>
                <input type="number" autocomplete="off" id="mobilenumber" name="mobilenumber"  placeholder="Enter Mobilenumber">
                <div class="error"></div>
            </div>
            
            <button type="submit">Add</button>
        </form>
    </div>
    <script src="addcustomer.js"></script>
    <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>
</html>