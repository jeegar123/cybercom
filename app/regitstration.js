// admin class
class Admin{

  constructor(name,email,password,city,state,isAgreeTermsAndCondition){
      this.name =name;
      this.email =email;
      this.password =password;
      this.city =city;
      this.state =state;
      this.isAgreeTermsAndCondition =isAgreeTermsAndCondition;
  }

}
//  states
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


if(localStorage.getItem("isRegister")){
  document.getElementById("btnRegister").style.visibility ="hidden";
  document.querySelector(".message").textContent ="You already registered";
  }

// fill states in select menu
let selectState = document.getElementById("states");

for (let i = 0; i < states.length; i++) {
  let tmp = states[i];
  let option = document.createElement("option");
  option.value = tmp;
  option.text = tmp;
  selectState.appendChild(option);
}

// add click listner

document.getElementById("btnRegister").addEventListener("click",onSubmit);


// register btn click
function onSubmit() {
  //  get data from Regsiter form
  let adminName = document.getElementById("adminName").value;
  let adminEmail = document.getElementById("adminEmail").value;
  let adminPassword = document.getElementById("adminPassword").value;
  let adminCity = document.getElementById("cities").value;
  let adminState = document.getElementById("states").value;
  let isAdminAgreeOnTermsAndCondition = document.getElementById(
    "checkTermsAndCondition"
  ).value;
  

//    checking is admin is thier
    if(!localStorage.getItem("admin")){
        
        let admin =new Admin(adminName,adminEmail,adminPassword,adminCity,adminState,isAdminAgreeOnTermsAndCondition); // create admin object
      
        console.log(admin);
        // add admin data in localstorage
        localStorage.setItem("admin",JSON.stringify(admin));
        
        // status of admin is register
        localStorage.setItem("isRegister",1);

        // set hidden btn
        document.getElementById("btnRegister").style.visibility ="hidden";
        
        // redirect page
        window.location.href = "login.html";
    }

}

//  re check password on key up event
document.getElementById("adminConfirmPassword").addEventListener("keyup",checkPassword);

function checkPassword(){

  let adminPassword = document.getElementById("adminPassword").value;
  let rePassword = document.getElementById("adminConfirmPassword").value;
  
  if(adminPassword !== rePassword){
    document.querySelector(".password-error-message").textContent ="password doesnt match";
  }else{
    document.querySelector(".password-error-message").textContent ="";
  }
}









// function isAdminExits(email) {
//   let admin = localStorage.getItem("admin")
//     ? JSON.parse(localStorage.getItem("admin"))
//     : undefined;

//     return admin.email === email;
// }




