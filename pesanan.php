<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bong Tailor - Pesanan</title>

    <?php
    include_once('head/assets.php');
    include_once('head/koneksi.php');
    include_once('head/session.php');
    if (!$_SESSION['logged_in']) header('Location: login.php');
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
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    <span>Pesanan</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="pelanggan.php">
                    <i class="fas fa-users fa-lg"></i>
                    <span>Pelanggan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="produksi.php">
                    <i class="fas fa-table fa-lg"></i>
                    <span>Produksi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
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
                                    echo ($query['nama_admin']);
                                    ?>

                                </span>
                                <img class="img-profile rounded-circle" src="img/user.svg">
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

                <!-- Modal Tambah Pesanan -->
                <div class="modal fade" id="tambah_pesanan" tabindex="-1" role="dialog" aria-labelledby="tambah_pesanan" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambah_pesanan">Tambah Pesanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="backend/pesanan/tambahpesananBackend.php" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama_pelanggan">Nama Pelanggan</label>
                                        <select class="form-control" id="nama_pelanggan" name="pelanggan">
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                            foreach ($query as $pelanggan) :
                                            ?>
                                                <option value="<?php echo $pelanggan['id_pelanggan'] ?>"><?php echo $pelanggan['nama_pelanggan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis_pesanan">Jenis Pesanan</label>
                                        <select class="form-control" id="jenis_pesanan" name="jenis_pesanan">
                                            <option value="Kemeja">Kemeja</option>
                                            <option value="Celana">Celana</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="ukuran">Ukuran</label>
                                        <select class="form-control" id="ukuran" name="ukuran">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                            <option value="XXXL">XXXL</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga Satuan</label>
                                        <input type="number" id="harga" name="harga" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" id="jumlah" name="jumlah" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Harga Total</label>
                                        <input type="number" id="harga_total" class="form-control" disabled>
                                    </div>

                                    <div class="form-group"> <!-- Date input -->
                                        <label class="control-label" for="tanggal_pesanan">Tanggal Pesanan</label>
                                        <input class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" placeholder="MM/DD/YYYY" type="date" />
                                    </div>

                                    <div class="form-group"> <!-- Date input -->
                                        <label class="control-label" for="tanggal_selesai">Tanggal Selesai</label>
                                        <input class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="MM/DD/YYYY" type="date" />
                                    </div>

                                    <div class="form-group">
                                        <label for="status_pesanan">Status Pesanan</label>
                                        <select class="form-control" id="status_pesanan" name="status_pesanan">
                                            <option value="Belum">Belum Selesai</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Selesai">Selesai</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="tambah_pesanan" class="btn btn-success">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.Modal Tambah Pesanan -->

                <!-- Modal Edit Pesanan -->
                <div class="modal fade" id="edit_pesanan" tabindex="-1" role="dialog" aria-labelledby="edit_pesanan" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit_pesanan">Edit Pesanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama_pelanggan">Nama Pelanggan</label>
                                        <select class="form-control" id="nama_pelanggan" name="pelanggan">
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                            foreach ($query as $pelanggan) :
                                            ?>
                                                <option value="<?php echo $pelanggan['id_pelanggan'] ?>"><?php echo $pelanggan['nama_pelanggan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis_pesanan">Jenis Pesanan</label>
                                        <select class="form-control" id="jenis_pesanan" name="jenis_pesanan">
                                            <option value="Kemeja">Kemeja</option>
                                            <option value="Celana">Celana</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="ukuran">Ukuran</label>
                                        <select class="form-control" id="ukuran" name="ukuran">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                            <option value="XXXL">XXXL</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="harga" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control">
                                    </div>

                                    <div class="form-group"> <!-- Date input -->
                                        <label class="control-label" for="tanggal_pesanan">Tanggal Pesanan</label>
                                        <input class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" placeholder="MM/DD/YYYY" type="date" />
                                    </div>

                                    <div class="form-group"> <!-- Date input -->
                                        <label class="control-label" for="tanggal_selesai">Tanggal Selesai</label>
                                        <input class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="MM/DD/YYYY" type="date" />
                                    </div>

                                    <div class="form-group">
                                        <label for="status_pesanan">Status Pesanan</label>
                                        <select class="form-control" id="status_pesanan" name="status_pesanan">
                                            <option value="Belum">Belum Selesai</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Selesai">Selesai</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="edit_pesanan" class="btn btn-success">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit Pesanan -->

                <!-- Modal Hapus Pesanan -->
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
                                <a class="btn btn-danger" href="">Yaz</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <?php
                            if (isset($_SESSION['status'])) {
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['status']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                                unset($_SESSION['status']);
                            }
                            ?>
                            <h1 class="h3 mb-2 text-gray-900">Pesanan</h1>


                            <button type="button" class="btn btn-success btn-lg btn-block mb-2" data-toggle="modal" data-target="#tambah_pesanan">Tambah Pesanan</button>

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Jenis Pesanan</th>
                                                    <th>Ukuran</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga Total</th>
                                                    <th>Tanggal Pesanan</th>
                                                    <th>Status Pesanan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query(
                                                    $koneksi,
                                                    "SELECT pesanan.*, pelanggan.nama_pelanggan
                                                        FROM pesanan
                                                        INNER JOIN pelanggan
                                                        ON pesanan.id_pelanggan = pelanggan.id_pelanggan"
                                                );
                                                $i = 1;
                                                foreach ($query as $pesanan) :
                                                ?>

                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $pesanan['nama_pelanggan']; ?></td>
                                                        <td><?php echo $pesanan['jenis_pesanan']; ?></td>
                                                        <td><?php echo $pesanan['ukuran']; ?></td>
                                                        <td><?php echo $pesanan['jumlah']; ?></td>
                                                        <td><?php
                                                            $harga_total = $pesanan['harga_total'];
                                                            echo "Rp " . number_format($harga_total, 0, ",", ".");
                                                            ?></td>
                                                        <td><?php
                                                            $tanggalPemesanan = strtotime($pesanan['tanggal_pesanan']);
                                                            echo date('m/d/Y', $tanggalPemesanan);
                                                            ?></td>
                                                        <td><?php echo $pesanan['status_pemesanan']; ?></td>
                                                        <td>
                                                            <a class="btn btn-warning edit_button" data-toggle="modal" data-target="#edit_pesanan" data-id="<?php echo $pesanan['id_pesanan'] ?>"><i class="fas fa-edit fa-sm"></i></a>
                                                            &nbsp;
                                                            <a class="btn btn-danger delete_button" data-toggle="modal" data-target="#delete_modal" data-id="<?php echo $pesanan['id_pesanan'] ?>"><i class="fas fa-trash fa-sm"></i></a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $i++;
                                                endforeach;
                                                ?>
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
                    url: "modals/pesananEdit.php",
                    data: {
                        id: $id
                    },
                    success: function(response) {
                        $('#edit_pesanan').html(response);
                    }
                });
            });
            $('.delete_button').click(function(e) {
                $id = $(this).attr('data-id');
                $.ajax({
                    type: "POST",
                    url: "modals/pesananHapus.php",
                    data: {
                        id: $id
                    },
                    success: function(response) {
                        $('#delete_modal').html(response);
                    }
                });
            });
        </script>

        <!-- Script Harga Total -->
        <script type="text/javascript">
            $('#harga, #jumlah').change(function(e) {
                $harga = $('#harga').val();
                $jumlah = $('#jumlah').val();
                $('#harga_total').val($harga * $jumlah);
            });
        </script>
</body>

</html>