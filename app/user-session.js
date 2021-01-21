
//  get data from local storage
let logoutLog = localStorage.getItem("userLogoutTime") ?JSON.parse(localStorage.getItem("userLogoutTime")):[];
let loginLog = localStorage.getItem("userLoginTime") ?JSON.parse(localStorage.getItem("userLoginTime")):[];



//  add log to table
for(let i =0; i<logoutLog.length;i++){
    let tbody = document.querySelector("tbody");

    let tr = document.createElement("tr");
    let tdName = document.createElement("td");
    let tdLoginTime = document.createElement("td");
    let tdLogoutTime = document.createElement("td");

    tdName.textContent = loginLog[i].name;
    tdLoginTime.textContent = loginLog[i].time;
    tdLogoutTime.textContent = logoutLog[i].time;

    tr.appendChild(tdName);
    tr.appendChild(tdLoginTime);
    tr.appendChild(tdLogoutTime);

    tbody.appendChild(tr);
}

