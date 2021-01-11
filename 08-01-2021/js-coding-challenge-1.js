/*
    CODING CHALLENGE 1
*/

// mark data
let markWeight = 70 ;
let markHeight = 1.9;

// john data
let johnWeight  = 50;
let johnHeight = 2;

// calulating bmi of mark and john
let BMIofMark = markWeight / (markHeight * markHeight);
let BMIofJohn = johnWeight / (johnHeight * johnHeight);

// checking mark's BMI is higher than John
let isMarkBMIHigher = BMIofMark > BMIofJohn;

console.log("Is Mark's BMI higher than John's? "+isMarkBMIHigher );






