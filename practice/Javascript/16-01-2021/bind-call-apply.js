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

// create copy of laptop and bind with acer 
let acerFeatures =laptop.getFeatures.bind(acer);

console.log(acerFeatures());















