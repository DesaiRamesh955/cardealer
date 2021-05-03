$(document).ready(function () {
  
 const v_id = localStorage.getItem('carid')
 fetchCarDetail(v_id);



  function fetchCarDetail(id) {
  
    $.ajax({
      method: "post",
      url: "includes/cars.php",
      data: { getSingleCar: id},
      success: function (response) {
         console.log(response);

        let result = JSON.parse(response);
        // console.log(result);
        if (result.res == "SUCCESS") {
          $("#car_price").text(`₹${result.data.price}`);
          $("#title").text(result.data.title);

          localStorage.setItem("uid", result.data.user);

          //extract images

          let allimages = result.data.all_images.split(",");

          //image slider
          let slider = ``;

          slider += `
                        <ol class="carousel-indicators">`;

          for (let i in allimages) {
            if (i == 0) {
              slider += `<li data-target="#carouselExampleIndicators" data-slide-to="${i}" class="active"></li>`;
            } else {
              slider += `<li data-target="#carouselExampleIndicators" data-slide-to="${i}"></li>`;
            }
          }
          // <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          // <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          // <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

          slider += `
                        </ol>
                        <div class="carousel-inner">`;

          $.each(allimages, function (index, img) {
            if (index == 0) {
              slider += `<div class="carousel-item active">
                                        <img class="d-block w-100" src="dashboard/images/${img}">
                                    </div>`;
            } else {
              slider += `<div class="carousel-item">
                                        <img class="d-block w-100" src="dashboard/images/${img}">
                                    </div>`;
            }
          });

          slider += ` </div>

                        
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        `;
          $("#carouselExampleIndicators").html(slider);

          //vehicle specs

          let specs = ``;

          specs += `
                            <div class="col-sm-6">
                                <label>Type</label>

                                <p>${result.data.type}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Make</label>

                                <p>${result.data.make}</p>
                            </div>

                            <div class="col-sm-6">
                                <label> Model</label>

                                <p>${result.data.model_name}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>First registration</label>

                                <p>${result.data.first_reg}</p>
                            </div>

                           

                            <div class="col-sm-6">
                                <label>Fuel</label>

                                <p>${result.data.fuel}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>KM</label>

                                <p>${result.data.km}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Engine size</label>

                                <p>${result.data.engine_size} cc</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Power</label>

                                <p>${result.data.power} hp</p>
                            </div>


                            <div class="col-sm-6">
                                <label>Gearbox</label>

                                <p>${result.data.gearbox}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Number of seats</label>

                                <p>${result.data.num_of_seats}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Doors</label>

                                <p>${result.data.doors}</p>
                            </div>

                            <div class="col-sm-6">
                                <label>Color</label>

                                <p>${result.data.color}</p>
                            </div>
                        `;

          $("#vehicle_specs").html(specs);

          //vehicle description

          $("#vehicle_desc").html(result.data.description);
          $("#vehicle_ext").html(result.data.extra);

          //contact detail

          let contact = `
              <div class="col-sm-6">
                <label>Name</label>

                <p>${result.contact.first_name} ${result.contact.last_name}</p>
              </div>
              <div class="col-sm-6">
                  <label>Phone</label>

                  <p>${result.contact.number} </p>
              </div>
              <div class="col-sm-6">
                  <label>Alternative phone</label>
                  <p>${result.contact.second_number}</p>
              </div>
              <div class="col-sm-6">
                  <label>Email</label>
                  <p><a href="mailto:${result.contact.email}">${result.contact.email}</a></p>
              </div>
              `;

          $("#contact").html(contact);
          $(".map").html(result.contact.map);
          $(".map iframe").attr("width", "100%");
          $(".map iframe").attr("height", "300px");
        }
      },
    });
  }

  //inquiry for vehicle

  $("#inquiry_form").on("submit", function (e) {
    e.preventDefault();

    let name = $("#name");
    let number = $("#number");
    let email = $("#email");
    let description = $("#description");
    const carId = localStorage.getItem("carid");
    const uId = localStorage.getItem("uid");

    let status = 0;

    if (!validate(name)) {
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

    if (!validate(email)) {
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

    if (status == 1) {
      $.ajax({
        method: "post",
        url: "includes/cars.php",
        data:
          $("#inquiry_form").serialize() + "&carid=" + carId + "&uid=" + uId,
        success: function (response) {
          let res = JSON.parse(response);

          if (res.status == "SUCCESS") {
            $(".msg").html(`
              <div class="alert alert-primary" role="alert">
               Submitted successfully!
            </div>
            `);
            $("#inquiry_form")[0].reset();
          } else {
            $(".msg").html(`
              <div class="alert alert-danger" role="alert">
               Submission failed!
            </div>
            `);
          }
        },
      });
    }
  });
});
