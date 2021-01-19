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
let states = [
  "Andhra Pradesh",
  "Arunachal Pradesh",
  "Assam",
  "Bihar",
  "Chhattisgarh",
  "Goa",
  "Gujarat",
  "Haryana",
  "Himachal Pradesh",
  "Jammu and Kashmir",
  "Jharkhand",
  "Karnataka",
  "Kerala",
  "Madhya Pradesh",
  "Maharashtra",
  "Manipur",
  "Meghalaya",
  "Mizoram",
  "Nagaland",
  "Odisha",
  "Punjab",
  "Rajasthan",
  "Sikkim",
  "Tamil Nadu",
  "Telangana",
  "Tripura",
  "Uttarakhand",
  "Uttar Pradesh",
  "West Bengal",
  "Andaman and Nicobar Islands",
  "Chandigarh",
  "Dadra and Nagar Haveli",
  "Daman and Diu",
  "Delhi",
  "Lakshadweep",
  "Puducherry"
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

for (let i = 1900; i <= new Date().getFullYear(); i++) {
  let option = document.createElement("option");
  option.value = i;
  option.text = i;
  selectYear.appendChild(option);
}

let selectState = document.getElementById("state");

for (let i = 0; i < states.length; i++) {
  let tmp = states[i];
  let option = document.createElement("option");
  option.value = tmp;
  option.text = tmp;
  selectState.appendChild(option);
}
