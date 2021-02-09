$(document).ready(function () {
  $("#logout-btn").on("click", function (e) {
    e.preventDefault();
    if (confirm("Do u want to logout?")) {
      $.ajax({
        type: "GET",
        url: "logout.php",
        success: function (response) {
            if(response==1){
                window.location.href="../index.php";
            }

        }
      });
    }
  });
});
