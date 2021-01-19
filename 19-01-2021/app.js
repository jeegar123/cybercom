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

for(const month of months){
    let option =document.createElement("option");
    option.value=month;
    option.text=month;
    selectMonth.appendChild(option);
}


let selectDay = document.getElementById("day");
    
for(let i =1;i<=31;i++){
    let option =document.createElement("option");
    option.value=i;
    option.text=i;
    selectDay.appendChild(option);
}

let selectYear = document.getElementById("year");


for(let i=1900;i<=new Date().getFullYear();i++){
    let option =document.createElement("option");
    option.value=i;
    option.text=i;
    selectYear.appendChild(option);
}

