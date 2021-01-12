// objects and properties
// dont use arrow function in object becz it will not bound with this it will bound with parent this
let jeegar = {
  firstName: "Jeegar",
  lastName: "Vinodkumar",
  city: "Diu",
  university: "RK University",
  company: "CyberCom Creation",
  social_profile_links: {
    linkdin: "xyz",
    instagram: "xyz1",
    facebook: "xyz123",
  },
  birthday: "26/11/1998",
  physical_details: {
    weight: 50, // in kg
    height: 162, //in cm
  },
  marks: [20, 20, 15, 20],
  display : function(){
    console.log(this);
  }
}


jeegar.display();


// javascript console is easy to access objects

// console.log(Object.keys(jeegar));
// loops  in for index
for (const key in jeegar) {
    if (Object.hasOwnProperty.call(jeegar, key)) {
        console.log(jeegar[key])       
    }
}


