<?php
include '../../head/session.php';
include '../../head/koneksi.php';

$id_produksi = $_POST['id_produksi'];

$query = mysqli_query($koneksi, "DELETE FROM produksi WHERE id_produksi = '$id_produksi'");
if ($query) {
    $_SESSION['status'] = "Data berhasil dihapus!";
    header("Location: ../../produksi.php");
} else {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p>Data gagal dihapus!</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}

?>