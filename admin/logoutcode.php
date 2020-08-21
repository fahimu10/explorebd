<?php
include('include/session.php');

if(isset($_POST['logoutbtn']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}