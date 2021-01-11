// arrays 

// declaration of array
let roles = ['Hr','trannie','senior-dev','junior-dev','CEO','project-manager'];

console.log(roles);  // print whole table
console.log(roles[1]); // print 2nd data
console.log(roles.length); // print length of array



// parse array
roles.forEach((item,index)=>{
    console.log(item,index);
});

roles.push("desginer"); //add last

roles.unshift("owner");// add first

console.log(roles);

console.log(roles.indexOf('trannie')); // find index no. of item

//  remove array 
/**
 *  first param  = position of element
 * second param = no. of elements want to delete
 * 
 */
roles.splice(2,1);

console.log(roles);
console.table(roles);

