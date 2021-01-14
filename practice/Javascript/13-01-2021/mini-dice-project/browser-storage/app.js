// check is local storage is accessible or not

displayLocalData();
// console.log(JSON.stringify(localStorage));
function addToLocalStorage() {
  if (localStorage != undefined) {
    let key = document.getElementById("key").value;
    let value = document.getElementById("value").value;

    if (key && value) {
      localStorage.setItem(key, value);
    } else {
      alert("add both key and value for localstorage");
    }
  } else {
    alert("localstorage is not accessible");
  }
}


function displayLocalData() {
    let data;
    let main =document.getElementById("main");
   if(localStorage.length!=0){
    for (var i = 0; i < localStorage.length; i++) {
        var key = localStorage.key(i);
        var value = localStorage.getItem(key);
        
        data+="key = "+key+"  value = "+value+ "<br>"
      }
    
   }
   main.innerHTML=data;

}