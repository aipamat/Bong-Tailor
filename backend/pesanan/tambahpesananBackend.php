<?php 
	include '../../head/session.php';
	include '../../head/koneksi.php';

    $id_admin = $_SESSION['id_admin'];
	$id_pelanggan = $_POST['pelanggan'];
	$jenis_pesanan = $_POST['jenis_pesanan'];
	$ukuran = $_POST['ukuran'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $harga_total = $harga * $jumlah;
    $tanggal_pesanan = $_POST['tanggal_pesanan'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $status_pemesanan = $_POST['status_pesanan'];

    $query = mysqli_query($koneksi, "INSERT INTO pesanan (id_admin, id_pelanggan, jenis_pesanan, ukuran, harga, jumlah, harga_total, tanggal_pesanan, tanggal_selesai, status_pemesanan) VALUES ('$id_admin', '$id_pelanggan', '$jenis_pesanan', '$ukuran', '$harga', '$jumlah', '$harga_total', '$tanggal_pesanan', '$tanggal_selesai', '$status_pemesanan')");

    header("Location: ../../pesanan.php");

?>