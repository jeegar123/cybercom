let createButton = document.getElementById("btn-create-user");

createButton.addEventListener("click", () => {
  window.location.href = "create.php";
});

$(document).ready(function () {
  $(document).on("click", ".deleteBtn", function (e) {
    e.preventDefault();
    var userID = $(this).attr("data-id");
    if (confirm("Do really want to delete contact?")) {
      $.ajax({
        type: "POST",
        url: "./db/delete.php",
        data: { id: userID },
        dataType: "text",
        success: function (response) {
          if (response == 3) {
            viewAllUser();
          }
        },
      });
    }
  });

  $(document).on("click", ".pagination a", function (e) {
    e.preventDefault();
    var page_no = $(this).attr("data-id");
    viewAllUser(page_no);
  });
  viewAllUser();
});

function viewAllUser(page = 0) {
  $.ajax({
    type: "POST",
    url: "./db/viewAllContacts.php",
    data:{page_no:page},
    success: function (response) {
      $("#display-data").html(response);
    },
  });
}

if (window.history.back) {
  window.history.replaceState(null, null, window.location.href);
}
