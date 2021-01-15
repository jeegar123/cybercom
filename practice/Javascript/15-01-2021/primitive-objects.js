//  primitive store directly data 
// object store refrence

let user = "test"; 
let user1= user;    // store data directly of user to user1
user = "test user";


console.log(user1);     // it will not change 


let elon ={
    name :'Elon',
    age :46
}


let elon2 =elon;        // store refrence of elon to elon2
elon.age =47;
console.log(elon2);             // it will chnage



function changeValues(name,tmpElon){
    name ="nothing";
    tmpElon.age =23;
}


changeValues(user1,elon2);
console.log(user1);     // no chang beczu its passvalue in function
console.log(elon2.age); // changed becz of refrence