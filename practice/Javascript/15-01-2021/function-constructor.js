// object and functions

/**
 *
 * inheritence of object
 *  object -> Electronics
 */

// object
let Electronics = function (name, price, review) {
  this.name = name;
  this.price = price;
  this.review = review;
};

// inheritence
Electronics.prototype.isFiveStars = function () {
  return this.review >= 5;
};

let laptop = new Electronics("azus laptop", 40000, 4.3);
console.log(laptop);

let pc = new Electronics("LG Laptop", 30000, 5.0);

console.log(pc.__proto__ === Electronics.prototype);    // true pc is instance of Electronics 

console.log(pc.hasOwnProperty('name'));

console.info([1,2]);