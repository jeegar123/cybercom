let user = JSON.parse(localStorage.getItem("user"));

if (user.username === "admin@gmail.com" && user.password === "admin") {
  document.querySelector(".valid-user").textContent = "Welcome Admin";
  document.querySelector("main").style.display = "block";
} else {
  document.querySelector(".invalid-user").textContent = "Sorry!invaid User";
  document.querySelector("main").style.display = "none";
}

filterTable.addEventListener("keyup", filter);

function filter() {
  let filterTable = document.getElementById("filterTable").value;
  let tbody = document.querySelector("tbody");

  let rows = tbody.querySelectorAll("tr");

  for (let index = 0; index < rows.length; index++) {
    var td = Array.from(rows[index].querySelectorAll("td"));

    if (td[1].textContent.toLowerCase().includes(filterTable.toLowerCase())) {
        
    }else{
        rows[index].style.display ='none';
    }
    
  }
}
