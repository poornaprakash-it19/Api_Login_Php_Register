<?php
require 'db.php';
session_start();
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users where username = '$username' and password = '". md5($password) ."'";

    $result = mysqli_query($con, $query);

    $row = mysqli_num_rows($result);

    if ($row==1) {
        $_SESSION['username'] = $username;
        
        
        header("Location: dasboard.php");
    } else {
      echo "<script LANGUAGE='JavaScript'>
       window.alert('Your are not login');
       window.location.href='http://localhost/Personal%20CSS/FrontEnd/login.html';
       </script>";
    }
}

?>
