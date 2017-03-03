<?php
session_start();
//setting session variables
$_SESSION['username']= $_POST['uname'];
$_SESSION['password']= $_POST['psw'];
$_SESSION['authuser']= 1;

//check username & password are matched.
//if matched authuser set to 1 -> redirect to home page(index.php)
//if not matched, set authuser to 2 -> redirect to login page -> display error message
if (($_SESSION['username'] == 'admin') && ($_SESSION['password'] == '12345')) {
    $_SESSION['authuser'] = 1;
} else {
    $_SESSION['authuser'] = 2;
    echo 'Incorrect Username or Password!';
    header("Location:login.php");
    exit();
}
echo 'Login Successful';
header("Location:index.php");

