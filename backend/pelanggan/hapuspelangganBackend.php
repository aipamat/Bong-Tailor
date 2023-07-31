<?php 
	include '../../head/session.php';
	include '../../head/koneksi.php';

    $id_pelanggan = $_POST['id_pelanggan'];

    $query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");

    header("Location: ../../pelanggan.php");

?>