<?php
    include('source/config.php');
    include('source/session.php');

    if(isset($_POST['registerbtn']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['confirmpassword'];

        $query_email = "SELECT * FROM admins WHERE email='$email'";
        $check_email = mysqli_query($con,$query_email);
        
        if (mysqli_num_rows($check_email) > 0)
        {
            $_SESSION['status'] = "Email Already Exist";
            header('location: register.php');
        }
        else
        {
            $query_uname = "SELECT * FROM admins WHERE username='$username'";
            $check_uname = mysqli_query($con,$query_uname);

            if (mysqli_num_rows($check_uname) > 0)
            {
                $_SESSION['status'] = "Username Already Taken";
                header('location: register.php');
            }
            else
            {
                if($password === $cpassword)
                {
                    $hpass = password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO admins (username,password,email) VALUES ('$username','$hpass','$email')";
                    $query_run = mysqli_query($con,$query);

                    if($query_run)
                    {
                        $_SESSION['success'] = "Admin Profile Added";
                        header('location: register.php');
                    }
                    else
                    {
                        $_SESSION['status'] = "Admin Profile Not Added";
                        header('location: register.php');
                    }
                }
                else
                {
                    $_SESSION['status'] = "Password & Confirm Password Does't Same";
                    header('location: register.php');
                }
                    }
        }

        
    }

    if(isset($_POST['update_btn']))
    {
        $id = $_POST['update_id'];
        $username = $_POST['update_username'];
        $email = $_POST['update_email'];

        $query = "UPDATE admins SET username = '$username' , email = '$email' WHERE id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            $_SESSION['success'] = "Admin Profile Updated";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "Admin Profile Not Updated";
            header('Location: register.php');
        }
    }

    if(isset($_POST['delete_btn']))
    {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM admins WHERE id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            $_SESSION['success'] = "Admin Profile Deleted";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "Admin Profile Not Deleted";
            header('Location: register.php');
        }
    }

    if(isset($_POST['user_update_btn']))
    {
        $id = $_POST['user_update_id'];
        $username = $_POST['user_update_username'];
        $email = $_POST['user_update_email'];

        $query = "UPDATE users SET username = '$username' , email = '$email' WHERE id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            $_SESSION['success'] = "User Profile Updated";
            header('Location: users.php');
        }
        else
        {
            $_SESSION['status'] = "User Profile Not Updated";
            header('Location: users.php');
        }
    }

    if(isset($_POST['user_delete_btn']))
    {
        $id = $_POST['user_delete_id'];

        $query = "DELETE FROM users WHERE id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            $_SESSION['success'] = "User Profile Deleted";
            header('Location: users.php');
        }
        else
        {
            $_SESSION['status'] = "User Profile Not Deleted";
            header('Location: users.php');
        }
    }

    if(isset($_POST['loginbtn']))
    {
        $user = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM admins WHERE username='$user' OR email='$user'";
        $query_run = mysqli_query($con,$query);

        if(mysqli_num_rows($query_run) == 1 )
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
                $adminid = $row['id'];
                $hashed_password = $row['password'];
                $username = $row['username'];
            }
            if(password_verify($password, $hashed_password)) 
            {
                $_SESSION['adminid'] = $adminid;
                $_SESSION['username'] = $username;
                header('location: index.php');
            }
            else 
            {
                $_SESSION['status'] = 'Wrong Password';
                header('location: login.php');
            }

        }
        else
        {
            $_SESSION['status'] = 'Admin Not Found';
                header('location: login.php');
        }

    }
    
    if(isset($_POST['adddestinationbtn']))
    {
        $name = $_POST['destination_name'];
        $sdes = $_POST['destination_sdes'];
        $des = $_POST['destination_des'];
        $cost = $_POST['destination_cost'];
        $division = $_POST['destination_division'];
        // $img = $_FILES["destination_img"]['name'];
        


        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) 
        {
            if ($fileError === 0) 
            {
                if ($fileSize < 5000000) 
                {
                    $fileNameNew = uniqid("", true).".".$fileActualExt;
                    $fileDestination = 'upload/'.$fileNameNew;
                    $query = "INSERT INTO destinations (destinations_name,destinations_shortdes,destinations_des,destinations_img,destinations_cost,divisions_id) VALUES ('$name','$sdes','$des','$fileNameNew','$cost','$division');";
                    $query_run = mysqli_query($con,$query);


                    if($query_run)
                    {
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $_SESSION['success'] = 'Destinaitons Added.';
                        header('location: destinations.php');

                    }
                    else
                    {
                        $_SESSION['status'] = 'Something Went Wrong.';
                        header('location: destinations.php');
                    }
                } 
                else 
                {
                    $_SESSION['status'] = 'Your file is too big!';
                    header('location: destinations.php');
                    
                }
            } 
            else 
            {
                $_SESSION['status'] = 'There was an error uploading your file!';
                header('location: destinations.php');
                
            }
        } 
        else 
        {
            $_SESSION['status'] = 'You cannot upload files of this type!';
            header('location: destinations.php');
        }

    }

    if(isset($_POST['update_des_btn']))
    {
        $id = $_POST['update_id'];
        $name = $_POST['destination_name'];
        $sdes = $_POST['destination_sdes'];
        $des = $_POST['destination_des'];
        $cost = $_POST['destination_cost'];
        $division = $_POST['destination_division'];

        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if($fileName == NULL)
        {
            $query = "UPDATE destinations SET destinations_name='$name' , destinations_shortdes='$sdes' , destinations_des = '$des' , destinations_cost = '$cost' , divisions_id = '$division' WHERE id='$id'";
            $query_run = mysqli_query($con,$query);
                if($query_run)
                {
                    $_SESSION['success'] = 'Destinaitons Updated.';
                    header('location: destinations.php');

                }
                else
                {
                    $_SESSION['status'] = 'Something Went Wrong.';
                    header('location: destinations.php');
                }
        }
        else
        {
            if($img_path = "upload/".$img_row['destinations_img'])
            {
                unlink($img_path);
                if (in_array($fileActualExt, $allowed)) 
                {
                    if ($fileError === 0) 
                    {
                        if ($fileSize < 5000000) 
                        {
                            $fileNameNew = uniqid("", true).".".$fileActualExt;
                            $fileDestination = 'upload/'.$fileNameNew;
                            $query = " UPDATE destinations SET destinations_name='$name' , destinations_shortdes='$sdes' , destinations_des = '$des' , destinations_cost = '$cost' , divisions_id = '$division' , destinations_img = '$fileNameNew' WHERE id='$id' ";

                            $query_run = mysqli_query($con,$query);

                            if($query_run)
                            {
                                move_uploaded_file($fileTmpName, $fileDestination);
                                $_SESSION['success'] = 'Destinaitons Updated.';
                                header('location: destinations.php');

                            }
                            else
                            {
                                $_SESSION['status'] = 'Something Went Wrong.';
                                header('location: destinations.php');
                            }
                        } 
                        else 
                        {
                            $_SESSION['status'] = 'Your file is too big!';
                            header('location: destinations.php');
                            
                        }
                    } 
                    else 
                    {
                        $_SESSION['status'] = 'There was an error uploading your file!';
                        header('location: destinations.php');
                        
                    }
                } 
                else 
                {
                    $_SESSION['status'] = 'You cannot upload files of this type!';
                    header('location: destinations.php');
                }

            }
        }
    
    }

    if(isset($_POST['user_reset_del_btn']))
    {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM resetpassword WHERE id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            $_SESSION['success'] = "Request Deleted";
            header('Location: manageuserreset.php');
        }
        else
        {
            $_SESSION['success'] = "Request Not Deleted";
            header('Location: manageuserreset.php');
        }
    }

    if(isset($_POST['admin_reset_del_btn']))
    {
        $id = $_POST['delete_id'];

        $query = "DELETE FROM admins_reset WHERE id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            $_SESSION['success'] = "Request Deleted";
            header('Location: manageadminreset.php');
        }
        else
        {
            $_SESSION['success'] = "Request Not Deleted";
            header('Location: manageadminreset.php');
        }
    }

    if(isset($_POST['addhotelbtn']))
    {
        $name = $_POST['hotel_name'];
        $sdes = $_POST['hotel_sdes'];
        $des = $_POST['hotel_des'];
        $destination = $_POST['hotel_destination'];
        // $img = $_FILES["destination_img"]['name'];
        


        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) 
        {
            if ($fileError === 0) 
            {
                if ($fileSize < 5000000) 
                {
                    $fileNameNew = uniqid("", true).".".$fileActualExt;
                    $fileDestination = 'upload/'.$fileNameNew;
                    $query = "INSERT INTO hotels (hotels_name,hotels_shortdes,hotels_des,hotels_img,destinations_id) VALUES ('$name','$sdes','$des','$fileNameNew','$destination');";
                    $query_run = mysqli_query($con,$query);


                    if($query_run)
                    {
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $_SESSION['success'] = 'Hotel Added.';
                        header('location: hotels.php');

                    }
                    else
                    {
                        $_SESSION['status'] = 'Something Went Wrong.';
                        header('location: hotels.php');
                    }
                } 
                else 
                {
                    $_SESSION['status'] = 'Your file is too big!';
                    header('location: hotels.php');
                    
                }
            } 
            else 
            {
                $_SESSION['status'] = 'There was an error uploading your file!';
                header('location: hotels.php');
                
            }
        } 
        else 
        {
            $_SESSION['status'] = 'You cannot upload files of this type!';
            header('location: hotels.php');
        }

    }

    if(isset($_POST['destinations_delete_btn']))
    {
        $id = $_POST['destinations_delete_id'];

        $img_query = "SELECT * FROM destinations WHERE destinations_id='$id'";
        $img_query_run = mysqli_query($con,$img_query);

        $img_row = mysqli_fetch_assoc($img_query_run);


        $query = "DELETE FROM destinations WHERE destinations_id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            if($img_path = "upload/".$img_row['destinations_img'])
            {
                unlink($img_path);
                $_SESSION['success'] = "Destinations Deleted";
                header('Location: destinations.php');
            }
            else
            {
                $_SESSION['status'] = "Image Not Deleted";
                header('Location: destinations.php');
            }
            
        }
        else
        {
            $_SESSION['status'] = "Destinations Not Deleted";
            header('Location: destinations.php');
        }
    }

    if(isset($_POST['hotels_delete_btn']))
    {
        $id = $_POST['hotels_delete_id'];

        $img_query = "SELECT * FROM hotels WHERE hotels_id='$id'";
        $img_query_run = mysqli_query($con,$img_query);

        $img_row = mysqli_fetch_assoc($img_query_run);


        $query = "DELETE FROM hotels WHERE destinations_id='$id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            if($img_path = "upload/".$img_row['hotels_img'])
            {
                unlink($img_path);
                $_SESSION['success'] = "Hotels Deleted";
                header('Location: hotels.php');
            }
            else
            {
                $_SESSION['status'] = "Hotels Not Deleted";
                header('Location: hotels.php');
            }
            
        }
        else
        {
            $_SESSION['status'] = "Hotels Not Deleted";
            header('Location: hotels.php');
        }
    }
    
?>
