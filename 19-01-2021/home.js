import { Person } from "./Person.js";

let persons = localStorage.getItem("persons")
  ? JSON.parse(localStorage.getItem("persons"))
  : [];

let btn = document.getElementById("btn");

btn.addEventListener("click", function() {
  let name = document.getElementById("name").value;
  let dob = document.getElementById("dob").value; // date of birth
  let email = document.getElementById("email").value;
  let tmp = new Person(name, dob, email);
  persons.push(tmp);
  localStorage.setItem("persons", JSON.stringify(persons));
});
