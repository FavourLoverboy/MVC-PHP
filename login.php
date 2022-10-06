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
        <title>Sign In Page</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

        <form action="login.php" method="POST">

            <h2>Sign In</h2>

            <label for="email">Email</label>
            <input type="text" name="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <input type="submit" name="login" class="button" value="Sign In">
            <br>
            <p>Create an account? <a href="registration.php">Sign Up</a></p>
            <br>
            <p>Forgot password? <a href="resetpassword.php">Reset Password</a></p>
        </form>

        <script src="js/main.js"></script>
    </body>
</html>

<?php

    if($_POST['login']){

        extract($_POST);

        $tblquery = "SELECT * FROM tbl_login WHERE email = :email && password = :password";
        $tblvalue = array(
            ':email' => htmlspecialchars($email),
            ':password' => htmlspecialchars($password)
        );
        print_r($tblvalue);
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);

                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;

                header ('Location: dashboard');
                echo '<script> window.location="dashboard"; </script>';
            }
        }else{
            echo "Invali Login Info";
        }
    }
?>