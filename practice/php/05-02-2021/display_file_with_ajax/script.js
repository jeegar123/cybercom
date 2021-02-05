let loadButton = document.getElementById("loadButton");

let helloData = document.getElementById("hello-data");

/*
*  ajax to load file to div 
*/
loadButton.addEventListener("click", () => {
  let httRequest = new XMLHttpRequest();

  httRequest.onreadystatechange = () => {
    if (httRequest.readyState == XMLHttpRequest.DONE) {
      if (httRequest.status == 200) {
        helloData.innerText = httRequest.responseText;
      } else {
        console.log("error");
      }
    } else {
      console.log("request not ready");
    }
  };

  httRequest.open("GET", "hello.inc.php");
  httRequest.send();
});
