const years = [1998, 2002, 2011, 2015, 2017, 2021, 2020];

/**
 *  map function call callback func on each elemnet of array and return new array
 */
// even years
let evenYears = years.map((el) => el % 2);

console.log(years);
console.log(evenYears);

// print Even result

years.map((value, index) => {
  if (value % 2 == 0) {
    console.log(`Year ${value}`);
  }
});

let numbers = [20, 166, 21, 24, 24, 1];

let squareNumber = numbers.map((num) => num ** 2);
console.log(squareNumber);

let data = numbers.map(
  (value, index, array) => `Data on ${index + 1} and its Value =  ${value}`
);
console.log(data);

console.log(numbers);
console.log(numbers.reduce((first, prev) => first + prev));
console.log(numbers.slice(-2));
console.log(numbers.slice());
console.log(numbers.slice(0, 5));

console.log(numbers.find(num => num % 2 == 0));

document.querySelector("button").addEventListener("click", function () {
  let myString = `Change Script to arrow function`;
  alert(myString);
});


console.log(numbers.some(val => val>=20));


for(let ele of numbers ){
    console.log(ele);
}

// filter vs  map

// filter will fill values in new array  that satisfy the condition condition
// we can use filter in that sistuation where common data is thier
console.log(numbers.filter(num => num>=10));
// map will not fill values in new array  that satisfy the condition condition but it gives true/false vlaue
console.log(numbers.map(num => num>=10));


