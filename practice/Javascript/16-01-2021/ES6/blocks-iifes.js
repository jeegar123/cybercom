//  block and iifes

{
  //  block in es6 ,data privacy or encapsulated
  //  not accessible out side except var
  var jeeRollno = 12;
  let teeRollno = 13;
  const roll = 11;
}

console.log(jeeRollno);
// console.log(teeRollno);  // ReferenceError: teeRollno is not defined
// console.log(roll); // ReferenceError: roll is not defined

(function () {
    //  all data encapulsated
  var jeeRollno = 13;
  let teeRollno = 13;
  const roll = 11;
})();

console.log(jeeRollno);
