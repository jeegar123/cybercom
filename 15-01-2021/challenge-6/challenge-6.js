//  fibonaccie series

// 0,1,1,2,3,5,8///
/**
 *  step1:    logic adding first term and second term and store in third term
 *     step 2: second term become first term and third term become second term
 *  step 3: repeat step 1
 *
 *
 */

let btn = document.querySelector("button");

btn.addEventListener("click", function() {
  let firstTerm = 0;
  let secondTerm = 1;
  let thirdTerm = 0;

  let lastTerm = document.getElementById("lastTerm").value;
  alert("checkout put in console");

  for (var i = 1; i <= lastTerm; i++) {
    thirdTerm = firstTerm + secondTerm;
    console.log(thirdTerm);
    firstTerm = secondTerm;
    secondTerm = thirdTerm;
  }
  return false;
});
