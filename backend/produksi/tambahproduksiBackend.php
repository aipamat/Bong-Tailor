<?php
include '../../head/session.php';
include '../../head/koneksi.php';

$id_pesanan = $_POST['pesanan'];
$foto = "";
$deskripsi = nl2br($_POST['deskripsi']);
$dir = "img/produksi/";

// SELECT PESANAN
$query = mysqli_query(
    $koneksi,
    "SELECT pesanan.*, pelanggan.nama_pelanggan
        FROM pesanan
        INNER JOIN pelanggan
        ON pesanan.id_pelanggan = pelanggan.id_pelanggan
        WHERE pesanan.id_pesanan = '$id_pesanan'"
);
$query = mysqli_fetch_assoc($query);

$nama_pelanggan = $query['nama_pelanggan'];
$jenis_pesanan = $query['jenis_pesanan'];
$ukuran = $query['ukuran'];
$tanggal_pesanan = strtotime($query['tanggal_pesanan']);
$tanggal_pesanan = date('m-d-Y', $tanggal_pesanan);

// HANDLING FOTO
$namafoto = $_FILES['foto']['name'];
$tmpfoto = $_FILES['foto']['tmp_name'];
$namafotobaru = $tanggal_pesanan . "-" . str_replace(" ", "", $nama_pelanggan) . $jenis_pesanan . $ukuran;

if ($namafoto) {
    if (file_exists("../../" . $dir . $namafotobaru . ".jpg")) unlink("../../" . $dir . $namafotobaru . ".jpg");
    move_uploaded_file($tmpfoto, "../../" . $dir . $namafotobaru . ".jpg");
    $foto = $dir . $namafotobaru . ".jpg";
}

$query = mysqli_query($koneksi, "INSERT INTO produksi (id_pesanan, foto, deskripsi) VALUES ('$id_pesanan', '$foto', '$deskripsi')");


if ($query) {
    $_SESSION['status'] = "Data berhasil ditambahkan!";
    header("Location: ../../produksi.php");
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