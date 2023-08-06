<?php
    include_once('../head/koneksi.php');
    // if(!$_SESSION['logged_in']) header('Location: ../login.php');
?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="edit_produksi">Edit Riwayat Pesanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="backend/produksi/editproduksiBackend.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <?php
                    $id = (isset($_POST["id"])) ? $_POST["id"] : null;
                    $query = mysqli_query($koneksi, "SELECT * FROM produksi WHERE id_produksi='$id'");
                    $query = mysqli_fetch_assoc($query);
                ?>
                <div class="form-group">
                    <label for="pesanan">Pesanan</label>
                    <select class="form-control" id="pesanan" name="pesanan">
                        <?php
                            $queryPesanan = mysqli_query($koneksi,
                                "SELECT pesanan.*, pelanggan.nama_pelanggan
                                FROM pesanan
                                INNER JOIN pelanggan
                                ON pesanan.id_pelanggan = pelanggan.id_pelanggan");

                            foreach($queryPesanan as $pesanan) :
                                $tanggalPemesanan = strtotime($pesanan['tanggal_pesanan']);
                                $tanggalPemesanan = date('m/d/Y', $tanggalPemesanan);
                                $pesananString = $pesanan['nama_pelanggan']." - ".$pesanan['jenis_pesanan']." ".$pesanan['ukuran']." - ".$tanggalPemesanan;
                        ?>
                        <option value="<?php echo $pesanan['id_pesanan'] ?>"
                        <?php if($query['id_pesanan'] == $pesanan['id_pesanan']) echo "selected"; ?>
                        ><?php echo $pesananString ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="foto">Foto Produk</label>
                    <input type="file" class="form-control-file" id="foto" name="foto">
                </div>

                <div class="form-group" hidden>
                    <input type="text" class="form-control" name="foto_default" value="<?php echo $query['foto']; ?>">
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo $query['deskripsi']; ?></textarea>
                </div>

                <div class="form-group" hidden>
                    <input type="number" id="id_produksi" name="id_produksi" class="form-control" value="<?php echo $id ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="edit_produk" class="btn btn-success">Edit</button>
            </div>
        </form>
    </div>
</div>