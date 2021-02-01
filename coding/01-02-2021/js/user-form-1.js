let btnSubmit = document.getElementById("btnSubmit");

let textName = document.getElementById("fullname");

textName.addEventListener("keyup", () => {
  if (textName.value.length <= 0) {
    let errorMessage = "Name is required";
    document.getElementById("error-name").innerText = errorMessage;
    btnSubmit.disabled = true;
  } else {
    document.getElementById("error-name").innerText = "";
    btnSubmit.disabled = false;
  }
});

let password = document.getElementById("password");

password.addEventListener("keyup", () => {
  if (password.value.length <= 0) {
    let errorMessage = "password is required";
    document.getElementById("error-password").innerText = errorMessage;
    btnSubmit.disabled = true;
  } else {
    document.getElementById("error-password").innerText = "";
    btnSubmit.disabled = false;
  }
});

let address = document.getElementById("address");

address.addEventListener("keyup", () => {
  if (address.value.length <= 0) {
    let errorMessage = "address is required";
    document.getElementById("error-address").innerText = errorMessage;
    btnSubmit.disabled = true;
  } else {
    document.getElementById("error-address").innerText = "";
    btnSubmit.disabled = false;
  }
});

// file validation

let file = document.getElementById("file");

file.required = true;
