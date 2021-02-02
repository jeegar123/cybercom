let file = document.getElementById("file");
file.required = true;

let fullname = document.getElementById("fullname");
fullname.required = true;

let password = document.getElementById("password");
password.required = true;


let address = document.getElementById("address");
address.required = true;

let age = document.getElementById("age");
age.required = true;


for (let i = 1; i <= 120; i++) {
  let option = document.createElement("option");
  option.value = i;
  option.textContent = i;
  age.appendChild(option);
}

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}