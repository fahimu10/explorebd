<?php 

if (isset($_POST['login-btn'])) 
{
  include 'source/session.php';
  include 'source/config.php';

	$uid = $_POST['user-name'];
	$pwd = $_POST['user-pass'];

	//Error handlers
	//Check if inputs are empty

		$sql = "SELECT * FROM users WHERE username='$uid' OR email='$uid'";
		$result = mysqli_query($con, $sql);
		$resultCheck = mysqli_num_rows($result);
    
    if ($resultCheck < 1) 
    {
			$_SESSION['status'] = "You are not registered";
      header('location: login.php');
    } 
    
    else 
    {
      
      if ($row = mysqli_fetch_assoc($result)) 
      {
				//De-hashing the paswrd
				$hashedPwdCheck = password_verify($pwd, $row['password']);
        
        if ($hashedPwdCheck == false) 
        {
					$_SESSION['status'] = "Wrong Password";
          header('location: login.php');
        } 
        
        elseif ($hashedPwdCheck == true) 
        {
					//Log in the user here
					$_SESSION['userid'] = $row['id'];
					$_SESSION['useremail'] = $row['email'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['success'] = "You are loged in";
          header('location: landing.php');
				}
			}
		}
	}
 

else 
{
	header("Location: index.html");
	exit();
}