
<!DOCTYPE html>
<html lang="en">

<!-- ***** head Area Start ***** -->
<?php require_once("head.php")?>
<!-- ***** head Area End ***** -->

<style>
.carousel-item img {
    height: 400px;
    object-fit: cover;
}
</style>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <?php require_once("header.php")?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
        style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><em id="car_price">₹119779</em></h2>
                        <p id="title"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <!-- <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assets/images/car-image-1-1200x600.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> -->
            </div>

            <br>
            <br>

            <div class="row" id="tabs">
                <div class="col-lg-4">
                    <ul>
                        <li><a href='#tabs-1'><i class="fa fa-cog"></i> Vehicle Specs</a></li>
                        <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Vehicle Description</a></li>
                        <li><a href='#tabs-3'><i class="fa fa-plus-circle"></i> Vehicle Extras</a></li>
                        <li><a href='#tabs-4'><i class="fa fa-phone"></i> Contact Details</a></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content' style="width: 100%;">
                        <article id='tabs-1'>
                            <h4>Vehicle Specs</h4>

                            <div class="row" id="vehicle_specs">
                                <!-- <div class="col-sm-6">
                                    <label>Type</label>

                                    <p>Used vehicle</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Make</label>

                                    <p>Lorem ipsum dolor sit</p>
                                </div>

                                <div class="col-sm-6">
                                    <label> Model</label>

                                    <p>Lorem ipsum dolor sit</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>First registration</label>

                                    <p>05/2010</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Mileage</label>

                                    <p>5000 km</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Fuel</label>

                                    <p>Diesel</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Engine size</label>

                                    <p>1800 cc</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Power</label>

                                    <p>85 hp</p>
                                </div>


                                <div class="col-sm-6">
                                    <label>Gearbox</label>

                                    <p>Manual</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Number of seats</label>

                                    <p>4</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Doors</label>

                                    <p>2/3</p>
                                </div>

                                <div class="col-sm-6">
                                    <label>Color</label>

                                    <p>Black</p>
                                </div>-->
                            </div>
                        </article>
                        <article id='tabs-2'>
                            <h4>Vehicle Description</h4>
                            <div id="vehicle_desc">
                                <!-- <p>- Colour coded bumpers <br> - Tinted glass <br> - Immobiliser <br> - Central locking -
                                remote <br> - Passenger airbag <br> - Electric windows <br> - Rear head rests <br> -
                                Radio <br> - CD player <br> - Ideal first car <br> - Warranty <br> - High level brake
                                light <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.</p> -->
                            </div>
                        </article>
                        <article id='tabs-3'>
                            <h4>Vehicle Extras</h4>

                            <div class="row" id="vehicle_ext">
                                <!-- <div class="col-sm-6">
                                    <p>ABS</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>Leather seats</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>Power Assisted Steering</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>Electric heated seats</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>New HU and AU</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>Xenon headlights</p>
                                </div> -->
                            </div>
                        </article>
                        <article id='tabs-4'>
                            <h4>Contact Details</h4>

                            <div class="row" id="contact">
                                <!-- <div class="col-sm-6">
                                    <label>Name</label>

                                    <p id="c_name">John Smith</p>
                                </div>
                                <div class="col-sm-6">
                                    <label>Phone</label>

                                    <p>123-456-789 </p>
                                </div>
                                <div class="col-sm-6">
                                    <label>Mobile phone</label>
                                    <p>456789123 </p>
                                </div>
                                <div class="col-sm-6">
                                    <label>Email</label>
                                    <p><a href="#">john@carsales.com</a></p>
                                </div> -->
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <h4>Inquiry</h4>
                                   <div class="msg"></div>
                                    </button>
                                    <form id="inquiry_form">
                                        <div class="form-group row">

                                            <div class="col">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Enter your name" data-require="true"
                                                    data-error="Please enter your name" data-display="name_error" />
                                                <p class="text-danger" id="name_error"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col">
                                                <input type="text" class="form-control" name="number" id="number"
                                                    placeholder="Enter your number" data-require="true"
                                                    data-error="Please enter your number" data-display="number_error"
                                                    data-number='{"msg":"Please enter valid number"}'
                                                    data-long='{"len":"10","msg":"Number should be 10 charators long"}' />

                                                <p class="text-danger" id="number_error"></p>
                                            </div>

                                            <div class="col">
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Enter your email" data-require="true"
                                                    data-error="Please enter your email" data-display="email_error"
                                                    data-email='{"msg":"Please enter valid email"}' />

                                                <p class="text-danger" id="email_error"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col">
                                                <textarea name="description" class="form-control" id="description"
                                                    cols="30" rows="10" data-require="true"
                                                    data-error="Please enter description" placeholder="Description...."
                                                    data-display="description_error"></textarea>
                                                <p class="text-danger" id="description_error"></p>
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col">
                                                <input type="hidden" name="inqury_form">

                                                <button type="submit" id="form-submit"
                                                    class="btn btn-primary">Submit</button>
                                                <button type="reset" id="form-reset"
                                                    class="btn btn-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col map">
                                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.7917942542026!2d71.61249551481683!3d23.826001684552164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395b74fe8b4047cb%3A0x34753abf69f13d35!2sDhairya%20infocom!5e0!3m2!1sen!2sin!4v1617340944455!5m2!1sen!2sin" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                                </div>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php require_once("footer.php")?>
    <script src="js/carDetail.js"></script>