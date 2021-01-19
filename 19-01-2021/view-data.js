
let persons = JSON.parse(localStorage.getItem("persons"));

if (persons) {
  let tbody = document.querySelector("tbody");

  persons.forEach((person) => {
    let i =1;
    let tr = document.createElement("tr");
    let srnoTd = document.createElement("td");
    let nameTd = document.createElement("td");
    let dobTd = document.createElement("td");
    let emailTD = document.createElement("td");

    srnoTd.textContent =`${i}`;
    nameTd.textContent =person.name;
    dobTd.textContent =person.dob;
    emailTD.textContent =person.email;

    tr.appendChild(srnoTd);
    tr.appendChild(nameTd);
    tr.appendChild(dobTd);
    tr.appendChild(emailTD);

    tbody.appendChild(tr);
    i++;
  });
}
