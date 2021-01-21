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

  let user = new User(userName, userEmail, userPassword, new Date(userDOB));

  users.push(user);

  localStorage.setItem("users", JSON.stringify(users));
  fillTable();
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
      // tdAction.innerHTML = "<a id='edit' href'${editRow(user.name)}' >edit</a> <a id='delete' href='${deleteRow(user.name)}'>delete</a>";
      let editA = document.createElement("a");
      let deletA = document.createElement("a");
      editA.href = editRow(user.name);
      deletA.href = deleteRow(user.name);
      
      tdAction.appendChild(editA);
      tdAction.appendChild(deletA);
      
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
  for (let i = 0; i < users.length; i++) {
    if (users[i].email === email) {
      user.splice(i, 1);
    }
  }
  
}

function editRow(email) {}
