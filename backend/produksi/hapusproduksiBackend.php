<?php 
	include '../../head/session.php';
	include '../../head/koneksi.php';

    $id_produksi = $_POST['id_produksi'];

    $query = mysqli_query($koneksi, "DELETE FROM produksi WHERE id_produksi = '$id_produksi'");

    header("Location: ../../produksi.php");

?>