<?php

if (isset($_POST['signup-btn'])) 
{
	include 'source/session.php';
	include_once 'source/config.php';

	$email = $_POST['user-email'];
	$uid = $_POST['user-name'];
	$pwd = $_POST['user-pass'];

	//Error handlers

			//Check if email is valid
				$sql = "SELECT * FROM users WHERE username='$uid'";
				$result = mysqli_query($con, $sql);
				$resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) 
        {
					$_SESSION['status'] = "Username Taken";
          header('location: signup.php');
        } 
        else 
        {
          $sql = "SELECT * FROM users WHERE email='$email'";
          $result = mysqli_query($con, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) 
          {
            $_SESSION['status'] = "Email already registerd with a account";
            header('location: signup.php');
          }

          else
          {
            //Hashing the password
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            //Insert the user into the database
            $sql = "INSERT INTO users (username  , password, email) VALUES ('$uid', '$hashedPwd', '$email');";
            $result = mysqli_query($con, $sql);
            
            if($result)
            {
              $_SESSION['success'] = "Sign up successful";
              header('location: login.php');
            }
            else
            {
              $_SESSION['status'] = "Something went wrong";
              header('location: signup.php');
            }
				  }
			  }
	    }
   


?>
