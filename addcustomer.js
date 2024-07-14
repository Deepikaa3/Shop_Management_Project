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
