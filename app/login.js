// check admin if exits

/*
    when user click login btn then 
    it invoke login() method
*/

// let admin =JSON.parse(localStorage.getItem("admin"));
// console.log(admin.password);

function login() {
  // getting form data
  let userName = document.getElementById("username").value;
  let userPassword = document.getElementById("userPassword").value;

  if (userName.includes("user")) {
    // if string contains user then its user
    if (localStorage.getItem("userLoginTime")) {
      /* 
       storing login time in local storage 
       if exits then append with userLoginTime array object

      */
      let usersLoginTime = JSON.parse(localStorage.getItem("userLoginTime"));
      let userLoginObj = [];
      userLoginObj.push({
        userName: new Date(),
      });
      usersLoginTime.push(userLoginObj);

      localStorage.setItem("userLoginTime", JSON.stringify(userLoginObj));

    } else {
      
      let userLoginObj = [];
      userLoginObj.push({
        userName: new Date(),
      });

      localStorage.setItem("userLoginTime", JSON.stringify(userLoginObj));

    }
    //  stroing in session
    sessionStorage.setItem("user", "active");
    window.location.href = "./dashboard.html";
  } else {
    // if string doesnt contain user then admin
    let admin = JSON.parse(localStorage.getItem("admin"));

    if (userName === admin.email) {
      // redirect to dashboard
      sessionStorage("adminlogintime", new Date());
      window.location.href = "dashboard.html";
    } else {
      alert("wrong password or username");
    }
  }
}

function isAdminExits(email) {
  let admin = localStorage.getItem("admin")
    ? JSON.parse(localStorage.getItem("admin"))
    : undefined;

  return admin.email === email;
}
