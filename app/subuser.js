/*
    logout function when user click logout

    then it will remove from session and and logout time in localstorage 
*/
function logout() {
  let usersLogoutTime = localStorage.getItem("userLogoutTime")
    ? JSON.parse(localStorage.getItem("userLogoutTime"))
    : [];
  usersLogoutTime.push({
    name: sessionStorage.getItem("username"),
    time: new Date(),
  });
  usersLogoutTime.push(userLoginObj);

  localStorage.setItem("userLogoutTime", JSON.stringify(usersLogoutTime));
  sessionStorage.clear();

  window.location.href = "login.html";
}



