<?php

	session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require 'koneksi.php';

        if (isset($_POST['submit'])) {
            $id = $_GET['id_obat'];
            $databaru = mysqli_query($conn, "SELECT * FROM obat WHERE id_obat='$id'");
            $data = mysqli_fetch_assoc($databaru);
            $id_obat = $data['id_obat'];


            $nama = $_POST['nama'];
            $asal = $_POST['asal'];
            $hargabeli = $_POST['hargabeli'];
            $ppn = $_POST['ppn'];
            $jumlah = $_POST['jumlah'];
            $tanggal = $_POST['tanggal'];

            if ($ppn == 10) {
                $hargajual = $hargabeli+($hargabeli*(10/100));
            }
            else if ($ppn == 20) {
                $hargajual = $hargabeli+($hargabeli*(20/100));
            }
            else if ($ppn == 30) {
                $hargajual = $hargabeli+($hargabeli*(30/100));
            }
            else if ($ppn == 40) {
                $hargajual = $hargabeli+($hargabeli*(40/100));
            }
            else if ($ppn == 50) {
                $hargajual = $hargabeli+($hargabeli*(50/100));
            }
            else if ($ppn == 60) {
                $hargajual = $hargabeli+($hargabeli*(60/100));
            }
            else if ($ppn == 70) {
                $hargajual = $hargabeli+($hargabeli*(70/100));
            }
            else if ($ppn == 80) {
                $hargajual = $hargabeli+($hargabeli*(80/100));
            }
            else if ($ppn == 90) {
                $hargajual = $hargabeli+($hargabeli*(90/100));
            }
            else if ($ppn == 100) {
                $hargajual = $hargabeli+($hargabeli*(100/100));
            }

            $username = $_SESSION['username_akun'];
            $result= mysqli_query($conn, "SELECT id_akun FROM akun WHERE username_akun='$username'");
            $data2 = mysqli_fetch_array($result);
            $user = $data2['id_akun'];

            $simpanData = mysqli_query($conn, "UPDATE obat SET nama_obat='$nama',asal_obat='$asal',harga_beli_obat='$hargabeli',ppn='$ppn',harga_jual_obat='$hargajual',stok_obat='$jumlah',tanggal_beli='$tanggal',id_akun='$user' WHERE id_obat='$id_obat'");

            header("location: view_obat_admin.php?update=success");
        }

 ?>