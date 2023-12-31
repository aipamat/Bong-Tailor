<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bong Tailor - Dashboard</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <i class="fas fa-users-cog fa-lg"></i>
                <div class="sidebar-brand-text mx-3">Bong Tailor</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
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
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Total Pesanan -->
                        <div class="col-xl-11 col-md-6 mb-4 mx-auto">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 font-weight-bold text-info text-uppercase mb-1">
                                                Total Pesanan</div>
                                            <?php
                                            require '../bong-tailor/head/koneksi.php';
                                            $query = "SELECT id_pesanan FROM pesanan ORDER BY id_pesanan";
                                            $query_run = mysqli_query($koneksi, $query);
                                            $row = mysqli_num_rows($query_run);
                                            echo '<h4>' . $row . '</h4>';
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-lg" style="color: #5bc0de;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-900">Tabel Pesanan</h1>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
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

</body>

</html>