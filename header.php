<?php
    if(session_id() == ""){
        session_start();
    }
?>

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">Car<em>Dealer</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="cars.php">Cars</a></li>
                        <!-- <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="false">About</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="about.php">About Us</a>
                                <a class="dropdown-item" href="blog.php">Blog</a>
                                <a class="dropdown-item" href="team.php">Team</a>
                                <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                                <a class="dropdown-item" href="faq.php">FAQ</a>
                                <a class="dropdown-item" href="terms.php">Terms</a>
                            </div>
                        </li> -->
                        <li><a href="contact.php">Contact</a></li>


                        <?php  if(isset($_SESSION['islogin'])):?>
                             <li><a href="signout.php">Sign Out</a></li>
                              <?php if($_SESSION['role'] == 'dealer'):?>
                                <li><a href="dashboard">dashboard</a></li>
                                <?php endif;?>
                        <?php  else: ?>
                            <li><a href="signin.php">Sign In</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                        <?php endif;?>

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>