<!-- PHP Start -->
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'source/session.php';

if(isset($_POST["email"])) 
    {   
        $emailTo = 'fahimuddin900@gmail.com';
        $emailFrom = $_POST["email"];
        $message = $_POST["message"];
        $name = $_POST["name"];
        $subject = $_POST["subject"];


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
            $mail->addReplyTo("$emailFrom", "$name");

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "$subject";
            $mail->Body    = " <h1>Message Body</h1>
                                <p>$message</P>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $_SESSION['success'] = "Message Sent";
            header('location: contact.php');
        } catch (Exception $e) {
          $_SESSION['success'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          header('location: contact.php');
        } 
        exit();   
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
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a1f6d66f7f.js" crossorigin="anonymous"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="asssets/css/bootstrap/bootstrap.min.css" crossorigin="anonymous">

  <!-- Animate CSS -->
  <link rel="stylesheet" type="text/css" href="asssets/css/animate/animate.min.css">

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

    <!-- Form Section Start -->
    <div class="container" style="height:88vh;">
      <div class="row h-100">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3 class="text-center my-4">GET IN TOUCH</h3>
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
            <form method="POST">
                <div class="form-group my-4">
                    <label for="formGroupExampleInput" class="mb-2">Your Name</label>
                    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter Name" required>
                </div>
                <div class="form-group my-4">
                    <label for="exampleInputEmail1" class="mb-2">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group my-4">
                    <label for="formGroupExampleInput" class="mb-2">Subject</label>
                    <input type="text" name="subject" class="form-control" id="formGroupExampleInput" placeholder="Enter Subject" required>
                </div>
                <div class="form-group my-4">
                    <label for="exampleFormControlTextarea1" class="mb-2">Your Message</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <!-- Form Section End -->
  </header>
  <!-- Header Section End -->


  <div class="footer-section py-5 bg-dark"">
    <div class="container">
      <div class="row">
        <div class="col-md-4 ">
          <a class="navbar-brand footer-logo" href="#">ExploreBD.</a>
        </div>
        <div class="col-md-4">
          <p class="my-3">Links</p>
          <a class="d-block my-1" href="aboutus.html">About Us</a>
            <a class="d-block my-1" href="contact.php">Contact</a>
            <a class="d-block my-1" href="login.php">Sign In</a>
        </div>
        <div class="col-md-4">
          <p class="my-3">Social</p>
          <div class="social-links">
            <ul class="h-100 d-flex align-items-center">
              <li><p>Follow On : </p></li>
              <li><a href="facebook.com"><i class="fab fa-facebook-square"></i></a></li>
              <li><a href="twitter.com"><i class="fab fa-twitter-square"></i></a></li>
              <li><a href="instagram.com"><i class="fab fa-instagram-square"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="p-3 bg-dark" style="border-top: 1px solid  #959595;">
    <div class="container text-center">
      <p>Copyright &copy; <a href="index.html">ExploreBD.</a> 2020</p>
    </div>
  </footer>



  <!-- App.js -->
  <script src="asssets/js/app.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="asssets/js/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="asssets/js/bootstrap/bootstrap.min.js"></script>
</body>

</html>
<!-- HTML END -->