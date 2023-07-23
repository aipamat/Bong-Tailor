<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bong Tailor - Pesanan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
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
                            <form action="" method="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama_pelanggan">Nama Pelanggan</label>
                                        <select class="form-control" id="nama_pelanggan">
                                            <option>Arif</option>
                                            <option>Naufal</option>
                                            <option>Farhan</option>
                                            <option>Fajar</option>
                                            <option>Gitri</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_pesanan">Jenis Pesanan</label>
                                        <select class="form-control" id="jenis_pesanan">
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
                                        <label>Harga</label>
                                        <input type="text" name="harga" class="form-control">
                                    </div>

                                    <div class="form-group"> <!-- Date input -->
                                        <label class="control-label" for="tanggal_pesanan">Tanggal Pesanan</label>
                                        <input class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" placeholder="MM/DD/YYY" type="date" />
                                    </div>

                                    <div class="form-group">
                                        <label for="status_pesanan">Status Pesanan</label>
                                        <select class="form-control" id="status_pesanan">
                                            <option>Selesai</option>
                                            <option>Belum Selesai</option>
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
                                        <select class="form-control" id="nama_pelanggan">
                                            <option>Arif</option>
                                            <option>Naufal</option>
                                            <option>Farhan</option>
                                            <option>Fajar</option>
                                            <option>Gitri</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_pesanan">Jenis Pesanan</label>
                                        <select class="form-control" id="jenis_pesanan">
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
                                        <label>Harga</label>
                                        <input type="text" name="harga" class="form-control" placeholder="Harga">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="tanggal_pesanan">Tanggal Pesanan</label>
                                        <input class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" placeholder="MM/DD/YYY" type="date" />
                                    </div>
                                    <div class="form-group">
                                        <label for="status_pesanan">Status Pesanan</label>
                                        <select class="form-control" id="status_pesanan">
                                            <option>Selesai</option>
                                            <option>Belum Selesai</option>
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
                                <a class="btn btn-danger" href="pesanan.php">Ya</a>
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
                                                    <th>Harga</th>
                                                    <th>Tanggal Pesanan</th>
                                                    <th>Status Pesanan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Tiger Nixon</td>
                                                    <td>Kameja</td>
                                                    <td>S</td>
                                                    <td>50.000</td>
                                                    <td>2023/08/20</td>
                                                    <td>Selesai</td>
                                                    <td>
                                                        <a class="btn btn-warning" data-toggle="modal" data-target="#edit_pesanan" href=""><i class="fas fa-edit fa-sm"></i></a>
                                                        &nbsp;
                                                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete_modal" href=""><i class="fas fa-trash fa-sm"></i></a>
                                                    </td>
                                                </tr>
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
                        <a class="btn btn-danger" href="login.php">Keluar</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>