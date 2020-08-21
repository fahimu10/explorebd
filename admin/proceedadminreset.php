<!-- PHP Start -->
<?php 
require 'source/session.php';
require 'source/config.php'; 
if (!isset($_GET['code'])) {
	header('location: 404.php');
}

$code = $_GET['code']; 
$getCodequery = mysqli_query($con, "SELECT email FROM admins_reset WHERE code = '$code'"); 
if (mysqli_num_rows($getCodequery) == 0) {
	header('location: 404.php'); 
}

// handling the form 
if (isset($_POST['password'])) {
	$pass = $_POST['password']; 
	$pw = password_hash($pass, PASSWORD_DEFAULT); // not the best option but for demo simpilicity
	$row = mysqli_fetch_array($getCodequery); 
	$email = $row['email']; 
	$query = mysqli_query($con, "UPDATE admins SET password = '$pw' WHERE email = '$email'");

	if ($query) {
	 	$query = mysqli_query($con, "DELETE FROM admins_reset WHERE code ='$code'"); 
         $_SESSION['success'] = 'Password Updated';
         header('location: login.php');	
 	 }else {
          
          $_SESSION['success'] = 'Something went wrong';
          header('location: login.php');	 	
 	 } 	 
}

?>

<!-- PHP End -->


<!-- HTML Start -->


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ExploreBD.</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            /* width: 100%; */
            width: 400px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <div class="text-center">
            
            <form class="form-signin" method="POST">
                <!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
                    width="72" height="72"> -->
                <h1 class="h3 mb-3 font-weight-normal">Reset Admin Password</h1>
                
                <input type="password" class="form-control mb-3" name="password" placeholder="Enter New Password" required autofocus>
                
                <input class="btn btn-lg btn-primary btn-block mb-3" type="submit" name="submit" value="Reset email">
                
                <a class="mb-3" href="login.php">Login</a>
                <p class="mt-5 mb-3 text-muted">Copyright &copy; ExploreBD. 2020</p>
            </form>
        </div>
    </div>
   
    </div>
    <!-- End of Content Wrapper -->
    </div>

</body>

</html>

<!-- HTML End -->