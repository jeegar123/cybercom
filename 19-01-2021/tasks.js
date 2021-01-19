class Person {
  constructor(name, age, email, teleNumber) {
    this.name = name;
    this.age = age;
    this.email = email;
    this.teleNumber = teleNumber;
  }

  static sortDataByName(data) {
    /*
          create sort function that wil sort by names in Alphabetic order
      */
    let min, tmp;

    for (let i = 0; i < data.length; i++) {
      min = i;

      for (let j = i + 1; j < data.length; j++) {
        if (data[min].name > data[j].name) {
          min = j;
        }
      }
      tmp = data[min];
      data[min] = data[i];
      data[i] = tmp;
    }

    return data;
  }
}

//Task 1 A program to list the properties of object

let azusLaptop = {
  // propterties of object
  brandName: "Azus",
  features: {
    ram: 8, // in GB
    HDD: 1, //TB
    type: "Gaming laptop",
  },
  price: 50000,
};

//  whole object
console.log(azusLaptop);
// propetries of object
console.log(azusLaptop.brandName);
console.log(azusLaptop.features);
console.log(azusLaptop.price);

/*
Task 2. Add multiple objects in array and store it in local storage.

o Object contains the below properties,

o Name, Age, Email, Telephone Number.

o Display the multiple objects in table structure.

*/


let harry = new Person("Harry Potter", 23, "harry@gmail.com", "9191239710");
let victor = new Person("Victor Dan", 53, "victor@gmail.com", "5691239710");
let hritik = new Person("Hritik Krish", 45, "hritik@gmail.com", "2491239710");
let harsh = new Person("Harsh Mosh", 89, "harsh@gmail.com", "2191239710");

let persons = [harry, victor, harsh, hritik];

console.table(persons);

if (localStorage !== undefined) {
  localStorage.setItem("testUser", JSON.stringify(persons));
  console.log("data saved in local storage");
}
// display local data
console.log("---local data---");
console.table(JSON.parse(localStorage.getItem("testUser")));

// Task 3. A program to sort an array of objects.

// console.log(persons.sort());



console.log("---Sorted Data---");
console.table(Person.sortDataByName(persons));
