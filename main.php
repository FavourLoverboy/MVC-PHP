<?php
    session_start();
    if(!$_SESSION['email']){
        header('location: login.php');
    }
?>

<?php include('includes/header.php');?>
    
    <!-- Code Start Here -->

    <!-- Code End Here -->

    <?php include($page); ?>
    
<?php include ('includes/footer.php'); ?>