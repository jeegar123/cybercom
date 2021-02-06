let createButton =document.getElementById("btn-create-user");


createButton.addEventListener("click",()=>{

    window.location.href = "create.php";
})





$(document).ready(function () {
    
    $.ajax({
        type: "GET",
        url: "./db/viewAllContacts.php",
        success: function (response) {
            $("#display-data").html(response);
        }
    });

 

});

$(document).ready(function () {
    $(".deleteBtn").click(function () {
        var userID = $(this).attr("data-id");
        alert("a");
    
        // $.ajax({
        //   type: "POST",
        //   url: "./db/delete.php",
        //   data: { id: userID },
        //   success: function (response) {
        //     $('#display-data').html(response);
        //   },
        // });
      });    
});
