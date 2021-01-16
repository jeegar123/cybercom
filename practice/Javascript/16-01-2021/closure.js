// clousres

function fun1(a) {
  return function fun2(b) {
    return function fun3(c) {
      return function fun4(d) {
        return a + b + c + d;
      };
    };
  };
}

console.log(fun1(1)(2)(3)(4));
