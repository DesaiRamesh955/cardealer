<div class="row">
    <div class="col">
        <h2 class="head-title">Inquiry</h2>
    </div>

</div>

<div class="row mt-5">
    <div class="col">
        <div class="message"></div>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td colspan="7">
                        <div class="row">
                            <div class="col-sm-12 col-md-10">
                                <input type="text" class="form-control" name="search" id="search"
                                    placeholder="Search by name or number">
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <select class="custom-select" id="filter">
                                    <option selected value="">Select Option</option>
                                    <option value="all">All</option>
                                    <option value="date">Between Date</option>
                                    <option value="desc">Descending</option>
                                    <option value="asc">Ascending</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2 d-none" id="search_by_date">
                            <div class="col-sm-12 col-md-6">
                                <input type="date" name="start_date" class="form-control" id="start_date">
                                <span class="text-danger" id="date_error"></span>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <input type="date" name="end_date" class="form-control" id="end_date">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Inquiry ID</th>
                    <th>Inquiry Vehicle</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="inquiry_display">

            </tbody>
        </table>

        <div>
            <ul class="pagination pagination-lg justify-content-center" id="pagination">
            </ul>
        </div>
    </div>
</div>
<script defer src="js/inquiry.js"></script>