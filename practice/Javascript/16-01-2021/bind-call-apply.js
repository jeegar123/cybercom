let laptop = {
  brandName: "Azus zenbook",
  ram: 6, // in GB
  features: ["HD Display", "Sonic Speaker", "Gaming Laptop"],
  getFeatures: function () {
    return "Laptop Name :" + this.brandName + "\nRam is " + this.ram + " GB\n"+"Features of Laptop are:\n"+this.features.toString();
  }
};


let detailsOfComputer = function (review) {  
    return this.getFeatures() + "\n\nMy review is "+review;
}



console.log(laptop);

//  bind object and with extra paarmter
// create copy of deatilsof compuer funcion
let laptopFeaturers = detailsOfComputer.bind(laptop,"nice");
console.log(laptopFeaturers());




let acer ={
    brandName :"acer",
    ram:8,
    features:["Gaming Laptop","10 hr battery life per day","touching"]
}


// console.log(acerFeatures());

// calls the getFeatures function of laptop object from acer
console.log(laptop.getFeatures.call(acer));




console.log(detailsOfComputer.apply(laptop,["nice"]));

















