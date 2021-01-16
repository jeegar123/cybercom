// IIFE Functions


let number = 10;

(function(){
    // data privacy use
    number *=20;
})();

console.log(number);


(function(arg){
    //use for  data privacy 
    // not reusable if needed
    number *=arg;
})(12);

console.log(number);
