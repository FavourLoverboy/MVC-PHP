<?php 
    session_start();
    include('config/dblink.php');
    $collect = new DB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="http://localhost/MVC-PHP/">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <!-- title -->
        <title>Sign Up Page</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <form action="registration.php" method="POST">

            <h2>Sign up</h2>

            <label for="email">Email</label>
            <input type="text" name="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <input type="submit" name="register" class="button" value="Sign Up">
            <br>
            <p>Have an account? <a href="login.php">Sign In</a></p>
        </form>
        
        <!-- Custom JavaScript -->
        <script src="js/main.js"></script>
    </body>
</html>

<?php 
     if($_POST['register']){

        extract($_POST);

        $tblquery = "INSERT INTO tbl_login VALUES(:id, :email, :password, :date)";
        $tblvalue = array(
            ':id' => NULL,
            ':email' => htmlspecialchars($email),
            ':password' => htmlspecialchars($password),
            ':date' => date('Y-m-d')
        );
        //print_r($tblvalue);
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo '<script> window.location="login"; </script>';
        }
    }
?>