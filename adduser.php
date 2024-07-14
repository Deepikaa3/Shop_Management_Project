
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signuppage.css">
    <link rel="stylesheet" href=
"https://use.fontawesome.com/releases/v5.15.3/css/all.css"
		integrity=
"sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
		crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <form action="adduser2.php" id="form" method="post">
    <div class="container">
            <h1>Add Customers</h1>
            <div class="input-group">
                <label for="username">User Name</label>
                <input  autocomplete = "off" type="text" id="username" name="username" oninput="return validateInputs();"placeholder="Enter Shop Name" required>
                <div class="error" id="error"></div>
            </div>
            <div class="input-group">
                <label for="mobilenumber">Mobile Number</label>
                <input autocomplete = "off" type="text" onchange="return validateInputs();"maxlength="10" pattern="[6-9]{1}[0-9]{9}" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" required>
   <div class="error" id="merror"></div>
               
            </div>
           
            <button type="submit" name="add" value="Submit">Submit</button>
  <h4>Already Existing Customer?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="sample1.php">Click Here</a></h4>
  <h4>New Customer?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="adduser.php">Add Here</a></h4>
     
</form>
    </div>
    <script src="signuppage.js"></script>
</body>
</html>