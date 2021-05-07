$(document).ready(function () {
    $.ajax({
        method: "POST",
        url: "includes/vehicle.php",
        data: { getAllData: 1 },
        success: function (response) {
          let res = JSON.parse(response)
          console.log(res)

          $('#vehicles').text(res.vehicles)
          $('#inquiry').text(res.inquiry)
        },
      });
  });
