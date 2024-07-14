<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .form-group label{
        font-size: 16px;
    font-weight: 500;
    }
    #submit {
    background: $orange-color;
    color: white;
	font-size:17px;
    }
    #reset {
        margin-right: 0px;
        margin-bottom: 10px;
		font-size: 17px;
		color: black;
		padding: 10px;
        background:#999;
    }
    </style>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <form  action="owner_register.php" method="POST" class="register-form" id="register-form " style="font-size:19px;">
                        <h2>&nbsp;&nbsp;Update&nbsp; Your &nbsp;Profile</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name"> User Name :</label>
                                <input autocomplete = "off" type="text" name="username" id="username" required/>
                                <div class="error"></div>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Shop category :</label>
                                <input autocomplete = "off" type="text" name="shopcategory" id="shopcategory" required/>
                                <div class="error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address :</label>
                            <input autocomplete = "off" type="text" name="address" id="address" required/>
                            <div class="error"></div>
                        </div>
                        <div class="form-row">
                          <div class="form-group">
                            <label for="city">City :</label>
                            <input autocomplete = "off" type="text" name="city" id="city" required/>
                            <div class="error"></div>
                          </div>
                          <div class="form-group">
                            <label for="city">District :</label>
                            <input  autocomplete = "off" type="text" name="district" id="district" required/>
                            <div class="error"></div>
                        </div>
                            <div class="form-group">
                                <label for="state">State :</label>
                                <input  autocomplete = "off" type="text" name="state" id="state" required/>
                                <div class="error"></div>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label for="pincode">Pincode :</label>
                            <input autocomplete = "off"  type="number" name="pincode" id="pincode">
                            <div class="error"></div>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script>
    

    const form = document.querySelector('#register-form');
const usernameInput = document.querySelector('#username');
const shopcategoryInput = document.querySelector('#shopcategory');
const addressInput = document.querySelector('#address');
const cityInput = document.querySelector('#city');
const districtInput = document.querySelector('#district');
const stateInput = document.querySelector('#state');
const pincodeInput = document.querySelector('#pincode');

form.addEventListener('submit', (e) => {
    if (!validateInputs()) {
        e.preventDefault();
    }
});

function validateInputs() {
    const usernameVal = usernameInput.value.trim();
    const shopcategoryVal = shopcategoryInput.value.trim();
    const addressVal = addressInput.value.trim();
    const cityVal = cityInput.value.trim();
    const districtVal = districtInput.value.trim();
    const stateVal = stateInput.value.trim();
    const pincodeVal = pincodeInput.value.trim();
    let success = true;



// Rest of your validation functions remain unchanged

if(usernameVal===''){
    success=false;
    setError(usernameInput,'Username is required')
}
else{
    setSuccess(usernameInput)
}

if(shopcategoryVal===''){
    success=false;
    setError(shopcategoryInput,'Shop category is required')
}
else{
    setSuccess(shopcategoryInput)
}
if(addressVal===''){
    success=false;
    setError(addressInput,'Address is required')
}
else{
    setSuccess(addressInput)
}
if(cityVal===''){
    success=false;
    setError(cityInput,'City is required')
}
else{
    setSuccess(cityInput)
}
if(districtVal===''){
    success=false;
    setError(districtInput,'District is required')
}
else{
    setSuccess(districtInput)
}
if(stateVal===''){
    success=false;
    setError(stateInput,'State is required')
}
else{
    setSuccess(stateInput)
}
if(pincodeVal===''){
    success=false;
    setError(pincodeInput,'Pincode is required')
}
else if(!validatepincode(pincodeVal)){
    success = false;
    setError(pincodeInput,'Please enter a valid Pincode')
}
else{
    setSuccess(pincodeInput)
}

return success;

}
function setError(element,message){
const inputGroup = element.parentElement;
const errorElement = inputGroup.querySelector('.error')

errorElement.innerText = message;
inputGroup.classList.add('error')
inputGroup.classList.remove('success')
}

function setSuccess(element){
const inputGroup = element.parentElement;
const errorElement = inputGroup.querySelector('.error')

errorElement.innerText = '';
inputGroup.classList.add('success')
inputGroup.classList.remove('error')
}
function validatepincode(pincode) {
var success = true; 

if (pincode === "") {
    success = false;
} else if (isNaN(pincode)) {
    success = false;
} else if (pincode.length !== 6) {
    success = false;
} 

return success;
}

    </script>
 
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>