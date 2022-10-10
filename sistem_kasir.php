<?php
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require 'koneksi.php';


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
        .buttonss{
            color: white;
        }
        .input_down_update{
            height: 50px;
            margin-left: -2%;
            width: 104%;
        }
        .table-earnings {
          background: #F3F5F6;
        }
        .tabel1{
          display: block;
          height: 200px;
          overflow-y: auto;
        }
        .coloum2{
            width: 30%;
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

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav samping sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_kasir.php">
                <div class="sidebar-brand-icon logo ">
                </div>
                <div class="sidebar-brand-text mx-3 tulisan">Apotik Ndalem Sehat</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_kasir.php">
                    <i class="fas fa-fw fa-archway"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kasir
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="sistem_kasir.php">
                    <i class="fas fa-fw fa-calculator"></i>
                    <span>Sistem Kasir</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tools
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="view_transaksi_kasir.php">
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
                    <h1 class="h3 mb-4 text-gray-800">Sistem Kasir</h1>



                    <!-- Data Table -->
                        <div class="input_down">
                            <?php 
                            if(isset($_GET['input'])){
                                if($_GET['input'] == "lebih"){
                                    echo "
                                        <center>
                                        <div class='alert alert-danger alert-dismissible div4'>
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong>Jumlah obat yang dibeli melebihi stok</strong>
                                        </div>
                                        <center>
                                    ";
                                }
                                else if($_GET['input'] == "error"){
                                    echo "
                                        <center>
                                        <div class='alert alert-danger alert-dismissible div4'>
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong>Tidak ada obat yang diinputkan</strong>
                                        </div>
                                        <center>
                                    ";
                                }
                            }
                            else if(isset($_GET['delete'])){
                                if($_GET['delete'] == "success"){
                                    echo "
                                        <center>
                                        <div class='alert alert-success alert-dismissible div4'>
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong>Data berhasil dihapus</strong>
                                        </div>
                                        <center>
                                    ";
                                }
                            }
                            ?>
                        </div>

                        <br>

                        <div class="row">

                        <div class="col-lg-6">

                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Pilih Obat</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        <div class="table-responsive col-xs-8">
                                        
                                        <table class="table tabel1 table-bordered table-earnings table-earnings__challenge" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Obat</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>Jumlah</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Obat</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>Jumlah</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                            <?php
                                            require ('koneksi.php');

                                            $result= mysqli_query($conn, "SELECT * FROM obat");

                                            $no = 1;
                                            while ($data = mysqli_fetch_array($result)){
                                            ?>

                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['nama_obat']; ?></td>
                                                    <td><?php echo $data['harga_jual_obat']; ?></td>
                                                    <td><?php echo $data['stok_obat']; ?></td>
                                                    <td>
                                                        <form autocomplete="off" required="" method="POST" action="<?php echo "add_kasir_action.php?id_obat=".$data['id_obat']; ?>">
                                                        <input type="number" min="1" class="form-control input" id="exampleInputNama" required="" name="jumlah" value="1">
                                                    </td>
                                                    <td>
                                                        <center>
                                                        <button type="submit" class="btn btn-success submit" name="submit">Add</button>
                                                        </form>
                                                        </center>
                                                    </td>
                                                </tr>

                                            <?php
                                                }
                                            ?>

                                            </tbody>
                                        </table>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="cetak_kasir.php" target="_self" class="btn btn-facebook btn-block">Submit</a>
                        </div>

                        <div class="col-lg-6">

                            <!-- Dropdown Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Keranjang</h6>
                                </div>
                                <div class="card-header py-3">
                                    <?php
                                        require 'koneksi.php';


                                        $total = mysqli_query($conn, "SELECT SUM(harga_obat) FROM keranjang");
                                        $total4 = mysqli_fetch_array($total);
                                    ?>

                                    <input type="text" class="form-control input2" id="exampleInputNama" placeholder="Total" required="" name="total" value="<?php echo "Rp. ".number_format($total4['SUM(harga_obat)']); ?>">
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                      <!--Table-->
                                      <table class="table" width="100%">

                                        <!--Table head-->
                                        <thead>
                                          <tr>
                                            <th class="th-sm coloum1">No</th>
                                            <th class="th-sm coloum2">Obat</th>
                                            <th class="th-sm coloum3">Jumlah</th>
                                            <th class="th-sm coloum4">Harga</th>
                                            <th class="th-sm coloum5"></th>
                                          </tr>
                                        </thead>
                                        <!--Table head-->


                                         <?php
                                            require ('koneksi.php');

                                            $result2= mysqli_query($conn, "SELECT * FROM obat INNER JOIN keranjang ON obat.id_obat = keranjang.id_obat");

                                            $no = 1;
                                            while ($data2 = mysqli_fetch_array($result2)){
                                         ?>

                                        <!--Table body-->
                                        <tbody>
                                          <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data2['nama_obat']; ?></td>
                                            <td><?php echo $data2['jumlah_obat']; ?></td>
                                            <td><?php echo "Rp. ".number_format($data2['harga_obat']); ?></td>
                                            <td>
                                                <center>
                                                    <a href="<?php echo "delete_kasir_action.php?id_keranjang=".$data2['id_keranjang']; ?>" class="btn btn-danger btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Batal</span>
                                                    </a>
                                                </center>
                                            </td>
                                          </tr>
                                        <?php
                                            }
                                         ?>
                                        </tbody>
                                        <!--Table body-->

                                      </table>
                                      <!--Table-->

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

</body>

</html>