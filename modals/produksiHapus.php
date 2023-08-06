<?php // if(!$_SESSION['logged_in']) header('Location: ../login.php'); ?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="delete_modal">Hapus?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Apa kamu yakin ingin menghapus data ini?</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <?php $id = (isset($_POST["id"])) ? $_POST["id"] : null; ?>
            <form action="backend/produksi/hapusproduksiBackend.php" method="post">
                <input type="number" id="id_produksi" name="id_produksi" value="<?php echo $id ?>" hidden>
                <button class="btn btn-danger" name="hapus_produksi" type="submit">Ya</a>
            </form>
        </div>
    </div>
</div>