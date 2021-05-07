$(document).ready(function () {
  fetchCars(1);

  function fetchCars(page) {
    $.ajax({
      method: "post",
      url: "includes/cars.php",
      data: { getCars: 1, page: page },
      success: function (response) {
        console.log(response);
        let result = JSON.parse(response);

        let html = ``;
        let pagination = ``;
        if (result.res == "SUCCESS") {
          $.each(result.data, function (index, value) {
            html += `
                    <div class="col-lg-4">
                     <div class="trainer-item">
                         <div class="image-thumb">
                             <a href="javascript:void()" data-car="${value.vid}" class="view_car"><img src="dashboard/images/${value.feature_image}" alt="" class="car-image"></a>
                         </div>
                         <div class="down-content">
                             <span>
                                 <sup>₹</sup>${value.price}
                             </span>
 
                            
                             <a href="javascript:void()" data-car="${value.vid}" class="view_car"> <h4>${value.title} </h4></a>
                             <ul class="social-icons">
                                <li></li>
                            </ul>
                             <p>
                                 <i class="fa fa-dashboard"></i> ${value.km}km &nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-cube"></i> ${value.engine_size} cc &nbsp;&nbsp;&nbsp;
                                 <i class="fa fa-cog"></i> ${value.gearbox} &nbsp;&nbsp;&nbsp;
                             </p>
 
                            
                         </div>
                     </div>
                 </div>
                    `;
          });

          $(".car-container").html(html);

          //pagination
          let pages = result.totalPage;

          if (page > 1) {
            pagination += `
                        <li class="page-item" id="prevBtn">
                            <a class="page-link" href="" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        `;
          }

          let ShowPagesBefore = page > 2 ? page - 2 : 1;
          let ShowPagesAfter = page < pages - 2 ? page + 2 : pages;

          for (let i = ShowPagesBefore; i <= ShowPagesAfter; i++) {
            if (page == i) {
              pagination += `
                                <li class="page-item active"><a data-page="${i}" class="page-link currentPage pagination-btn" href="">${i}</a></li>
                           
                            `;
            } else {
              pagination += `
                                <li class="page-item"><a data-page="${i}" class="page-link pagination-btn" href="">${i}</a></li>
                           
                            `;
            }
          }
          if (page < pages) {
            pagination += `
                            <li class="page-item" id="nextBtn">
                                <a class="page-link" href="javascript:void()" aria-label="Previous">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            `;
          }

          $("#cars_pagination").html(pagination);
          //pagination end
        }
      },
    });
  }

  $("body").delegate(".pagination-btn", "click", function (e) {
    e.preventDefault();
    let page = $(this).data("page");
    fetchCars(page);
  });

  $("body").delegate("#prevBtn", "click", function (e) {
    e.preventDefault();

    let cur_page = $(".currentPage").data("page");

    fetchCars(cur_page - 1);
  });

  $("body").delegate("#nextBtn", "click", function (e) {
    e.preventDefault();
    let cur_page = $(".currentPage").data("page");
    fetchCars(cur_page + 1);
  });

  //view single car

  $("body").delegate(".view_car", "click", function (e) {
    e.preventDefault();
    const carID = $(this).data("car");

    localStorage.setItem("carid", carID);
    window.location.href = "car-details.php";
  });
});
