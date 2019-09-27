<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script><!-- USA Map Js -->
<script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob, Count To, Sparkline Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>
<script src="assets/Toast/js/Toast.min.js"></script>
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