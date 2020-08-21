<!-- PHP Start -->
<?php 
require 'source/config.php'; 
if (!isset($_GET['code'])) {
	exit("Can't find the page"); 
}

$code = $_GET['code']; 
$getCodequery = mysqli_query($con, "SELECT email FROM resetpassword WHERE code = '$code'"); 
if (mysqli_num_rows($getCodequery) == 0) {
	exit("Can't find the page because not same code"); 
}

// handling the form 
if (isset($_POST['password'])) {
	$pass = $_POST['password']; 
	$pw = password_hash($pass, PASSWORD_DEFAULT); // not the best option but for demo simpilicity
	$row = mysqli_fetch_array($getCodequery); 
	$email = $row['email']; 
	$query = mysqli_query($con, "UPDATE users SET password = '$pw' WHERE email = '$email'");

	if ($query) {
	 	$query = mysqli_query($con, "DELETE FROM resetpassword WHERE code ='$code'"); 
	 	$_SESSION['success'] = "Password Updated.";
            header('location: login.php');	
 	 }else {
          $_SESSION['status'] = "Something went wrong";
            header('location: login.php'); 	
 	 } 	 
}

?>

<!-- PHP End -->

<!-- HTML Start -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a1f6d66f7f.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="asssets/css/bootstrap/bootstrap.min.css" crossorigin="anonymous">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="asssets/css/animate/animate.min.css">

    <!-- Magnific Popup -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css" rel="stylesheet">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="asssets/css/custom/style.css">

    <title>ExploreBD.</title>
</head>

<body>
    <!-- Header Section Start -->
    <header>
        <!-- Nav Section Start -->
    
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <!-- Logo Start -->
        <a class="navbar-brand logo" href="index.html">ExploreBD.</a>
        <!-- Logo End -->
        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Toggle Button -->
        <!-- Nav Bar Start -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link" href="aboutus.html">About Us</a>
            <a class="nav-item nav-link" href="contact.php">Contact</a>
            <a class="nav-item nav-link" href="login.php">Sign In</a>
          </div>
        </div>
        <!-- Nav Bar End -->
        </div>
      </nav>
    
    <!-- Nav Section End -->
        <div class="container form-content">
            <div class="row h-100">
            <div class="col-md-3"></div>
                <div class="col-md-6 signup-left d-flex flex-column align-items-center justify-content-center pr-5">
                    <!-- Signup Form start -->
                    <div class="row w-100">
                        <div class="col-md-12 text-center">
                            <h2>Welcome!</h2>
                        </div>
                    </div>
                    <div class="row w-100">
                        <div class="col-md-12 text-center">
                            <p >Enter The Registered Email To Reset Your Password</p>
                        </div>
                    </div>
                    <form class="w-100" method="post">
                        <div class="row w-100">
                            <div class="col-md-12">
                                <input class="w-100 input-field" type="password" name="password" placeholder="New password">
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md-12 w-100 submit-btn text-center">
                                <input class="btn" type="submit" name="submit" value="Update password">
                            </div>
                        </div>
                    </form>
                    <div class="row w-100 my-1">
                        <div class="col-md-12 w-100 text-center">
                            <p>Go Back To <strong><a href="login.html">Login</a></strong></p>
                        </div>
                    </div>
                    <div class="row w-100 my-2">
                        <div class="col-md-12">
                            <div class="social-links">
                                <ul class="h-100 d-flex align-items-center justify-content-center">
                                  <li><p>Follow On : </p></li>
                                  <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                                  <li><a href=""><i class="fab fa-twitter-square"></i></a></li>
                                  <li><a href=""><i class="fab fa-instagram-square"></i></a></li>
                                </ul>
                              </div>
                        </div>
                    </div>
                    <!-- Signup Form End -->
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    </header>
    <!-- Header Section End -->

    <!-- App.js -->
    <script src="asssets/js/app.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="asssets/js/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="asssets/js/bootstrap/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
</body>

</html>
<!-- HTML End -->
