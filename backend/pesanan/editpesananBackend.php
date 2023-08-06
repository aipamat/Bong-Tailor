<?php
include '../../head/session.php';
include '../../head/koneksi.php';

$id_pesanan = $_POST['id_pesanan'];
$id_pelanggan = $_POST['pelanggan'];
$jenis_pesanan = $_POST['jenis_pesanan'];
$ukuran = $_POST['ukuran'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$harga_total = $harga * $jumlah;
$tanggal_pesanan = $_POST['tanggal_pesanan'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$status_pemesanan = $_POST['status_pesanan'];

$query = mysqli_query($koneksi, "UPDATE pesanan SET id_pelanggan='$id_pelanggan', jenis_pesanan='$jenis_pesanan', ukuran='$ukuran', harga='$harga', jumlah='$jumlah', harga_total='$harga_total', tanggal_pesanan='$tanggal_pesanan', tanggal_selesai='$tanggal_selesai', status_pemesanan='$status_pemesanan'  WHERE id_pesanan='$id_pesanan'");
if ($query) {
    $_SESSION['status'] = "Data berhasil diubah!";
    header("Location: ../../pesanan.php");
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