// challenge 4

// john data
let john = {
  fullName: "John",
  mass: 50, // in kg
  height: 2, // in m
  bmi: function () {
    return this.mass / (this.height * this.height);
  },
};

// mark data
let mark = {
  fullName: "Mark",
  mass: 70, // in kg
  height: 1.9, // in m
  bmi: function () {
    return this.mass / (this.height * this.height);
  },
};

let BMIofMark = mark.bmi();
let BMIofJohn = john.bmi();

//  checking who has higher BMi then Print result
if (BMIofMark == BMIofJohn) {
  console.log(
    "Both " +
      mark.fullName +
      " and " +
      john.fullName +
      "  have same BMI " +
      BMIofJohn
  );
} else {
  if (BMIofMark > BMIofJohn) {
    console.log(mark.fullName + " has " + BMIofMark);
  } else {
    console.log(john.fullName + " has " + BMIofJohn);
  }
}
