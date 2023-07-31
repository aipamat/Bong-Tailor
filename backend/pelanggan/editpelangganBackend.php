<?php 
	include '../../head/session.php';
	include '../../head/koneksi.php';

    $id_pelanggan = $_POST['id_pelanggan'];
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$no_telepon = $_POST['nomor_whatsapp'];
	$alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', no_telepon='$no_telepon', alamat='$alamat' WHERE id_pelanggan='$id_pelanggan'");

    header("Location: ../../pelanggan.php");

?>