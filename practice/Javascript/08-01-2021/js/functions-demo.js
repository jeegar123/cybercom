//  functions 

//  function declaration
function checkUserForDatabase(user,password) {

    if(user === 'root@gmail.com' && password === 'root123'){
        console.log("Successfully Login");
    }else{
        console.log("username or password is invalid");
    }
    
}

checkUserForDatabase("admin@gmail.com","admin");
checkUserForDatabase("root@gmail.com","root123");



//  function expression

var fullName =function (firstName,lastName) {
    return firstName + ' ' + lastName;
 }

console.log(fullName('Jeegar','Vinodkumar'));


// inner and outer functions

function outerFunc(num) {  

    function innerFunc(){

    }

}


function addSquare(numA,numB){
    function square(num) {
        return num**2;
      }

      return square(numA) +square(numB);
}

console.log(addSquare(10,10));


// arrow function 
()=>{
    // syntax
}

let sum = (a,b) => a+b;

console.log("sum is "+sum(10,20));

// default parameter

let user = (firstName,lastName,role = "User") => firstName +' '+ lastName+ 'is '+role   ;

console.log(user('Jeegar','Vinodkumar','admin'));


// rest paramter

let seriesAdd = (...args) =>{
   return args.reduce((a,b)=>{
        return a+b;
    });
        
}

console.log(seriesAdd(1,2,3,4,5,6,7,8,9,10));


// clousres

var pet = function(name){
    console.log('outer function,name = '+name);

    var getName = function(){
        console.log("inner function name = "+name);
        return name;
    }

    return getName;
}

myPet = pet('Cat');

myPet();


let test =  (param) => {
    let name = "Vscode";

    function sayHi() {
        
        alert(name+ ' '+ param);
      }
      return sayHi;
}

let t= test('hello');
t();



