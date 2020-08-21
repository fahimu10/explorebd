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
            $SQLInsert = "INSERT INTO admins_reset (code, email)
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
            $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/proceedadminreset.php?code=$code";
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Reset Password';
            $mail->Body    = " <h1> You requested a password reset</h1> 
                                Click <a href='$url'>this link</a> to proceed";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $_SESSION['success'] = 'Reset password link has been sent to your Email.';
            header('location: adminpassreset.php');
        } catch (Exception $e) {
            $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header('location: adminpassreset.php');
        } 
        exit();   
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
                
                <input type="email" class="form-control mb-3" name="email" placeholder="Enter Your Registered Email" required autofocus>
                
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