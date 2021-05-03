<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- navbar start  -->
    <?php
   require_once('partial/navbar.php');
 ?>
    <!-- navbar end  -->

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">

            <ul>
                <li><a href="index.php?page=home"><i class="fa fa-tachometer" aria-hidden="true"></i>
                        Dashboard</a></li>
                <li><a href="index.php?page=vehicles"><i class="fa fa-car" aria-hidden="true"></i>
 Vehicles</a></li>
                <li><a href="index.php?page=inquiry"> <i class="fa fa-info-circle" aria-hidden="true"></i> Inquiry</a></li>
                <li><a href="index.php?page=profile"><i class="fa fa-user" aria-hidden="true"></i>
 Profile</a></li>
                <li><a href=""><i class="fa fa-sign-out" aria-hidden="true"></i>
 logout</a></li>
            </ul>
        </nav>
        <!-- Page Content -->
        <div id="content">
            <?php
             if(isset($_GET['page']) && !empty($_GET['page'])){

                if($_GET['page']=="updatevehicle"){
                    include_once('add_vehicle.php');
                }else{
                    extract($_GET);
                    if(file_exists($page.'.php')){
                        include_once($page.'.php');
                    }else{
                       include_once('home.php');
                   }
                }
               
             }else{
                include_once('home.php');
             }
            ?>
        </div>
    </div>




    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="../js/validation.js"></script>
    
</body>

</html>