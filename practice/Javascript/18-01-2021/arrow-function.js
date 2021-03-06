let mybtn = {
  elementName: "My Button",
  value: 20,
  clickMe: function () {
    document.querySelector("button").addEventListener(
      "click",
      function () {
        // ES5
        // now this function will point to global ,beczuse now sharing in lexical
        let myString = `Element Name ${this.elementName} and value is ${this.value}`;
        alert(myString);
      }.bind(this)
    );
  },
};

// mybtn.clickMe();

let mybtn2 = {
  elementName: "My Button",
  value: 20,
  clickMe: function () {
    document.querySelector("button").addEventListener("click", () => {
      // ES6
      // arrow function will share lexical scope for this
      let myString = `Element Name ${this.elementName} and value is ${this.value}`;
      alert(myString);
    });
  },
};

mybtn2.clickMe();

// let num = 10;

let testObject = {
  num: 12,
  testP: () => {
    return this.num;
  },
};

function people(name) {
  this.name = name;
  this.testP = () => {
    return this.name;
  };
}

console.log(new people("hello").testP());
