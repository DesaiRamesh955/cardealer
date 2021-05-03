$(document).ready(function () {
  getProfileData();

  $("#profile_form").on("submit", function (e) {
    e.preventDefault();

    let fname = $("#fname");
    let lname = $("#lname");
    let number = $("#number");
    let alt_number = $("#alt_number");
    let email = $("#email");
    let status = 0;

    if (!validate(fname)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(lname)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(number)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(alt_number)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(email)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (status == 1) {
      $.ajax({
        method: "POST",
        url: "includes/profile.php",
        data: $("#profile_form").serialize(),
        success: function (response) {
          let res = JSON.parse(response);
          console.log(res);
          if (res.status == "SUCCESS") {
            $(".message").html(
              alertView("success", "Profile updated succesfully")
            );
          } else if (res.status == "FAILED") {
            $(".message").html(alertView("danger", "Profile update failed"));
          } else if (res.status == "EMAIL_EXIST") {
            $("#email_err").text("Email already exist");
          } else if (res.status == "MOBILE_EXIST") {
            $("#number_error").text("Mobile already exist");
          } else if (res.status == "ALT_MOBILE_EXIST") {
            $("#alt_number_error").text("Alternative number already exist");
          }
        },
      });
    }
  });

  function getProfileData() {
    $.ajax({
      method: "POST",
      url: "includes/profile.php",
      data: { getProfileData: 1 },
      success: function (response) {
        let res = JSON.parse(response);

        if (res.status == "SUCCESS") {
          $("#fname").val(res.data.first_name);
          $("#lname").val(res.data.last_name);
          $("#number").val(res.data.number);
          $("#alt_number").val(res.data.second_number);
          $("#email").val(res.data.email);
          $("#map").val(res.data.map);
        }
      },
    });
  }
});
