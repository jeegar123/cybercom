// form data
let prefixSelect = document.getElementById("prefix");
let firstNameText = document.getElementById("first_name");
let lastNameText = document.getElementById("last_name");
let email = document.getElementById("email");
let mobilNumber = document.getElementById("mobile_number");
let password = document.getElementById("password");
let confirmPassword = document.getElementById("confirmpassword");
let information = document.getElementById("information");
let is_agree = document.getElementById("is_agree");

//  error
let prefixSelectError = document.getElementById("error-prefix");
let firstNameTextError = document.getElementById("error-first_name");
let lastNameTextError = document.getElementById("error-last_name");
let emailError = document.getElementById("error-email");
let mobilNumberError = document.getElementById("error-mobilenumber");
let passwordError = document.getElementById("error-password");
let confirmPasswordError = document.getElementById("error-confirmpassword");
let informationError = document.getElementById("error-information");
let is_agreeError = document.getElementById("error-is_agree");

function validateForm() {
  let i = 0;
  if (prefixSelect.value.length == 0) {
    prefixSelectError.innerText = "prefix required";
    i = 1;
  } else {
    prefixSelectError.innerText = "";
  }

  if (firstNameText.value.length == 0) {
    firstNameTextError.innerText = "first required";
    i = 1;
  } else {
    firstNameTextError.innerText = "";
  }

  if (lastNameText.value.length == 0) {
    lastNameTextError.innerText = "lastname required";
    i = 1;
  } else {
    lastNameTextError.innerText = "";
  }

  let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  let emailValue = email.value;

  if (reg.test(emailValue) == false) {
    emailError.innerText = "email is invalid";
    i = 1;
  } else if (username.length == 0) {
    emailError.innerText = "*email is required";
    i = 1;
  } else {
    emailError.innerText = "";
  }

  let passwordValue = password.value;
  if (passwordValue.length == 0) {
    passwordError.innerText = "*password is required";
    i = 1;
  } else {
    passwordError.innerText = "";
  }

  let confirmpasswordValue = confirmPassword.value;

  if (passwordValue !== confirmpasswordValue) {
    confirmPasswordError.innerText = "*password didn't match";
    i = 1;
  } else {
    confirmPasswordError.innerText = "";
  }

  if (information.value.length == 0) {
    informationError.innerText = "*information is required";
    i = 1;
  } else {
    informationError.innerText = "";
  }

  if (is_agree.value.length == 0) {
    is_agreeError = "plz accept terms and condition";
    i = 1;
  } else {
    is_agreeError = "";
  }

  if (i == 0) return true;
  else return false;
}

password.addEventListener("focusout", () => {
  confirmPasswordError.innerText = "plz add same password";
});

confirmPassword.addEventListener("focusout", () => {
  let passwordValue = password.value;
  let confirmPasswordValue = confirmPassword.value;
  if (passwordValue !== confirmPasswordValue) {
    confirmPasswordError.innerText = "plz add same password";
  } else {
    confirmPasswordError.innerText = "";
  }
});
