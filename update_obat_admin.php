<?php
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require('koneksi.php');

    $id_obat = $_GET['id_obat'];
    $dataUbah = mysqli_query($conn, "SELECT * FROM obat WHERE id_obat='$id_obat'");

    $dataupdate = mysqli_fetch_assoc($dataUbah);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apotik Ndalem Sehat</title>
    <style type="text/css">
        .tulisan{
            font-size: 80%;
        }
        .logo{
            background-size: 10%;
        }
    </style>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom logo -->
    <link rel="icon" href="img/lambang.png">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav samping sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_admin.php">
                <div class="sidebar-brand-icon logo ">
                </div>
                <div class="sidebar-brand-text mx-3 tulisan">Apotik Ndalem Sehat</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_admin.php">
                    <i class="fas fa-fw fa-archway"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Data Pegawai Kasir</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="input_pegawai_kasir_admin.php">Input Pegawai Kasir</a>
                        <a class="collapse-item" href="view_pegawai_kasir_admin.php">View Pegawai Kasir</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-pills"></i>
                    <span>Data Obat</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="input_obat_admin.php">Input Obat</a>
                        <a class="collapse-item" href="view_obat_admin.php">View Obat</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tools
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="view_transaksi_admin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Transaksi</span></a>
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

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <?php

                        $username = $_SESSION['username_akun'];
                        $result = mysqli_query($conn, "SELECT nama_akun FROM akun WHERE username_akun='$username'");
                        $data = mysqli_fetch_array($result);

                        ?>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['nama_akun']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Update Obat</h1>

                    <form autocomplete="off" required="" method="POST" action="<?php echo "update_obat_admin_action.php?id_obat=".$dataupdate['id_obat']; ?>">
                            <div class="input_down">
                            </div>

                            <div class="card-body">
                            <div class="input_down">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputNama" class="input">Nama Obat</label>
                                <input type="text" class="form-control input" id="exampleInputNama" placeholder="Masukkan Nama" required="" name="nama" value="<?php echo $dataupdate['nama_obat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAsal" class="input">Asal Obat</label>
                                <input type="text" class="form-control input" id="exampleInputasal" placeholder="Masukkan Asal" required="" name="asal" value="<?php echo $dataupdate['asal_obat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputHargaBeli" class="input">Harga Beli Obat</label>
                                <input type="number" min="0" class="form-control input" id="exampleInputHargaBeli" placeholder="Masukkan Harga Beli" required="" name="hargabeli" value="<?php echo $dataupdate['harga_beli_obat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPPN" class="input">PPN</label>
                                <select class="form-control input" id="ppn" name="ppn" id="exampleInputPPN">
                                    <option value="10" <?php if ($dataupdate['ppn']=='10'){echo 'selected';}?>>10%</option>
                                    <option value="20" <?php if ($dataupdate['ppn']=='20'){echo 'selected';}?>>20%</option>
                                    <option value="30" <?php if ($dataupdate['ppn']=='30'){echo 'selected';}?>>30%</option>
                                    <option value="40" <?php if ($dataupdate['ppn']=='40'){echo 'selected';}?>>40%</option>
                                    <option value="50" <?php if ($dataupdate['ppn']=='50'){echo 'selected';}?>>50%</option>
                                    <option value="60" <?php if ($dataupdate['ppn']=='60'){echo 'selected';}?>>60%</option>
                                    <option value="70" <?php if ($dataupdate['ppn']=='70'){echo 'selected';}?>>70%</option>
                                    <option value="80" <?php if ($dataupdate['ppn']=='80'){echo 'selected';}?>>80%</option>
                                    <option value="90" <?php if ($dataupdate['ppn']=='90'){echo 'selected';}?>>90%</option>
                                    <option value="100" <?php if ($dataupdate['ppn']=='100'){echo 'selected';}?>>100%</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputJumlah" class="input">Jumlah</label>
                                <input type="number" min="0" class="form-control input" id="exampleInputJumlah" placeholder="Masukkan Jumlah" required="" name="jumlah" value="<?php echo $dataupdate['stok_obat']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTanggal" class="input">Tanggal Beli</label>
                                <input type="date" class="form-control input" id="exampleInputTanggal" placeholder="Masukkan Tanggal" required="" name="tanggal" value="<?php echo $dataupdate['tanggal_beli']; ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer tengah">
                            <button type="submit" class="btn btn-primary submit" name="submit">Submit</button>
                        </div>
                    </form>

                <!-- /.container-fluid -->

                </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Apotik Ndalem Sehat</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika anda ingin keluar dari halaman ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="action_logout.php">Logout</a>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>