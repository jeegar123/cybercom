let btn = document.getElementById("btnLogin");
btn.addEventListener("click", submit);
function submit() {
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;

  //   if (username === "admin@gmail.com" && password === "admin") {
  //     alert("welcome Admin");
  //     return true;
  //   } else {
  //     alert("invalid user");

  //   }

  if (username && password) {
    localStorage.setItem(
      "user",
      JSON.stringify({
        username: username,
        password: password,
      })
    );
  }
}
