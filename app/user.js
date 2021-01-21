// user class
class User {
  constructor(name, email, password, birthdate) {
    this.name = name;
    this.email = email;
    this.password = password;
    this.birthdate = birthdate;
    this.age = new Date().getFullYear() - this.birthdate.getFullYear();
  }
}



// user array
let users = localStorage.getItem("users")
  ? JSON.parse(localStorage.getItem("users"))
  : [];
fillTable();

let btnAddUser = document
  .querySelector("button")
  .addEventListener("click", addUser);
// add user
function addUser() {
  let userName = document.getElementById("userName").value;
  let userEmail = document.getElementById("userEmail").value;
  let userPassword = document.getElementById("userPassword").value;
  let userDOB = document.getElementById("userDOB").value;

  if (isUserAlreadyCreated(userEmail)) {
    alert("user already created");
  } else {
    //   create user object
    let user = new User(userName, userEmail, userPassword, new Date(userDOB));

    users.push(user); // push to array

    localStorage.setItem("users", JSON.stringify(users));  // set to local storage
    fillTable();
  }


}

function fillTable() {
  let tbody = document.querySelector("tbody");
  console.log(users);
  if (users) {
    users.forEach((user) => {
      let tr = document.createElement("tr");
      let tdName = document.createElement("td");
      let tdEmail = document.createElement("td");
      let tdPassword = document.createElement("td");
      let tdBirthdate = document.createElement("td");
      let tdAge = document.createElement("td");
      let tdAction = document.createElement("td");
      tdName.textContent = user.name;
      tdEmail.textContent = user.email;
      tdPassword.textContent = user.password;
      let date = new Date(user.birthdate);

      tdAge.textContent = user.age;
      tdBirthdate.textContent =
        date.getDay() + "/" + date.getMonth() + "/" + date.getFullYear();

      tdAction.innerHTML =
        " <a href= '' id='edit'>edit</a>       <a href= '' id='delete'>delete</a>        ";

      tr.appendChild(tdName);
      tr.appendChild(tdEmail);
      tr.appendChild(tdPassword);
      tr.appendChild(tdBirthdate);
      tr.appendChild(tdAge);
      tr.appendChild(tdAction);
      tbody.appendChild(tr);
    });
  }
}

function deleteRow(email) {
  // delete user from users if email got matched
  for (let i = 0; i < users.length; i++) {
    if (users[i].email === email) {
      users.splice(i, 1);
    }
  }
  fillTable();
}

function editRow(email) {
  //  this will update the user when a href call this editRow method and fill to form
  for (let i = 0; i < users.length; i++) {
    if (users[i].email === email) {
      let user = users[i];
      document.getElementById("userName").value = user.name;
      document.getElementById("userEmail").value = user.email;
      document.getElementById("userPassword").value = user.password;
      document.getElementById("userDOB").value = user.birthdate;
      btnAddUser.value = "Update User";

      break;
    }
  }
}

function isUserAlreadyCreated(email) {
  //  this function check is user is already created on localstorage
  // and return true if exits
  for (let i = 0; i < users.length; i++) {
    if (users[i].email === email) {
      return true;
    }
  }
  return false;
}


function logout() {
  // logout admin
  
  sessionStorage.clear();
  // redirect to html

  window.location.href ='login.html';
}