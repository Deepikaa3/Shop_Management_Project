
  const form = document.querySelector('#form')
const username = document.querySelector('#username');
const shopcategory = document.querySelector('#shopcategory');
const address = document.querySelector('#address');
const city = document.querySelector('#city');
const district = document.querySelector('#district');
const state = document.querySelector('#state');
const pincode = document.querySelector('#pincode');







form.addEventListener('submit',(e)=>{
    
    if(!validateInputs()){
        e.preventDefault();
    }
})

function validateInputs(){
    const usernameVal = username.value.trim()
    const shopcategory = shopcategory.value.trim();
    const address = address.value.trim();
    const city = city.value.trim();
    const district = district.value.trim();
    const state = state.value.trim();
    const pincode = pincode.value.trim();
    let success = true

    if(usernameVal===''){
        success=false;
        setError(username,'Username is required')
    }
    else{
        setSuccess(username)
    }

    if(shopcategory===''){
        success=false;
        setError(shopcategory,'Shop category is required')
    }
    else{
        setSuccess(shopcategory)
    }
    if(address===''){
        success=false;
        setError(address,'Address is required')
    }
    else{
        setSuccess(address)
    }
    if(city===''){
        success=false;
        setError(city,'City is required')
    }
    else{
        setSuccess(city)
    }
    if(district===''){
        success=false;
        setError(district,'District is required')
    }
    else{
        setSuccess(district)
    }
    if(state===''){
        success=false;
        setError(state,'State is required')
    }
    else{
        setSuccess(state)
    }
    if(pincode===''){
        success=false;
        setError(pincode,'Pincode is required')
    }
    else if(!validatepincode(pincode)){
        success = false;
        setError(pincode,'Please enter a valid Pincode')
    }
    else{
        setSuccess(pincode)
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
