// pass function as argument  or callback

let random10Values = function () {
  let values = [];
  for (let i = 0; i < 10; i++) {
    values.push(Math.round(Math.random() * i + 1));
  }
  return values;
};

let data = random10Values();
console.log(data);

function performOperationsOnData(tmp, fn) {
  let results = [];
  for (var i = 0; i < tmp.length; i++) {
    results.push(fn(tmp[i]));
  }
  return results;
}


function findEvenNumber(element) {
    return element%2 ==0 ?element : undefined;
  }


  let evenNumberData = performOperationsOnData(data,findEvenNumber);
  console.log(evenNumberData);

  function mul10(element) {
        return element *10;
  }


  console.log(performOperationsOnData(data,mul10));
