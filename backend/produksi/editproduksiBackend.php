<?php 
	include '../../head/session.php';
	include '../../head/koneksi.php';

    $id_produksi = $_POST['id_produksi'];
    $id_pesanan = $_POST['pesanan'];
    $foto = $_POST['foto_default'];
    $deskripsi = nl2br($_POST['deskripsi']);
    $dir = "img/produksi/";

    if (isset($_POST['foto'])) {
        // SELECT PESANAN
        $query = mysqli_query($koneksi,
            "SELECT pesanan.*, pelanggan.nama_pelanggan
            FROM pesanan
            INNER JOIN pelanggan
            ON pesanan.id_pelanggan = pelanggan.id_pelanggan
            WHERE pesanan.id_pesanan = '$id_pesanan'");
        $query = mysqli_fetch_assoc($query);

        $nama_pelanggan = $query['nama_pelanggan'];
        $jenis_pesanan = $query['jenis_pesanan'];
        $ukuran = $query['ukuran'];
        $tanggal_pesanan = strtotime($query['tanggal_pesanan']);
        $tanggal_pesanan = date('m-d-Y', $tanggal_pesanan);

        // HANDLING FOTO
        $namafoto = $_FILES['foto']['name'];
        $tmpfoto = $_FILES['foto']['tmp_name'];
        $namafotobaru = $tanggal_pesanan."-".str_replace(" ", "", $nama_pelanggan).$jenis_pesanan.$ukuran;

        if ($namafoto) {
            if (file_exists("../../".$dir.$namafotobaru.".jpg")) unlink("../../".$dir.$namafotobaru.".jpg");
            move_uploaded_file($tmpfoto, "../../".$dir.$namafotobaru.".jpg");
            $foto = $dir.$namafotobaru.".jpg";
        }
    }

    $query = mysqli_query($koneksi, "UPDATE produksi SET id_pesanan='$id_pesanan', foto='$foto', deskripsi='$deskripsi' WHERE id_produksi='$id_produksi'");

    header("Location: ../../produksi.php");

?>