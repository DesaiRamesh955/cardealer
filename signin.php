<?php

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
                        <h2>Sign <em>In</em></h2>
                        <p>Sign in with secure credentials</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section calss="section">
        <div class="row m-5">
            <div class="col-xs-12 col-md-6 col-lg-4 offset-lg-4 offset-md-3">
                <div class="message">

                </div>
                <div class="contact-form card-shadow p-3">

                    <form id="signinForm" autocomplete="off">
                        <div class="row">

                            <div class="col-md-12 col-sm-12 form-group">
                                <input name="user" type="text" id="user" placeholder="Username*" data-require="true"
                                    data-error="Please enter username" data-display="user_err">
                                <p class="text-danger" id="user_err"> </p>
                            </div>
                            <div class="col-md-12 col-sm-12 form-group">
                                <input name="password" type="password" id="password" placeholder="Password*"
                                    data-require="true" data-error="Please enter password" data-display="password_err">
                                <p class="text-danger" id="password_err"> </p>
                            </div>

                            <div class="col-lg-12 form-group">
                                <input type="hidden" name="signin_form">
                                <button type="submit" class="main-button">Sign In</button>
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