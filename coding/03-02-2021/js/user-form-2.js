var months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

let selectMonth = document.getElementById("month");

for (const month of months) {
  let option = document.createElement("option");
  option.value = month;
  option.text = month;
  selectMonth.appendChild(option);
}

let selectDay = document.getElementById("day");

for (let i = 1; i <= 31; i++) {
  let option = document.createElement("option");
  option.value = i;
  option.text = i;
  selectDay.appendChild(option);
}

let selectYear = document.getElementById("year");

for (let i = 1990; i <= new Date().getFullYear(); i++) {
  let option = document.createElement("option");
  option.value = i;
  option.text = i;
  selectYear.appendChild(option);
}

let btnSubmit = document.getElementById("btnSubmit");

let textName = document.getElementById("firstname");

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

// if refresh then form will not submit again

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}