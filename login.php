<?php 
 include('source/session.php');
?>

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
            <a class="nav-item nav-link" href="signup.php">Sign Up</a>
          </div>
        </div>
        <!-- Nav Bar End -->
        </div>
      </nav>
    
    <!-- Nav Section End -->
        <div class="container form-content">
            <div class="row h-100">
                <div class="col-md-6 signup-left d-flex flex-column align-items-center justify-content-center pr-5">
                    <!-- Signup Form start -->
                    <div class="row w-100">
                        <div class="col-md-12 text-center">
                            <h2>Welcome!</h2>
                        </div>
                    </div>
                    <div class="row w-100">
                        <div class="col-md-10 text-right pr-3">
                            <p >Sign In Get Started</p>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row w-100">
                        <div class="col-md-12 text-center">
                        <?php 
                            if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                            {
                                echo '<h4 class="bg-success text-white p-1"> '.$_SESSION['success'].'</h4>';
                                unset($_SESSION['success']);
                            }
                            if(isset($_SESSION['status']) && $_SESSION['status'] != '')
                            {
                                echo '<h4 class="bg-danger text-white p-1">'.$_SESSION['status'].'</h4>';
                                unset($_SESSION['status']);
                            }
                        ?>
                        </div>
                    </div>
                    <form class="w-100" action="login_code.php" method="post">
                        <div class="row w-100">
                            <div class="col-md-12">
                                <input class="w-100 input-field" type="text" name="user-name" class="input-box" placeholder="User Name" required>
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md-12">
                                <input class="w-100 input-field" type="password" name="user-pass" class="input-box" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md-12 w-100 submit-btn text-center">
                                <input type="submit" name="login-btn" class="btn" value="Login">
                            </div>
                        </div>
                    </form>
                    <div class="row w-100 my-1">
                        <div class="col-md-12 w-100 text-center">
                            <p><strong><a href="userpasswordreset.php">Forgot Password?</a></strong></p>
                        </div>
                    </div>
                    <div class="row w-100 my-1">
                        <div class="col-md-12 w-100 text-center">
                            <p>Don't have a account <strong><a href="signup.php">Sign Up</a></strong></p>
                        </div>
                    </div>
                    <div class="row w-100 my-2">
                        <div class="col-md-12">
                            <div class="social-links">
                                <ul class="h-100 d-flex align-items-center justify-content-center">
                                  <li><p>Follow On : </p></li>
                                  <li><a href="facebook.com"><i class="fab fa-facebook-square"></i></a></li>
                                  <li><a href="twitter.com"><i class="fab fa-twitter-square"></i></a></li>
                                  <li><a href="instagram.com"><i class="fab fa-instagram-square"></i></a></li>
                                </ul>
                              </div>
                        </div>
                    </div>
                    <!-- Signup Form End -->
                </div>
                <div class="col-md-6 signup-right d-flex flex-column h-100 justify-content-between">
                    <div>
                        <div class="row">
                            <div class="col-md-12 px-5 mt-4 mb-2">
                                <h1>Explore Bangladesh.</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 px-5">
                                <!-- <p><i class="fas fa-play play-btn"></i> Play video</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 px-4 pb-2">
                            <p><strong>#Lala Khal</strong> is a river known for its high quality sand is possibly more remarkable for its color changing water. </p>
                        </div>
                    </div>
                </div>
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