<?php 
    session_start(); 
?>
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: JLEARNING ::</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="portal/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="portal/assets/css/main.css">
    <link rel="stylesheet" href="portal/assets/css/authentication.css">
    <link rel="stylesheet" href="portal/assets/css/color_skins.css">
    <link rel="stylesheet" type="text/css" href="portal/assets/Toast/css/Toast.min.css">
</head>

<body class="theme-blush authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        <div class="navbar-translate n_logo">
            <a class="navbar-brand" href="./" title="" target="_blank">JLEARNING</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(portal/assets/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form-horizontal" action="process-login.php" method="POST"  enctype="multipart/form-data">
                    <div class="header">
                        <div class="logo-container">
                            <img src="portal/assets/images/logo.svg" alt="">
                        </div>
                        <h5>JLEARNING</h5>
                    </div>
                    <div class="content">                                                
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter User Name" name="email" required>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password" class="form-control" name="password" required />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</div>

<!-- Jquery Core Js -->
<script src="portal/assets/bundles/libscripts.bundle.js"></script>
<script src="portal/assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>
<script src="portal/assets/Toast/js/Toast.min.js"></script>
<?php 
if(isset($_SESSION['success'])){
    $message = $_SESSION['success']; ?>
    <script type="text/javascript">
        new Toast({ message: '<p style="color:white"><b><?php echo $message; ?></p></b>', type: 'success' });
    </script><?php 
    unset($_SESSION['success']);
}
if(isset($_SESSION['error'])){
    $message = $_SESSION['error'];?>

    <script type="text/javascript">
        new Toast({ message: '<p style="color:white"><b><?php echo $message; ?> </b></p>', type: 'danger' });
    </script><?php 
    unset($_SESSION['error']);
}  ?>
</body>
</html>