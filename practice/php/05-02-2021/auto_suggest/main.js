let searchInput = document.getElementById("name");

searchInput.addEventListener("keyup", searchUserByName);

let searchedDataDiv = document.getElementById("searched-data");

function searchUserByName() {
  let searchValue = searchInput.value;

  if (searchValue.length != 0) {
    searchedDataDiv.innerHTML = "";

    let httpRequest = new XMLHttpRequest();
    
    httpRequest.onreadystatechange = () => {
      if (
        httpRequest.readyState == XMLHttpRequest.DONE &&
        httpRequest.status == 200
      ) {
        let searchedData = JSON.parse(httpRequest.responseText);
        let searchedList = document.createElement("ul");
        if (searchedData.length) {
          searchedData.forEach((element) => {
            searchedList.appendChild(createSearchedItem(element));
          });

          searchedDataDiv.appendChild(searchedList);
        } else {
          searchedDataDiv.innerText = "no name found";
        }
      }
    };

    httpRequest.open("GET", "./db/database.php?name=" + searchValue);
    httpRequest.send();
  } else {
    searchedDataDiv.innerText = "";
  }
}

function createSearchedItem(name) {
  let searchedItem = document.createElement("li");
  searchedItem.value = name;
  searchedItem.textContent = name;
  return searchedItem;
}



