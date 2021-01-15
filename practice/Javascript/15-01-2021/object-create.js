//  object .create()


// proto
let PhoneProto = {
    isItFiverStars : function() {
        return this.review ===5;
    }
  }

//   directly create object 
let sumsung = Object.create(PhoneProto);
sumsung.name  = "S10";
sumsung.price =42000;
sumsung.review =5;

console.log(sumsung);
console.log(sumsung.isItFiverStars());