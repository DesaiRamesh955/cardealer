<div class="row">
    <div class="col">
        <h2 class="head-title">Vehicles</h2>
        <div id="utilityArea">
            <div class="row mt-3">
                <div class="col-10">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Search here...">
                </div>
                <div class="col-2">
                    <a href="index.php?page=add_vehicle" class="btn btn-primary">Add vehicle</a>
                </div>
            </div>
        </div>
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
                    <th scope="col">Title</th>
                    <th scope="col">Model</th>
                    <th scope="col">First reg</th>
                    <th scope="col">KM</th>
                    <th scope="col">Colour</th>
                    <th scope="col">Feature image</th>
                    <th scope="col">Settings</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="vehicle_data">
                <!-- <tr>
                    <th scope="row">Maruti swift</th>
                    <td>VDI</td>
                    <td>2021-02-05</td>
                    <td>20000</td>
                    <td>Black</td>
                    <td>Image here</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr> -->
                
            </tbody>
        </table>
    </div>
</div>
<script defer src="js/vehicle.js"></script>
