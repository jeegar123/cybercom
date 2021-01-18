//  destructure of object
//  separate values
let harry = ["Harry Potter", 23, "USA"];

const [fullName, age, country, test] = harry;

console.log(fullName);
console.log(age);
console.log(country);
// console.log(test);

// main use of  destructure is for returning multiple value
function pow(num, exp) {
  return [num, num ** exp];
}


const [num,exp] = pow(10,2);

console.log(`${num}  = ${exp}`);


document.querySelector("button").addEventListener("click", function () {
    let myString = `Change Script to arrow function`;
    alert(myString);
  });