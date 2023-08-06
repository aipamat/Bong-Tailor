<?php
include '../../head/session.php';
include '../../head/koneksi.php';

$id_pesanan = $_POST['id_pesanan'];

$query = mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'");
if ($query) {
    $_SESSION['status'] = "Data berhasil dihapus!";
    header("Location: ../../pesanan.php");
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