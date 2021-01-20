function myFunc() {

    let email  = document.getElementById("email").value;

    let reEmailChecked = document.getElementById("emailAgain");

    if(reEmailChecked.value !== email ){
        document.querySelector("span").textContent ="plz enter same email";
        
    }else{
        document.querySelector("span").textContent ="";
    }

}