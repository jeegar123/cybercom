import {Admin} from '../class/Admin.js';   // import Admin class from 





function onSubmit() {
  //  get data from Regsiter form
  let adminName = document.getElementById("adminName").value;
  let adminEmail = document.getElementById("adminEmail").value;
  let adminPassword = document.getElementById("adminPassword").value;
  let adminCity = document.getElementById("cities").value;
  let adminState = document.getElementById("states").value;
  let isAdminAgreeOnTermsAndCondition = document.getElementById(
    "checkTermsAndCondition"
  );

//    checking is admin is thier
    if(!isAdminExits(adminEmail)){
        
        let admin =new Admin(adminEmail,adminEmail,adminPassword,adminCity,adminState); // create admin object

        // add admin data in localstorage
        localStorage.setItem("admin",JSON.stringify(admin));
    }

}

function isAdminExits(email) {
  let admin = localStorage.getItem("admin")
    ? JSON.parse(localStorage.getItem("admin"))
    : undefined;

    return admin.email === email;
}
