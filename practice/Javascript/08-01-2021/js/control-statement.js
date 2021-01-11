console.log("Day 2");

// ternary operator

let day = "Sunday";

let days = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
];
// let date =new Date();

day == days[1] ? console.log("Its Week 1st day") : console.log("Its " + day);

switch (day) {
  case days[0]:
    console.log("Its holiday");
    break;
  case days[1]:
    console.log("It Week 1st Day");
    break;
  case days[2]:
    console.log("It Week 2nd Day");
    break;
  case day[3]:
    console.log("It Week 3rd Day");
    break;
  case days[4]:
    console.log("It Week 4th Day");
    break;
  case day[5]:
    console.log("It Week 5th Day");
    break;
  case days[6]:
    console.log("Its half working day");
    break;
  default:
      console.log("No Day");
}
