let name =document.getElementById("name");
let email =document.getElementById("email");
let subject =document.getElementById("subject");
let message =document.getElementById("message");



name.required=true;
email.required=true;
subject.required=true;
message.required=true;


if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }