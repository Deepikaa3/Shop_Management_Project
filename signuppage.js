const form = document.querySelector('#form')
const username = document.querySelector('#username');
const mobilenumber = document.querySelector('#mobilenumber');


form.addEventListener('submit',(e)=>{
    
    if(!validateInputs()){
        e.preventDefault();
    }
})

function validateInputs(){
    const usernameVal = username.value.trim()
    const mobileVal = mobilenumber.value.trim();
    let success = true

    if(usernameVal===''){
        success=false;
        setError(username,'Username is required')
    }
    else{
        setSuccess(username)
    }

    if(mobileVal===''){
        success = false;
        
        setError(mobilenumber,'Mobilenumber is required')
    }
    else if(!validatemobile(mobileVal)){
        success = false;
        setError(mobilenumber,'Please enter a valid mobilenumber')
    }
    else{
        setSuccess(mobilenumber)
    }
    return success;

}
function validatecaptcha()
{
    const usernameVal = document.getElementById('username').value.trim();
    const mobileVal = document.getElementById('mobilenumber').value.trim();
    const usernameError = document.getElementById('error');
    const mobileError = document.getElementById('merror');

    
    let suc;
    if(printmsg())
    {
		generate();
        suc = true;
    }
    else{
        suc = false;
		generate();
    }
    if (usernameVal === '') {
        usernameError.innerText = 'Username is requried';
        suc = false;
    }
    if (mobileVal === '') {
        mobileError.innerText = 'mobilenumber is required';
        suc = false;
    }


    return suc;
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
function validatemobile(mobileVal) {
    var success = true; 

    if (mobileVal === "") {
        success = false;
    } else if (isNaN(mobileVal)) {
        success = false;
    } else if (mobileVal.length !== 10) {
        success = false;
    } else if (
        mobileVal.charAt(0) !== '9' &&
        mobileVal.charAt(0) !== '8' &&
        mobileVal.charAt(0) !== '6' &&
        mobileVal.charAt(0) !== '7'
    ) {
        success = false;
    }

    return success;
}
let captcha;
function generate() {
	document.getElementById("submit").value = "";
	captcha = document.getElementById("image");
	let uniquechar = "";

	const randomchar =
"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	for (let i = 1; i < 6; i++) {
		uniquechar += randomchar.charAt(
			Math.random() * randomchar.length)
	}

	captcha.innerHTML = uniquechar;
}

function printmsg() {
	const usr_input = document
		.getElementById("submit").value;

	if (usr_input == captcha.innerHTML) {
		let s = document.getElementById("key")
            .innerHTML = " ";
        return true;
	}
	else {
        let s = document.getElementById("key")
            .innerHTML = "Not Matched";
		return false;
	}
}