<?php
    include('include/session.php');
?>
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
            <form class="form-signin" action="code.php" method="POST">
                <!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
                    width="72" height="72"> -->
                <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>
                <?php 
                if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                {
                    echo '<h3 class="bg-success text-white p-1"> '.$_SESSION['success'].'</h3>';
                    unset($_SESSION['success']);
                }
                if(isset($_SESSION['status']) && $_SESSION['status'] != '')
                {
                    echo '<h3 class="bg-danger text-white p-1">'.$_SESSION['status'].'</h3>';
                    unset($_SESSION['status']);
                }
                ?>
                <input type="text" class="form-control mb-3" name="username" placeholder="Username" required autofocus>
                
                <input type="password" class="form-control mb-3" name="password" placeholder="Password" required>
                
                <button class="btn btn-lg btn-primary btn-block mb-3" type="submit" name="loginbtn">Sign in</button>
                <a class="mb-3" href="adminpassreset.php">Forgot Password</a>
                <p class="mt-5 mb-3 text-muted">Copyright &copy; ExploreBD. 2020</p>
            </form>
        </div>
    </div>
   
    </div>
    <!-- End of Content Wrapper -->
    </div>

</body>

</html>