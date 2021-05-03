$(document).ready(function(){
    $.ajax({
        method: 'post',
        url: 'includes/cars.php',
        data: {getFeatureCar:1},
        success: function (response) {
           let result = JSON.parse(response)
           
           let html = ``
           if (result.res == "SUCCESS") {
            $.each(result.data, function (index, value) {
              html += `
                      <div class="col-lg-4 .view_car">
                       <div class="trainer-item">
                           <div class="image-thumb">
                           <a href="javascriot:void()" data-car="${value.vid}" class="view_car"><img src="dashboard/images/${value.feature_image}" alt="" class="car-image"></a>
                           </div>
                           <div class="down-content">
                               <span>
                                   <sup>₹</sup>${value.price}
                               </span>
   
                               <a href="#" data-car="${value.vid}" class="view_car"> <h4>${value.title} </h4></a>
   
                               <p>
                                   <i class="fa fa-dashboard"></i> ${value.km}km &nbsp;&nbsp;&nbsp;
                                   <i class="fa fa-cube"></i> ${value.engine_size} cc &nbsp;&nbsp;&nbsp;
                                   <i class="fa fa-cog"></i> ${value.gearbox} &nbsp;&nbsp;&nbsp;
                               </p>
   
                               <ul class="social-icons">
                                   <li><a href="#" data-car="${value.vid}">+ View Car</a></li>
                               </ul>
                           </div>
                       </div>
                   </div>
                      `;
            });

            $('#featured_card').html(html)
        }
        }
    })

    $("body").delegate(".view_car", "click", function (e) {
        e.preventDefault();
        const carID = $(this).data("car");
    
        localStorage.setItem("carid", carID);
        window.location.href = "car-details.php";
      });
})

