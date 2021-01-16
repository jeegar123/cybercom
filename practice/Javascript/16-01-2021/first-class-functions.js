/*
    First Class Functions

*/
function testLuck(num) {
  if (num == Math.round(Math.random() * 100)) {

    return function () {
      // anonymous function    without name
      console.log("U Win 5$ google gift card");
    };
  } else {
    return function () {
    // clousr 
      let tmp = num;
      let div;
      let tmpNum = 0;
      while (num > 0) {
        div = num % 10;
        tmpNum = tmpNum * 10 + div;
        num =parseInt(num/10);
      }

      if (tmpNum == tmp) {
        console.log("You Win ,collect price here");
      } else {
        console.log("sorry,better luck next time");
      }
    };
  }
}

//  calling first class
let hero = testLuck(121);
hero();

//  another way to call first class
testLuck(121)();
