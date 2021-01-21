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

  // if string contains user then its user
  if (userName.includes("user")) {
    // get all users from local storage
    let users = JSON.parse(localStorage.getItem("users"));
    //  cehcking is avaliable
    let isUserExits = false;
    for (let i = 0; i < users.length; i++) {
      if (users[i].email === userName && users[i].password == userPassword) {
        // user found
        isUserExits = true;
      }
    }

    if (isUserExits) {
      if (localStorage.getItem("userLoginTime")) {
        /* 
           storing login time in local storage 
           if exits then append with userLoginTime array object
    
          */
        let usersLoginTime = JSON.parse(localStorage.getItem("userLoginTime"));
  
        usersLoginTime.push({
          name: userName,
          time: new Date(),
        });
        localStorage.setItem("userLoginTime", JSON.stringify(usersLoginTime));
      } else {
        // if local storage dont have user data
        let userLoginObj = [];
        userLoginObj.push({
          name: userName,
          time: new Date(),
        });

        localStorage.setItem("userLoginTime", JSON.stringify(userLoginObj));
      }
    } else {
      alert("invalid user");
    }

    //  storing in session
    sessionStorage.setItem("username", userName);
    window.location.href = "dashboard.html";
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
