<!-- PHP Start -->
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'source/db_connect.php';
require 'source/session.php';

if(isset($_POST["email"])) 
    {   
        $emailTo = $_POST["email"];

        $code = uniqid(true);
        // $query = mysqli_query($conn, "INSERT INTO resetpassword(code, email) VALUES ('$code', '$emailTo')");
        // if(!$query)
        // {
        //     exit("Error");
        // }
        
        try {
            $SQLInsert = "INSERT INTO resetpassword (code, email)
                         VALUES (:code, :emailTo)";
      
            $statement = $conn->prepare($SQLInsert);
            $statement->execute(array(':code' => $code, ':emailTo' => $emailTo));
      
          }
          catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.stackmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'support@explorebd.tech';                     // SMTP username
            $mail->Password   = 'explorebd311';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('support@explorebd.tech', 'ExploreBD');
            $mail->addAddress("$emailTo");     // Add a recipient
            $mail->addReplyTo('no-reply@explorebd.techm', 'No-Reply');

            // Content
            $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/proceeduserreset.php?code=$code";
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Reset Password';
            $mail->Body    = " <h1> You requested a password reset</h1> 
                                Click <a href='$url'>this link</a> to proceed";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $_SESSION['success'] = "Reset password link has been sent to your Email.";
            header('location: userpasswordreset.php');
        } catch (Exception $e) {
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header('location: userpasswordreset.php');
        } 
        exit();   
    }
?>
<!-- PHP End -->

<!-- HTML Start  -->
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
                    <form class="w-100" method="post">
                        <div class="row w-100">
                            <div class="col-md-12">
                                <input class="w-100 input-field" type="text" name="email" placeholder="Email" autocomplete="off">
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="col-md-12 w-100 submit-btn text-center">
                                <input class="btn" type="submit" name="submit" value="Reset email">
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

