
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
<body onload="generate()">
    <form action="owner_login.php" id="form" method="post">
    <div class="container">
        <div class="column">
    <div class="d-flex align-items-center text-sm">
   
    <img src="logo1.png">
        <h1 style="margin-bottom: 50px; margin-top:-42px;">Login</h1>
</div> 
    </div>


           
            <div class="input-group">
                <label for="username">Shop Name</label>
                <input  autocomplete = "off" type="text" id="username" name="username" onchange="return validateInputs();"placeholder="Enter Shop Name" required>
                <div class="error" id="error"></div>
            </div>
            <div class="input-group">
                <label for="mobilenumber">Mobile Number</label>
                <input autocomplete = "off" type="text" onchange="return validateInputs();"maxlength="10" pattern="[6-9]{1}[0-9]{9}" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" required>
   <div class="error" id="merror"></div>
               
            </div>
            <div id="user-input" class="inline">
                <input autocomplete = "off" type="text"
                    id="submit" name="submit"
                    placeholder="Captcha code" oninput="return validateInputs();"/>
            </div>
        
            <div class="inline" onclick="generate()">
                <i class="fas fa-sync" style="font-size:20px;"></i>
            </div>
        
            <div id="image"
                class="inline"
                selectable="False">
            </div>
           
        
            <p id="key"></p>
            <button type="submit" name="add" value="Submit" onclick="return validatecaptcha()">Submit</button>
  <h4>Don't have an account?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="signuppage.php">Register Now</a></h4>
        </form>
    </div>
    <script src="signuppage.js"></script>
</body>
</html>