$(document).ready(function () {
  $(document).on("click", ".deleteCategory", function (e) {
    e.preventDefault();
    if (confirm("Do You really want to delete?")) {
      var id = $(this).attr("data-id");
      $.ajax({
        type: "POST",
        url: "../db/deleteCategory.php",
        data: { id: id },
        success: function (response) {
          if (response == 1) {
            getAllCategory();
          }
        },
      });
    }
  });
  getAllCategory();
});


function getAllCategory(){
    $.ajax({
        type: "POST",
        url: "../db/getAllCategory.php",
        success: function (response) {
          $("#display-data").html(response);
        },
      });

}

