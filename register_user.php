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
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <form  action="user_register.php" method="POST" class="register-form" id="register-form">
                        <h2>&nbsp;&nbsp;&nbsp;Update Your Profile</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name"> User Name :</label>
                                <input type="text"  autocomplete="off"name="username" id="username" required/>
                                <div class="error"></div>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Date Of Birth :</label>
                                <input type="date" autocomplete="off" name="dob" id="dob" required/>
                                <div class="error"></div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="cars">Gender :</label>
                        <select name="gender" id="gender">
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="others">Others</option>
</select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address :</label>
                            <input type="text"  autocomplete="off"name="address" id="address" required/>
                            <div class="error"></div>
                        </div>
                        <div class="form-row">
                          <div class="form-group">
                            <label for="city">City :</label>
                            <input type="text" autocomplete="off" name="city" id="city" required/>
                            <div class="error"></div>
                          </div>
                          <div class="form-group">
                            <label for="city">District :</label>
                            <input type="text"  autocomplete="off"name="district" id="district" required/>
                            <div class="error"></div>
                        </div>
                            <div class="form-group">
                                <label for="state">State :</label>
                                <input type="text" autocomplete="off" name="state" id="state" required/>
                                <div class="error"></div>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label for="pincode">Pincode :</label>
                            <input type="number" autocomplete="off" name="pincode" id="pincode">
                            <div class="error"></div>
                        </div>
                        <div class="form-group">
                            <label for="pincode">Profression :</label>
                            <input type="text"  autocomplete="off"name="pro" id="pro">
                            <div class="error"></div>
                        </div>
                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="reset" name="reset" id="reset" />
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
const dobInput = document.querySelector('#dob');
const genderInput = document.querySelector('#gender');
const addressInput = document.querySelector('#address');
const cityInput = document.querySelector('#city');
const districtInput = document.querySelector('#district');
const stateInput = document.querySelector('#state');
const pincodeInput = document.querySelector('#pincode');
const proInput = document.querySelector('#pro');

form.addEventListener('submit', (e) => {
    if (!validateInputs()) {
        e.preventDefault();
    }
});

function validateInputs() {
    const usernameVal = usernameInput.value.trim();
    const dobVal = dobInput.value.trim();
    const genderVal = gender.value.trim();
    const addressVal = addressInput.value.trim();
    const cityVal = cityInput.value.trim();
    const districtVal = districtInput.value.trim();
    const stateVal = stateInput.value.trim();
    const pincodeVal = pincodeInput.value.trim();
    const proVal = proInput.value.trim();
    let success = true;



// Rest of your validation functions remain unchanged

if(usernameVal===''){
    success=false;
    setError(usernameInput,'Username is required')
}
else{
    setSuccess(usernameInput)
}

if(dobVal===''){
    success=false;
    setError(dobInput,'Date Of Birth is required')
}
else{
    setSuccess(dobInput)
}
if(genderVal===''){
    success=false;
    setError(genderInput,'Gender is required')
}
else{
    setSuccess(genderInput)
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
if(proVal===''){
    success=false;
    setError(proInput,'Profession is required')
}
else{
    setSuccess(proInput)
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