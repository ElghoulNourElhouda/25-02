//AJAX
$(document).ready(function() {
  $("#signupmodal .btn-primary").click(() => {
    console.log("1");
    let data_obj = {
      cin: $("#signup-cim").val(),
      name: $("#signup-name").val(),
      lastname: $("#signup-last-name").val(),
      password: $("#signup-password").val()
    };
    $.ajax({
      url: "./scripts/signup.php",
      method: "POST",
      dataType: "json",
      data: data_obj,
      success: function(res) {
        console.log(res);
      }
    });
  });
});
