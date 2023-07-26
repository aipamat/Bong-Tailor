<?php 

    include '../head/koneksi.php';
    include '../head/session.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username ='$username' AND password = '$password'");
    $cek = mysqli_num_rows($query);
    if ($cek) {
        session_regenerate_id();
        $_SESSION['logged_in'] = true;
        header("Location: ../index.php");
    }
    else header("Location: ../login.php");

?>