let currentDate = new Date();

let inputBirthDay = prompt('enter birthdate in YYYY/MM/DD');

// checking string size
if(inputBirthDay.length==0){
    /**
     *  if valid then code will execute otherwise
     *  asking input only(date)
     */
    while(inputBirthDay.length == 0){
        inputBirthDay = prompt('enter birthdate in YYYY/MM/DD');
    }
}

let filterBirthDate = inputBirthDay.split('/');

if(filterBirthDate.length ==3){
    let birthDate = new Date(filterBirthDate[0],filterBirthDate[1]-1,filterBirthDate[2]);

    let age = currentDate.getFullYear() - birthDate.getFullYear();
    
    
    if( age < 7 ){
        alert('You are children');
    }else if(age <18 && age >=12){
        alert('You Are Teen')
    }else if(age >=18 && age <=65){
        alert('You Are Adult')
    }else{
        alert('You are Elder')
    }
}else{
    alert("Sorry!! u missed feature due to invalid format.Refresh it");
}

