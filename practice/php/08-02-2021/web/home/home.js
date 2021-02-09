$(document).ready(function () {
  $("#logout-btn").on("click", function (e) {
    e.preventDefault();
    if (confirm("Do u want to logout?")) {
      $.ajax({
        type: "GET",
        url: "logout.php",
        success: function (response) {
          if (response == 1) {
            window.location.href = "../index.php";
          }
        },
      });
    }
  });

  $("#addName").click(function (e) {
    e.preventDefault();

    var value = $("#name").val();

    if (value.length == 0) {
      $("#error-name").text("required name");
    } else {
      $("#error-name").text("");
      addName(value);
    }
  });
});

function addName(name) {
  $.ajax({
    type: "POST",
    url: "../db/addName.php",
    data: { name: name },
    success: function (response) {
      if (response == 1) {
        alert("name added");
        getAllNames();
      } else {
        alert("sorry name didn't added ,due to "+response);
      }
    },
  });
}

function getAllNames() {
  $.ajax({
    type: "POST",
    url: "../db/getAllNames.php",
    success: function (response) {
      $("#display-names").html(response);
    },
  });
}


getAllNames();
