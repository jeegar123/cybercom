let password = document.getElementById("password");
let email = document.getElementById("email");
password.required = true;
email.required = true;


if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
}