<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bong Tailor - Riwayat Pesanan</title>

    <?php
        include_once('head/assets.php');
        include_once('head/koneksi.php');
        include_once('head/session.php');
        if(!$_SESSION['logged_in']) header('Location: login.php');
    ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <i class="fas fa-users-cog fa-lg"></i>
                <div class="sidebar-brand-text mx-3">Bong Tailor</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home fa-lg"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="pesanan.php">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    <span>Pesanan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="pelanggan.php">
                    <i class="fas fa-users fa-lg"></i>
                    <span>Pelanggan</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-table fa-lg"></i>
                    <span>Riwayat Pesanan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                                    <?php
                                        $id_admin = $_SESSION['id_admin'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id_admin'");
                                        $query = mysqli_fetch_array($query);
                                        echo($query['nama_admin']);
                                    ?>

                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Modal Tambah Produksi -->
                <div class="modal fade" id="tambah_produksi" tabindex="-1" role="dialog" aria-labelledby="tambah_produksi" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambah_produksi">Tambah Riwayat Pesanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="backend/produksi/tambahproduksiBackend.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="pesanan">Pesanan</label>
                                        <select class="form-control" id="pesanan" name="pesanan">
                                            <?php
                                                $query = mysqli_query($koneksi,
                                                    "SELECT pesanan.*, pelanggan.nama_pelanggan
                                                    FROM pesanan
                                                    INNER JOIN pelanggan
                                                    ON pesanan.id_pelanggan = pelanggan.id_pelanggan");

                                                foreach($query as $pesanan) :
                                                    $tanggalPemesanan = strtotime($pesanan['tanggal_pesanan']);
                                                    $tanggalPemesanan = date('m/d/Y', $tanggalPemesanan);
                                                    $pesananString = $pesanan['nama_pelanggan']." - ".$pesanan['jenis_pesanan']." ".$pesanan['ukuran']." - ".$tanggalPemesanan;
                                            ?>
                                            <option value="<?php echo $pesanan['id_pesanan'] ?>"><?php echo $pesananString ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="foto">Foto Produk</label>
                                        <input type="file" class="form-control-file" id="foto" name="foto">
                                    </div>

                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="tambah_produk" class="btn btn-success">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.Modal Tambah Produksi -->

                <!-- Modal Edit Produksi -->
                <div class="modal fade" id="edit_produksi" tabindex="-1" role="dialog" aria-labelledby="edit_produksi" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit_produksi">Edit Produksi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="">
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="foto">Foto Produk</label>
                                            <input type="file" class="form-control-file" id="foto" class="form-control">
                                        </div>
                                    </form>
                                    <div class="form-group">
                                        <label for="nama_pelanggan">Nama Pelanggan</label>
                                        <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_produk">Jenis Produk</label>
                                        <select class="form-control" id="jenis_produk">
                                            <option>Kameja</option>
                                            <option>Celana</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ukuran">Ukuran</label>
                                        <select class="form-control" id="ukuran">
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>XL</option>
                                            <option>XXL</option>
                                            <option>XXXL</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" name="harga" class="form-control" placeholder="Harga">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="edit_produk" class="btn btn-success">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.Modal Edit Produksi -->

                <!-- Modal Hapus Produksi -->
                <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal" aria-hidden="true">
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
                                <a class="btn btn-danger" href="produksi.php">Ya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.Modal Hapus Produksi -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-900">Riwayat Pesanan</h1>

                            <button type="button" class="btn btn-success btn-lg btn-block mb-2" data-toggle="modal" data-target="#tambah_produksi">Tambah Riwayat Pesanan</button>

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Tanggal Pesanan</th>
                                                    <th>Jenis Produk</th>
                                                    <th>Ukuran</th>
                                                    <th>Harga Total</th>
                                                    <th>Deskripsi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query = mysqli_query($koneksi,
                                                        "SELECT produksi.*, pesanan.*, pelanggan.nama_pelanggan
                                                        FROM ((produksi
                                                        INNER JOIN pesanan ON produksi.id_pesanan = pesanan.id_pesanan)
                                                        INNER JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan)");
                                                    $i = 1;
                                                    foreach($query as $produksi) :
                                                ?>

                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><img src="<?php echo $produksi['foto']; ?>" width=150/></td>
                                                    <td><?php echo $produksi['nama_pelanggan']; ?></td>
                                                    <td><?php
                                                        $tanggalPemesanan = strtotime($produksi['tanggal_pesanan']);
                                                        echo date('m/d/Y', $tanggalPemesanan);
                                                    ?></td>
                                                    <td><?php echo $produksi['jenis_pesanan']; ?></td>
                                                    <td><?php echo $produksi['ukuran']; ?></td>
                                                    <td><?php
                                                        $harga_total = $produksi['harga_total'];
                                                        echo "Rp ".number_format($harga_total, 0, ",", ".");
                                                    ?></td>
                                                    <td><?php echo $produksi['deskripsi']; ?></td>
                                                    <td>
                                                        <!--a class="btn btn-warning edit_button" data-toggle="modal" data-target="#edit_produksi" data-id="<?php echo $produksi['id_produksi']; ?>"><i class="fas fa-edit fa-sm"></i></a-->
                                                        &nbsp;
                                                        <a class="btn btn-danger delete_button" data-toggle="modal" data-target="#delete_modal" data-id="<?php echo $produksi['id_produksi']; ?>"><i class="fas fa-trash fa-sm"></i></a>
                                                    </td>
                                                </tr>

                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.container-fluid -->
                    </div>
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Bong Tailor 2023</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModal">Keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Apa kamu yakin ingin keluar?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger" href="backend/logoutBackend.php">Keluar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script Edit & Delete Modal -->
        <script type="text/javascript">
            $('.edit_button').click(function(e) {
                $id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "modals/produksiEdit.php",
                    data: {id:$id},
                    success: function(response) {
                        $('#edit_produksi').html(response);
                    }
                });
            });
            $('.delete_button').click(function(e) {
                $id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "modals/produksiHapus.php",
                    data: {id:$id},
                    success: function(response) {
                        $('#delete_modal').html(response);
                    }
                });
            });
        </script>

</body>

</html>