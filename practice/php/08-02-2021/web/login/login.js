let userNameText = document.getElementById("username");
let passwordText = document.getElementById("password");

let UserNameError = document.getElementById("error-username");
let PasswordError = document.getElementById("error-password");

function validateForm() {
  let username = userNameText.value;
  let password = passwordText.value;
  let i = 0;

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

  if (i) return false;

  return true;
}
