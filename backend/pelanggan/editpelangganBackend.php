<?php
include '../../head/session.php';
include '../../head/koneksi.php';

$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$no_telepon = $_POST['nomor_whatsapp'];
$alamat = $_POST['alamat'];

$query = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', no_telepon='$no_telepon', alamat='$alamat' WHERE id_pelanggan='$id_pelanggan'");
if ($query) {
	$_SESSION['status'] = "Data berhasil diubah!";
	header("Location: ../../pelanggan.php");
} else {
?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<p>Data gagal diubah!</p>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php
}
?>