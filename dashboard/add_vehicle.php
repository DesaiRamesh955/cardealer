<div class="row p-4">
    <div class="col-8">
        <h2 class="head-title"><?=($_GET["page"]=="updatevehicle")? "Update vehicle":"Add vehicle" ?></h2>
    </div>
    <div class="col-4"><a href="index.php?page=vehicles" class="btn btn-primary float-right">Show</a></div>
</div>
<div class="row mt-5">
    <div class="col">
        <div class="message"></div>
    </div>
</div>
<div class="row">

    <div class="col">
        <form id="addVehicle_form" class="p-4 <?=($_GET["page"]=="updatevehicle")? "update_vehicle":"" ?>"  enctype="multipart/form-data">
            <div class="row">

                <div class="col-md-8 border-right border-primary">

                    <div class="form-group row">
                        <div class="col">
                            <label for="title">Title (Vehicle name)</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Ex. Maruti swift" data-require="true" data-error="Please enter title"
                                data-display="title_error" />
                            <p class="text-danger" id="title_error"></p>
                        </div>
                        <div class="col">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Ex. 150000"
                                data-require="true" data-error="Please enter price" data-display="price_error"
                                data-number='{"msg":"Please enter digit"}'>
                            <p class="text-danger" id="price_error"></p>
                        </div>
                    </div>
                    <h3>Vehicle Specs</h3>
                    <div class="form-group row">
                        <div class="col">
                            <label for="Type">Type</label>
                            <select name="type" id="type" class="custom-select" data-require="true"
                                data-error="Please select vehicle type" data-display="type_error">
                                <p class="text-danger" id="title_error">
                                    <option value="">Select Type</option>
                                    <option value="used">Used vehicle</option>
                                    <option value="new">New vehicle</option>
                            </select>
                            <p class="text-danger" id="type_error"></p>
                        </div>
                        <div class="col">
                            <label for="make">Make</label>
                            <input type="text" name="make" id="make" class="form-control"
                                placeholder="Ex. Maruti Suzuki" data-require="true" data-error="Please enter maker"
                                data-display="make_error">
                            <p class="text-danger" id="make_error"></p>
                        </div>
                        <div class="col">
                            <label for="model">Model</label>
                            <input type="text" name="model" id="model" class="form-control" placeholder="Ex. ZDI"
                                data-require="true" data-error="Please enter model" data-display="model_error">
                            <p class="text-danger" id="model_error"></p>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col">
                            <label for="km">KM</label>
                            <input type="text" name="km" id="km" class="form-control" placeholder="Ex. 20000"
                                data-require="true" data-error="Please enter km" data-display="km_error"
                                data-number='{"msg":"Please enter only digits"}'>
                            <p class="text-danger" id="km_error"></p>
                        </div>
                        <div class="col">
                            <label for="fuel">Fuel</label>
                            <input type="text" name="fuel" id="fuel" class="form-control" placeholder="Ex. Petrol"
                                data-require="true" data-error="Please enter fuel type" data-display="fuel_error">
                            <p class="text-danger" id="fuel_error"></p>
                        </div>
                        <div class="col">
                            <label for="eng_size">Engine size (CC)</label>
                            <input type="text" name="eng_size" id="eng_size" class="form-control" placeholder="Ex. 1800"
                                data-require="true" data-error="Please enter engine size" data-display="eng_size_error"
                                data-number='{"msg":"Please enter only digits"}'>
                            <p class="text-danger" id="eng_size_error"></p>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col">
                            <label for="first_reg">First registration</label>
                            <input type="date" name="first_reg" id="first_reg" class="form-control"
                                placeholder="05/2010" data-require="true"
                                data-error="Please select first registraion date" data-display="first_reg_error">
                            <p class="text-danger" id="first_reg_error"></p>
                        </div>
                        <div class="col">
                            <label for="power">Power (HP)</label>
                            <input type="text" name="power" id="power" class="form-control" placeholder="Ex. 85"
                                data-require="true" data-error="Please enter power" data-display="power_error">
                            <p class="text-danger" id="power_error"></p>
                        </div>
                        <div class="col">
                            <label for="gearbox">Gearbox</label>
                            <select name="gearbox" id="gearbox" class="custom-select" data-require="true"
                                data-error="Please select gearbox type" data-display="gearbox_error">
                                <option value="">Select Gearbox</option>
                                <option value="manual">Manual</option>
                                <option value="auto">Automatic</option>
                            </select>
                            <p class="text-danger" id="gearbox_error"></p>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col">
                            <label for="first_reg">Number of seats</label>
                            <input type="text" name="no_of_seats" id="no_of_seats" class="form-control"
                                placeholder="Ex. 3" data-require="true" data-error="Please enter number of seats"
                                data-display="no_of_seats_error" data-number='{"msg":"Please enter only digits"}'>
                            <p class="text-danger" id="no_of_seats_error"></p>
                        </div>
                        <div class="col">
                            <label for="doors">Doors</label>
                            <input type="text" name="doors" id="doors" class="form-control" placeholder="Ex. 4"
                                data-require="true" data-error="Please enter doors" data-display="doors_error"
                                data-number='{"msg":"Please enter only digits"}'>
                            <p class="text-danger" id="doors_error"></p>
                        </div>
                        <div class="col">
                            <label for="colour">Colour</label>
                            <input type="text" name="colour" id="colour" class="form-control" placeholder="Ex. Black"
                                data-require="true" data-error="Please enter colour" data-display="colour_error">
                            <p class="text-danger" id="colour_error"></p>
                        </div>
                    </div>

                    <h3>Vehicle Description</h3>
                    <div class="form-group row">
                        <div class="col">
                            <textarea name="description" id="description" data-require="true"
                                data-error="Please enter description" data-display="description_error" rows="10"
                                cols="80"></textarea>
                            <p class="text-danger" id="description_error"></p>
                        </div>
                    </div>
                    <h3>Vehicle Extras (optional)</h3>
                    <div class="form-group row">
                        <div class="col">
                            <textarea name="extra" id="extra"></textarea>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="row mb-3">
                        <div class="col">
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Publish" />
                        </div>
                    </div>
                    <h3>Images</h3>
                    <div class="form-group row">
                        <div class="col">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="feature_image" id="feature_image"
                                    data-require="true" data-error="Please select feature image"
                                    data-display="feature_image_error" data-image="true" data-allow="jpg,jpeg,png">
                                <label class="custom-file-label" for="feature_image">Feature Image</label>
                                <p class="text-danger" id="feature_image_error"></p>
                            </div>
                            <img class="img img-responsive d-none" width="100%" height="90%" alt=""
                                id="feature_image_show">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="all_images[]" id="all_images"
                                    multiple data-require="true" data-error="Please select vehicle images"
                                    data-display="all_images_image_error" data-image="true" data-allow="jpg,jpeg,png">
                                <label class="custom-file-label" for="all_images">Vehicle images</label>
                                <p class="text-danger" id="all_images_image_error"></p>
                            </div>
                        </div>


                    </div>
                    <div class="row all_images_show">
                        <!-- <div class="col-md-4">
                            <span><i class="fa fa-close deleteIcon"></i></span>
                            <img src="images/1931800880180321074123284236638.jpeg">
                        </div>
                        <div class="col-md-4">
                            <span><i class="fa fa-close deleteIcon"></i></span>
                            <img src="images/1931800880180321074123284236638.jpeg">

                        </div>
                        <div class="col-md-4">
                            <span><i class="fa fa-close deleteIcon"></i></span>
                            <img src="images/1931800880180321074123284236638.jpeg">

                        </div>
                        <div class="col-md-4">
                            <span><i class="fa fa-close deleteIcon"></i></span>
                            <img src="images/1931800880180321074123284236638.jpeg">
                        </div>
                        <div class="col-md-4">
                            <span><i class="fa fa-close deleteIcon"></i></span>
                            <img src="images/1931800880180321074123284236638.jpeg">

                        </div>
                        <div class="col-md-4">
                            <span><i class="fa fa-close deleteIcon"></i></span>
                            <img src="images/1931800880180321074123284236638.jpeg">

                        </div> -->
                    </div>
                    <h3>Settings</h3>
                    <div class="form-group row">
                        <div class="col">
                            <select name="visibility" id="visibility" class="custom-select" data-require="true"
                                data-error="Please select visibility" data-display="visibility_error">
                                <option value="1" selected>Public</option>
                                <option value="0">Draft</option>
                            </select>
                            <p class="text-danger" id="visibility_error"></p>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="vid" name="<?=($_GET["page"]=="updatevehicle")? "update_vehicle":"addvehicle_form" ?>">
        </form>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/swpp2svb4i3b51rjyi3weglbr82ea0475zc5wg9h8gg2yv3e/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>


<script>
tinymce.init({
    selector: 'textarea#description'
});
tinymce.init({
    selector: 'textarea#extra'
});
</script>
<script defer src="js/vehicle.js"></script>