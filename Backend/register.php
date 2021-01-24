<?php
require 'db.php';
session_start();
if (isset($_REQUEST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $create_datetime=date('Y-m-d H:i:s');


    $sql="select * from users where ( email='$email');";
    $check=mysqli_query($con, $sql);
    $sql1="select * from users where (username='$username');";
    $check1=mysqli_query($con, $sql1);
    if (mysqli_num_rows($check)>0) {
        echo "<script LANGUAGE='JavaScript'>
  window.alert('Email Is Taken');
  window.location.href='http://localhost/Personal%20CSS/FrontEnd/register.html';
  </script>";
    } elseif (mysqli_num_rows($check1)>0) {
        echo "<script LANGUAGE='JavaScript'>
window.alert('Username Is Taken');
window.location.href='http://localhost/Personal%20CSS/FrontEnd/register.html';
</script>";
    } elseif (empty($username && $password && $email)) {
        echo "<script LANGUAGE='JavaScript'>
window.alert('Fields Are Not empty');
window.location.href='http://localhost/Personal%20CSS/FrontEnd/register.html';
</script>";
    } else {
        $query = ("INSERT INTO users ( username, email, password, create_datetime) VALUES ('$username','$email','" . md5($password) . "','$create_datetime');");

        $result = mysqli_query($con, $query);
        if ($result) {
            echo"<script LANGUAGE='JavaScript'>
        window.alert('Register Successfully');
        window.location.href='http://localhost/Personal%20CSS/FrontEnd/index.html';
        </script>";
        } else {
            echo"<script LANGUAGE='JavaScript'>
        window.alert('Not Register Please Try Again');
        window.location.href='http://localhost/Personal%20CSS/FrontEnd/register.html';
        </script>";
        }
    }
}



?>