<?php include_once('../head/koneksi.php'); ?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Pelanggan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
            $id = (isset($_POST["id"])) ? $_POST["id"] : null;
            $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
            $query = mysqli_fetch_assoc($query);
        ?>
        <form action="backend/pelanggan/editpelangganBackend.php" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" value="<?php echo $query['nama_pelanggan'] ?>">
                </div>
                <div class="form-group">
                    <label for="nomor_whatsapp">Nomor WhatsApp</label>
                    <input type="text" id="nomor_whatsapp" name="nomor_whatsapp" class="form-control" value="<?php echo $query['no_telepon'] ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $query['alamat'] ?></textarea>
                </div>
                <div class="form-group" hidden>
                    <input type="number" id="id_pelanggan" name="id_pelanggan" class="form-control" value="<?php echo $id ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="edit_pelanggan" class="btn btn-success">Edit</button>
            </div>
        </form>
    </div>
</div>