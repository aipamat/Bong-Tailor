<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="delete_pelanggan">Hapus?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Apa kamu yakin ingin menghapus data ini?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <?php $id = (isset($_POST["id"])) ? $_POST["id"] : null; ?>
            <form action="backend/pelanggan/hapuspelangganBackend.php" method="post">
                <input type="number" id="id_pelanggan" name="id_pelanggan" value="<?php echo $id ?>" hidden>
                <button class="btn btn-danger" name="hapus_pelanggan" type="submit">Ya</a>
            </form>
        </div>
    </div>
</div>