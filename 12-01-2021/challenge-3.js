// challenge 3

let bills = [124, 48, 268]; // bill amount in $

let tips = []; //  tips amount array

let paidAmounts = []; // final amount bill array

let tmpAmount = 0;
for (var i = 0; i < bills.length; i++) {
  tmpAmount = tipCalculator(bills[i]);
  tips[i] = tmpAmount;
  paidAmounts[i] = bills[i] + tmpAmount;
}

console.log("Tips Amount Array");
console.log(tips);

console.log("Final Paid Amount Array");
console.log(paidAmounts);

function tipCalculator(amount) {
  /*
        This function will give u tip amount
    */
  let tipAmount = 0;
  switch (amount) {
    case amount < 50:
      tipAmount = amount * 0.2;
      break;
    case amount > 50 && amount < 200:
      tipAmount = amount * 0.15;
      break;
    default:
      tipAmount = amount * 0.1;
  }
  return tipAmount;
}
