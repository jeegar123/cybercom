//alert(sayHi());    // hello
// alert(sayHi);  // whole function on alert
// alert(hello); // undefined
// var hello = function sayHi() {
//     return "hello";
//   }

// alert(hello); //  whole function

// alert(hello()); // hello

var hello = "say hello";

var testExceution = () => {
  return "oh ! i exceute before i called";
};

var magic;

console.log(age); // undefined
var age = 0;
function testAgeValue() {
  console.log(age); // undefined
  console.log(this.age); // 0
  var age = 10;
  console.log(age); // 10
}
testAgeValue();
console.log(age); //0

magic = 1;

if(true){
  // so no local scope for if
  console.log(magic);  //1
  var magic =3;
  console.log(magic);//3
}

console.log(magic);//3