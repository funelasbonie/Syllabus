<?php
    session_start();
    include 'conn.php';

    if(isset($_POST['submit'])){
        $user = $_POST['id'];
        $pass = $_POST['pass'];

        $query = mysqli_query($con, 'SELECT * FROM ACCOUNTS WHERE USERNAME = "'.$user.'" AND PASSWORD = "'.$pass.'"');

        if($row = mysqli_fetch_array($query)){
            if($row['TYPE'] == 'Student'){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user'] = $row['USER_ID'];
                    $_SESSION['pass'] = $row['PASSWORD'];          
                    header('location:main.php?id='.$row['USER_ID'].'');
            }
            if($row['TYPE'] == 'Admin'){
                $_SESSION['adminloggedin'] = true;
                $_SESSION['adminuser'] = $row['USER_ID'];
                $_SESSION['adminname'] = $row['NAME'];          
                header('location:adminaccounts.php');
            }                        
        }
        else{
            $_SESSION['loggedin'] = false;          
                echo '<script>alert("Invalid Account!");
                              location.href="index.php";
                      </script>';
        }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="datetimepicker/jquery.datetimepicker.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <script src="js/jquery-1.11.3-jquery.min.js"></script>     
    <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>

    <script src="package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">

    <title>Syllabus</title>

</head>
<body style="background-image: url(images/bg5.jpg);background-attachment: fixed;background-size: cover;background-repeat: no-repeat">
    <div class="container">
        <div class="index-main">    
            <form class="form-signin" method="POST">                
                <div class="index-main-img"><img src="images/png/logo.png" width="100" height="100"></div>                        
                <div class="index-main-input">
                    <div><label>Student ID<label></div>
                    <input type="text" name="id" id="inputEmail" class="form-control" autocomplete="off" required autofocus>
                </div>                
                <div class="index-main-input">                
                    <div><label>Password<label></div>
                    <input type="password" name="pass" id="inputPassword" class="form-control" required>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign In</button>
            </form>
        </div>
    </div>

<?php
    include_once('userfooter.php');
?>