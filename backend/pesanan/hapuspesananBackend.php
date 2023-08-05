<?php 
	include '../../head/session.php';
	include '../../head/koneksi.php';

    $id_pesanan = $_POST['id_pesanan'];

    $query = mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'");

    header("Location: ../../pesanan.php");

?>