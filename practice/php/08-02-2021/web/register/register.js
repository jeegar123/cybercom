// form data
let firstNameText = document.getElementById("firstname");
let lastNameText = document.getElementById("lastname");
let UserNameText = document.getElementById("username");
let PasswordText = document.getElementById("password");
let ConfirmPasswordText = document.getElementById("confirmpassword");
let dob = document.getElementById("dob");

//  erros
let firstNameError = document.getElementById("error-firstname");
let lastNameError = document.getElementById("error-lastname");
let UserNameError = document.getElementById("error-username");
let PasswordError = document.getElementById("error-password");
let ConfirmPasswordError = document.getElementById("error-confirm-password");
let dobError = document.getElementById("error-dob");

function formvalidate() {
  let i = 0;
  if (firstNameText.value.length == 0) {
    firstNameError.innerText = "*First Name is required ";
    i = 1;
  } else {
    firstNameError.innerText = "";
  }
  if (lastNameText.value.length == 0) {
    lastNameError.innerText = "*Last Name is required ";
    i = 1;
  } else {
    lastNameText.innerText = "";
  }

  let username = UserNameText.value;
  let reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

  if (reg.test(username) == false) {
    UserNameError.innerText = "*email is invalid";
    i = 1;
  } else if (username.length == 0) {
    UserNameError.innerText = "*email is required";
    i = 1;
  } else {
    UserNameError.innerText = "";
  }

  let password = PasswordText.value;

  if (password.length == 0) {
    PasswordError.innerText = "*password is required";
    i = 1;
  } else if (password.length > 20) {
    PasswordError.innerText =
      "*password length should be altleast 20 characters";
    i = 1;
  } else {
    PasswordError.innerText = "";
  }

  let confirmpassword = ConfirmPasswordText.value;

  if (password !== confirmpassword) {
    ConfirmPasswordError.innerText = "*password didn't match";
    i = 1;
  } else {
    ConfirmPasswordError.innerText = "";
  }

  let date = dob.value;

  if (Date.parse(date) == NaN) {
    dobError.innerText = "invalide date";
    i = 1;
  } else {
    dobError.innerText = "";
  }

  if (i) return false;

  return true;
}

PasswordText.addEventListener("focusout", () => {
  ConfirmPasswordError.innerText = "plz add same password";
});


ConfirmPasswordText.addEventListener("focusout",()=>{
    let password = PasswordText.value;
    let confirmpassword = ConfirmPasswordText.value;
    if(password!==confirmpassword){
        ConfirmPasswordError.innerText = "plz add same password";
    }else{
        ConfirmPasswordError.innerText = "";
    }
});