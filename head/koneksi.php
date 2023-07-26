<?php

//koneksi database
$server     ="localhost";
$user       ="root";
$password   = "";
$database   ="bong_tailor";

//buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database)  or die (mysqli_error($koneksi));