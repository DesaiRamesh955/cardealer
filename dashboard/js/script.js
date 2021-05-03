$(document).ready(function () {
  $(".hamburger").on("click", function () {
    $(this).stop().toggleClass("change");
    $("#sidebar").stop().toggleClass("active");
  });
});
function paginationView(pages, page) {
  //pagination

  let pagination = ``;
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
						  <a class="page-link" href="" aria-label="Previous">
							  <span aria-hidden="true">&raquo;</span>
							  <span class="sr-only">Previous</span>
						  </a>
					  </li>
					  `;
  }

  return pagination;
  //pagination end
}

function alertView(type, msg) {
  let t = `alert-${type}`;

  return ` <div class="alert ${t} alert-dismissible fade show" role="alert">
				<p>${msg}</p>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>`;
}
