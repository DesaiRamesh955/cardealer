$(document).ready(function () {
  getInquiry(1);

  function getInquiry(page, filter = "", start_date = "", end_date = "",search="") {
    console.log(search)
    $.ajax({
      method: "POST",
      url: "includes/inquiry.php",
      data: { getInquiry: 1, page, filter, start_date, end_date,search},
      success: function (response) {
        let res = JSON.parse(response);
        let html = ``;
        if (res.status == "SUCCESS") {
          $.each(res.data, function (index, value) {
            html += `
                              <tr>
                                  <td>${value.id}</td>
                                  <td>${value.title}</td>
                                  <td>${value.name}</td>
                                  <td>${value.number}</td>
                                  <td>${value.email}</td>
                                  <td>${value.description}</td>
                                  <td>${value.insert_date}</td>
                                  <td>
                                      <a href="#" data-check="${value.id}" class="btn btn-primary btn-sm inquiryCheck"><i class="fa fa-check" aria-hidden="true"></i></a>
                                      <a href="#" data-delete="${value.id}" class="btn btn-danger btn-sm inquiryDelete"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                  </td>
                              </tr>
                          `;
          });
          if (res.totalPage > 1) {
            $("#pagination").html(paginationView(res.totalPage, page));
          } else {
            $("#pagination").html("");
          }
        } else if (res.msg == "NO_DATA_FOUND") {
          html += `
              <tr>
                <td colspan='7' class="text-center"><b>No data found</b></td>
              </tr>
            `;
        }
        $("#inquiry_display").html(html);
      },
    });
  }

  $("body").delegate(".pagination-btn", "click", function (e) {
    e.preventDefault();
    getInquiry($(this).data("page"));
  });

  $("body").delegate("#prevBtn", "click", function (e) {
    e.preventDefault();

    let cur_page = $(".currentPage").data("page");

    getInquiry(cur_page - 1);
  });

  $("body").delegate("#nextBtn", "click", function (e) {
    e.preventDefault();
    let cur_page = $(".currentPage").data("page");
    getInquiry(cur_page + 1);
  });

  //delete inquiry

  $("body").delegate(".inquiryDelete", "click", function (e) {
    e.preventDefault();
    let id = $(this).data("delete");
    let column = $(this).parent().parent();

    if (confirm("Are you sure?")) {
      $.ajax({
        method: "POST",
        url: "includes/inquiry.php",
        data: { deleteInquiry: id },
        success: function (response) {
          let res = JSON.parse(response);

          if (res.status == "SUCCESS") {
            $(".message").html(
              alertView("success", "Inquiry deleted succesfully")
            );
            setTimeout(function () {
              $(".message")
                .fadeTo(500, 0)
                .slideUp(300, function () {
                  $(this).remove();
                });
            }, 2000);
            column.remove();
          } else {
            $(".message").html(alertView("danger", "Inquiry deletion failed"));
          }
        },
      });
    }
  });

  //filter data

  $("#filter").on("change", function () {
    let option = $(this).val();

    if (option == "date") {
      $("#search_by_date").removeClass("d-none");
      return false;
    } else {
      $("#search_by_date").addClass("d-none");
    }

    if (option == "asc") {
      getInquiry(1, option);
      return false;
    }
    if (option == "desc") {
      getInquiry(1, option);
      return false;
    }
    if (option == "all" || option=="") {
      $("#search").val('')
      getInquiry(1);
      return false;
    }
  });

  $("#start_date").on("change", function () {
    filterDate();
    return false;
  });

  $("#end_date").on("change", function () {
    filterDate();
    return false;
  });

  function filterDate() {
    let start_date = $("#start_date");
    let end_date = $("#end_date");
    if (start_date.val() == "" || start_date.val() == null) {
      start_date.addClass("border-danger");
      return false;
    } else {
      start_date.removeClass("border-danger");
    }

    if (start_date.val() > end_date.val()) {
      $("#date_error").text(
        "Start date should be lower or equal then end date"
      );
      start_date.addClass("border-danger");
      end_date.addClass("border-danger");
      return false;
    } else {
      $("#date_error").text("");

      start_date.removeClass("border-danger");
      end_date.removeClass("border-danger");
    }
    getInquiry(1, "", start_date.val(), end_date.val());
  }

  //search by name

  $("#search").on("keyup", function () {
    let text = $(this).val().trim();

    if (text == " " || text ==""){
      getInquiry(1);
    }
   
    getInquiry(1,null,null,null,text);
  });
});
