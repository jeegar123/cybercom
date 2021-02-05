// form data

let btnSubmit = document.getElementById("btnSubmit");

var nameInput = document.getElementById("name");
var usernameInput = document.getElementById("username");
var passwordInput = document.getElementById("password");

loadUsers();

btnSubmit.addEventListener("click", (e) => {
  e.preventDefault();

  let name = nameInput.value;
  let username = usernameInput.value;
  let password = passwordInput.value;

  let error_name = document.getElementById("error-name");
  let error_username = document.getElementById("error-username");
  let error_password = document.getElementById("error-password");

  let i = 0;

  if (name.length == 0) {
    error_name.innerText = "name is required";
    i++;
  } else {
    error_name.innerText = "";
  }

  if (username.length == 0) {
    error_username.innerText = "Email is required";
    i += 1;
  } else {
    error_username.innerText = "";
  }

  if (password.length == 0) {
    error_password.innerText = "Password is required";
    i += 1;
  } else if (password.length >= 8) {
    error_password.innerText = "Password should At least 8 Characters";
    i += 1;
  } else {
    error_password.innerText = "";
  }

  if (i == 0) {
    addUser(name, username, password);
  }
});

function addUser(name, username, password) {
  let httpRequest = new XMLHttpRequest();

  httpRequest.onreadystatechange = () => {
    if ((httpRequest.readyState = XMLHttpRequest.DONE)) {
      if (httpRequest.status == 200) {
        if (httpRequest.responseText == 1) {
          alert("User Added in database");
          loadUsers();
          reset();
        }else{
          // alert("User not added");
        }
      }
    }
  };

  httpRequest.open(
    "GET",
    `./db/addUser.php?name=${name}&username=${username}&password=${password}`
  );
  httpRequest.send();
}

window.history.replaceState("null", null, window.location.href);

function reset() {
  nameInput.value = "";
  usernameInput.value = "";
  passwordInput.value = "";
}

function loadUsers() {
  let displayDiv = document.getElementById("display-data");
  let httpRequest = new XMLHttpRequest();
  httpRequest.onreadystatechange = () => {
    if ((httpRequest.readyState = XMLHttpRequest.DONE)) {
      if (httpRequest.status == 200) {
        displayDiv.innerHTML = httpRequest.responseText;
      }
    }
  };

  httpRequest.open("GET", `./db/getAllUser.php`);
  httpRequest.send();
}
