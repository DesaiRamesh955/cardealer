<?php
if(!session_start()){
    session_start();
}
if(isset($_SESSION['islogin'])){
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('head.php');?>

<body>

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
    <!-- Preloader End ***** -->
    <section class="section section-bg" id="call-to-action"
        style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Sign <em>Up</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section calss="section">
        <div class="row m-5">
            <div class=" col-xs-12 col-md-6 col-lg-4 offset-lg-4 offset-md-3">
                <div class="alert alert-success alert-dismissible fade" role="alert">
                    <p id="alertmsg"></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="contact-form card-shadow p-3">
                    <form id="signupForm" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 form-group">
                                <input name="fname" type="text" id="fname" placeholder="First Name*" data-require="true"
                                    data-error="Please enter first name" data-display="fname_err"
                                    data-onlychar='{"msg":"Only charactors are allow"}'>
                                <p class="text-danger" id="fname_err"> </p>
                            </div>
                            <div class="col-md-6 col-sm-12 form-group">

                                <input name="lname" type="text" id="lname" placeholder="Last Name*" data-require="true"
                                    data-error="Please enter last name" data-display="lname_err"
                                    data-onlychar='{"msg":"Only charactors are allow"}'>
                                <p class="text-danger" id="lname_err"> </p>
                            </div>
                            <div class="col-md-12 col-sm-12 form-group">

                                <input name="email" type="text" id="email" placeholder="Email Address*"
                                    data-require="true" data-error="Please enter email" data-display="email_err"
                                    data-email='{"msg":"Please enter valid email"}'>
                                <p class="text-danger" id="email_err"> </p>
                            </div>
                            <div class="col-lg-12 form-group">

                                <input name="mobile" type="text" id="mobile" placeholder="Mobile Number*"
                                    data-require="true" data-error="Please enter mobile number"
                                    data-display="mobile_err" data-number='{"msg":"Please enter valid number"}'
                                    data-long='{"len":"10","msg":"Number should be 10 charators long"}'>
                                <p class="text-danger" id="mobile_err"> </p>
                            </div>
                            <div class="col-md-6 col-sm-12 form-group">
                                <input name="password" type="password" id="password" placeholder="Password*"
                                    data-require="true" data-error="Please enter password" data-display="password_err"
                                    data-min='{"len":"6","msg":"Minimun 6 charactors allow"}'>
                                <p class="text-danger" id="password_err"> </p>
                            </div>
                            <div class="col-md-6 col-sm-12 form-group">
                                <input name="re_password" type="password" id="re_password"
                                    placeholder="Re-enter Password*" data-require="true"
                                    data-error="Please re-enter password" data-display="v_password_err"
                                    data-match='{"to":"password","msg":"Password not match"}'>
                                <p class="text-danger" id="v_password_err"> </p>
                            </div>
                            <div class="col-lg-12 form-group">
                                <select name="role" id="role" data-require="true" data-display="role_err"
                                    data-error="Please select user role">
                                    <option value="">Select Role*</option>
                                    <option value="visitor">Visitor</option>
                                    <option value="dealer">Dealer</option>
                                </select>
                                <p class="text-danger" id="role_err"> </p>
                            </div>
                            <div class="col-lg-12 form-group">

                                <input type="hidden" name="signup_form">

                                <button type="submit" id="form-submit" class="main-button">Sign
                                    Up</button>
                                <button type="reset" id="form-reset" class="secondary-button">Reset</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <!-- ***** Header Area Start ***** -->
    <?php require_once("header.php")?>
    <!-- ***** Header Area End ***** -->




    <!-- ***** Header Area Start ***** -->
    <?php require_once("footer.php")?>
    <!-- ***** Header Area End ***** -->
    <script src="js/auth.js"></script>
    <body>
</html>