$(document).ready(function () {
  getVehicle();

  $("#addVehicle_form").submit(function (e) {
    e.preventDefault();

    let update_class = $(this).hasClass("update_vehicle");

    let title = $("#title");
    let price = $("#price");
    let type = $("#type");
    let make = $("#make");
    let model = $("#model");

    let km = $("#km");
    let fuel = $("#fuel");
    let eng_size = $("#eng_size");
    let first_reg = $("#first_reg");
    let power = $("#power");
    let gearbox = $("#gearbox");
    let no_of_seats = $("#no_of_seats");
    let doors = $("#doors");
    let colour = $("#colour");
    let description = $("#description");
    let extra = $("#extra");
    let feature_image = $("#feature_image");
    let all_images = $("#all_images");
    let visibility = $("#visibility");
    let status = 0;

    if (!validate(title)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(price)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(type)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(make)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(model)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(km)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(fuel)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(eng_size)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(first_reg)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(power)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(gearbox)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(no_of_seats)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(doors)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(colour)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(description)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!validate(extra)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }

    if (!update_class) {
      if (!validate(feature_image)) {
        status = 0;
        return false;
      } else {
        status = 1;
      }
    }

    if (!update_class) {
      if (!validate(all_images)) {
        status = 0;
        return false;
      } else {
        status = 1;
      }
    }

    if (!validate(visibility)) {
      status = 0;
      return false;
    } else {
      status = 1;
    }
    if (status == 1) {
      $.ajax({
        method: "POST",
        url: "includes/vehicle.php",
        data: new FormData($("#addVehicle_form")[0]),
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
          
          let result = JSON.parse(response);
          console.log(result.type);
          if (result.res == "SUCCESS") {
            if (result.type == "UPDATED") {
              $(".message").html(
                alertView("success", "Vehicle updated succesfully")
              );
              updateVehicle();
              $(".message").html(
                alertView("success", "Vehicle addedd succesfully")
              );
              $("#addVehicle_form")[0].reset();
            }


          } else if (result.res == "FAILED") {
            if (result.type == "UPDATED") {
              $(".message").html(
                alertView("danger", "Vehicle updating failed")
              );
              updateVehicle();
            }else {
              $(".message").html(alertView("danger", "Vehicle adding failed"));
            }
          }
        },
      });
    }
  });

  //function for get vehicle data

  function getVehicle(page = 1) {
    $.ajax({
      method: "POST",
      url: "includes/vehicle.php",
      data: { getvehicle: 1 },
      success: function (response) {
        let res = JSON.parse(response);

        let html = ``;

        if (res.msg == "NO_DATA_FOUND") {
          html += `
            <tr>
              <td colspan="8" class="text-center"><b>No data found</b></td>
            </tr>
          `;
        }

        if (res.status == "SUCCESS") {
          $.each(res.data, function (index, value) {
            html += `
               <tr>
                    <th scope="row">${value.title}</th>
                    <td>${value.model_name}</td>
                    <td>${value.first_reg}</td>
                    <td>${value.km}</td>
                    <td>${value.color}</td>
                    <td class="vehicleImage"><img src="images/${
                      value.feature_image
                    }" /></td>
                    <td>${value.active == 1 ? `Publish` : `Draft`}</td>

                    <td>
                        <a href="#" data-update="${
                          value.vid
                        }" class="btn btn-primary btn-sm vehicleUpdate"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="#" data-delete="${
                          value.vid
                        }" class="btn btn-danger btn-sm vehicleDelete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
               `;
          });
        }

        $("#vehicle_data").html(html);
      },
    });
  }

  // delete vehicle

  $("body").delegate(".vehicleDelete", "click", function () {
    const id = $(this).data("delete");

    let column = $(this).parent().parent();

    if (confirm("Are you sure?")) {
      $.ajax({
        method: "POST",
        url: "includes/vehicle.php",
        data: { DeleteVehicle: id },
        success: function (response) {
          let res = JSON.parse(response);

          if (res.status == "SUCCESS") {
            $(".message").html(
              alertView("success", "Vehicle deleted succesfully")
            );

            column.remove();
          } else {
            $(".message").html(alertView("danger", "Vehicle deletion failed"));
          }
        },
      });
    }
  });

  $("body").delegate(".vehicleUpdate", "click", function () {
    let vehicleID = $(this).data("update");
    localStorage.setItem("vehicleID", vehicleID);
    window.location.href = "index.php?page=updatevehicle";
  });

  if (getPara("page") == "updatevehicle") {
    updateVehicle();
  }

  function updateVehicle() {
    let vehicleID = localStorage.getItem("vehicleID");
    $.ajax({
      method: "POST",
      url: "includes/vehicle.php",
      data: { updatevehicle: vehicleID },
      success: function (response) {
        // console.log(response)
        let res = JSON.parse(response);

        if (res.status == "SUCCESS") {
          $("#title").val(res.data.title);
          $("#price").val(res.data.price);
          $("#type").val(res.data.type);
          $("#make").val(res.data.make);
          $("#model").val(res.data.model_name);

          $("#km").val(res.data.km);
          $("#fuel").val(res.data.fuel);
          $("#eng_size").val(res.data.engine_size);
          $("#first_reg").val(res.data.first_reg);
          $("#power").val(res.data.power);
          $("#gearbox").val(res.data.gearbox);
          $("#no_of_seats").val(res.data.num_of_seats);
          $("#doors").val(res.data.doors);
          $("#colour").val(res.data.color);
          $("#vid").val(res.data.vid);

          $("#description").html(res.data.description);
          $("#extra").html(res.data.extra);

          let feature_image = res.data.feature_image;
          $("#feature_image_show")
            .removeClass("d-none")
            .attr("src", `images/${feature_image}`);
          let all_images = res.data.all_images.split(",");
          let images_html = ``;
          console.log();
          if (all_images != "") {
            $.each(all_images, function (index, value) {
              images_html += `
            <div class="col-md-4">
                <span class="deleteImageIcon"  data-image="${value}" data-id="${res.data.vid}"><i class="fa fa-close "></i></span>
                <img data-id="${res.data.vid}" src="images/${value}">
            </div>
            `;
            });

            $(".all_images_show").html(images_html);
          } else {
            $(".all_images_show").html("<p>No images found</p>");
          }

          $("#visibility").val(res.data.active);
        }
      },
    });
  }

  $("body").delegate(".deleteImageIcon", "click", function (e) {
    let vid = $(this).data("id");
    let image = $(this).data("image");

    let column = $(this).parent();
    $.ajax({
      method: "POST",
      url: "includes/vehicle.php",
      data: { signleImageDelete: 1, vid, image },
      success: function (response) {
        let res = JSON.parse(response);

        if (res.status == "SUCCESS") {
          $(".message").html(
            alertView("success", "Vehicle updated succesfully")
          );
          column.remove();
        } else {
          $(".message").html(alertView("danger", "Vehicle updating failed"));
        }
      },
    });
  });
});
