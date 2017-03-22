<?php

session_start();

//setting session variables
$_SESSION['username'] = $_POST['uname']; //Capture username from "login.php" page & assign to $_SESSION['username']
$_SESSION['password'] = $_POST['psw']; //Capture password from "login.php" page & assign to $_SESSION['password']
$_SESSION['authuser'] = 0;

$servername = "localhost";
$username = $_SESSION['username']; //Capture username used to log-in from SESSIONS & assign to $username
$password = $_SESSION['password']; //Capture password used to log-in from SESSIONS & assign to $password
$dbname = "opd"; //Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//SQL Search querry 
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

//Display search results
//check username & password are matched.
//if matched authuser set to 1 -> redirect to home page(index.php)
//if not matched, set authuser to 2 -> redirect to login page -> display error message
if ($result->num_rows > 0) {
    $_SESSION['authuser'] = 1;
} else {
    $_SESSION['authuser'] = 2;
    echo 'Incorrect Username or Password!';
    header("Location:login.php"); //redirect to "login.php" page when username & password is incorrect
    exit();
}
$conn->close(); //Close connection with the database
header("Location:index.php"); //redirect to "index.php" page

