let nameInput = document.getElementById("name");
let emailInput = document.getElementById("email");
let phoneInput = document.getElementById("phone");
let titleInput = document.getElementById("title");
let createdInput = document.getElementById("created");

let nameError = document.getElementById("error-name");
let emailError = document.getElementById("error-email");
let phoneError = document.getElementById("error-phone");
let titleError = document.getElementById("error-title");

function validateForm() {
  let i = 0;

  let phoneValue = phoneInput.value;
  if (phoneValue.length == 0) {
    phoneError.innerText = "*phone is required";
    phoneInput.required = true;
    i = 1;
  } else if (parseInt(phoneValue) == NaN) {
    phoneError.innerText = "invalid number";
    i = 1;
  } else if (`${phoneValue}`.length != 10) {
    i = 1;
    phoneError.innerText = "10 mobile digit number required";
  } else {
    phoneError.innerText = "";
  }

  let nameVlaue = nameInput.value;

  if (nameVlaue.length == 0) {
    nameError.innerText = "*name is required";
    i = 1;
  } else {
    nameError.innerText = "";
  }

  let emailValue = emailInput.value;
  let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

  if (reg.test(emailValue) == false) {
    emailError.innerText = "*email is invalid";
    i = 1;
  } else if (emailValue.length == 0) {
    emailError.innerText = "*email is required";
    i = 1;
  } else {
    emailError.innerText = "";
  }

  if (i) return false;

  return true;
}



if(window.history.replaceState){
  window.history.replaceState("null", null, window.location.href);
}