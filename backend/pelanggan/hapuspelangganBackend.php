<?php
include '../../head/session.php';
include '../../head/koneksi.php';

$id_pelanggan = $_POST['id_pelanggan'];

$query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
if ($query) {
    $_SESSION['status'] = "Data berhasil dihapus!";
    header("Location: ../../pelanggan.php");
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