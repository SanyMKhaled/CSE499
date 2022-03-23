<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdata";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

session_start();

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];
}
      
      $sql = "SELECT username,password FROM admin WHERE username = '$email' AND password = '$password'";
      $result = mysqli_query($conn,$sql);
      if (mysqli_num_rows($result) == 1){
          $_SESSION['login'] = true;
          $_SESSION['email'] =$email;
        header("location: dashboard.php");
      }
      else {
        echo"Invalid UserName or Password. Redirecting to Login Page...";
        header("Refresh:1.5; url=index.php");
      }
?>