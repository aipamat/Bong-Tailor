<?php
include '../../head/session.php';
include '../../head/koneksi.php';

$nama_pelanggan = $_POST['nama_pelanggan'];
$no_telepon = $_POST['nomor_whatsapp'];
$alamat = $_POST['alamat'];

$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE nama_pelanggan = '$nama_pelanggan' AND no_telepon = '$no_telepon' AND alamat = '$alamat'");
$cek = mysqli_num_rows($query);

if (!$cek) {
    $query = mysqli_query($koneksi, "INSERT INTO pelanggan (nama_pelanggan, no_telepon, alamat) VALUES ('$nama_pelanggan', '$no_telepon', '$alamat')");
} else echo ("<script> alert('Sudah ada pelanggan yang sama') </script>");

if ($query) {
    $_SESSION['status'] = "Data berhasil ditambahkan!";
    header("Location: ../../pelanggan.php");
} else {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>Data gagal ditambahkan!</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
?>