<?php
    include_once('../head/koneksi.php');
    // if(!$_SESSION['logged_in']) header('Location: ../login.php');
?>

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="edit_pesanan">Edit Pesanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
            $id = (isset($_POST["id"])) ? $_POST["id"] : null;
            $query = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan='$id'");
            $query = mysqli_fetch_assoc($query);
            $queryPelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
        ?>
        <form action="backend/pesanan/editpesananBackend.php" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <select class="form-control" id="nama_pelanggan" name="pelanggan">
                        <?php foreach($queryPelanggan as $pelanggan) : ?>

                        <option value="<?php echo $pelanggan['id_pelanggan'] ?>"
                        <?php if($query['id_pelanggan'] == $pelanggan['id_pelanggan']) echo "selected"; ?>
                        ><?php echo $pelanggan['nama_pelanggan']; ?></option>
                        
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jenis_pesanan">Jenis Pesanan</label>
                    <select class="form-control" id="jenis_pesanan" name="jenis_pesanan">
                        <option value="Kemeja" <?php if($query['jenis_pesanan'] == "Kemeja") echo "selected"; ?>>Kemeja</option>
                        <option value="Celana" <?php if($query['jenis_pesanan'] == "Celana") echo "selected"; ?>>Celana</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <select class="form-control" id="ukuran" name="ukuran">
                        <option value="S" <?php if($query['ukuran'] == "S") echo "selected"; ?>>S</option>
                        <option value="M" <?php if($query['ukuran'] == "M") echo "selected"; ?>>M</option>
                        <option value="L" <?php if($query['ukuran'] == "L") echo "selected"; ?>>L</option>
                        <option value="XL" <?php if($query['ukuran'] == "XL") echo "selected"; ?>>XL</option>
                        <option value="XXL" <?php if($query['ukuran'] == "XXL") echo "selected"; ?>>XXL</option>
                        <option value="XXXL" <?php if($query['ukuran'] == "XXXL") echo "selected"; ?>>XXXL</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Harga Satuan</label>
                    <input type="number" id="hargaEdit" name="harga" class="form-control" value="<?php echo $query['harga']; ?>">
                </div>
                
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" id="jumlahEdit" name="jumlah" class="form-control" value="<?php echo $query['jumlah']; ?>">
                </div>

                <div class="form-group">
                    <label>Harga Total</label>
                    <input type="number" id="harga_totalEdit" class="form-control" value="<?php echo $query['harga_total']; ?>" disabled>
                </div>

                <div class="form-group"> <!-- Date input -->
                    <label class="control-label" for="tanggal_pesanan">Tanggal Pesanan</label>
                    <input class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" placeholder="MM/DD/YYYY" type="date" value="<?php
                    $tanggalPemesanan = strtotime($query['tanggal_pesanan']);
                    echo date('Y-m-d', $tanggalPemesanan);
                    ?>"/>
                </div>

                <div class="form-group"> <!-- Date input -->
                    <label class="control-label" for="tanggal_selesai">Tanggal Selesai</label>
                    <input class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="MM/DD/YYYY" type="date" value="<?php
                    $tanggalSelesai = strtotime($query['tanggal_selesai']);
                    echo date('Y-m-d', $tanggalSelesai);
                    ?>"/>
                </div>

                <div class="form-group">
                    <label for="status_pesanan">Status Pesanan</label>
                    <select class="form-control" id="status_pesanan" name="status_pesanan">
                        <option value="Belum" <?php if($query['status_pemesanan'] == "Belum") echo "selected"; ?>>Belum Selesai</option>
                        <option value="Proses" <?php if($query['status_pemesanan'] == "Proses") echo "selected"; ?>>Proses</option>
                        <option value="Selesai" <?php if($query['status_pemesanan'] == "Selesai") echo "selected"; ?>>Selesai</option>
                    </select>
                </div>

                <div class="form-group" hidden>
                    <input type="number" id="id_pesanan" name="id_pesanan" class="form-control" value="<?php echo $id ?>">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="edit_pesanan" class="btn btn-success">Edit</button>
            </div>
        </form>
    </div>
</div>

<!-- Script Harga Total -->
<script type="text/javascript">
    $('#hargaEdit, #jumlahEdit').change(function(e) {
        $hargaEdit = $('#hargaEdit').val();
        $jumlahEdit = $('#jumlahEdit').val();
        $('#harga_totalEdit').val($hargaEdit * $jumlahEdit);
    });
</script>