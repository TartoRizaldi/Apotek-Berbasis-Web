<?php
    require 'koneksi.php';
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

        if (isset($_POST['submit'])) {

            $username = $_SESSION['username_akun'];
            $result= mysqli_query($conn, "SELECT id_akun FROM akun WHERE username_akun='$username'");
            $data = mysqli_fetch_array($result);
            $user = $data['id_akun'];

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
            
            $simpanData = mysqli_query($conn, "INSERT INTO obat VALUES ('','$nama','$asal','$hargabeli','$ppn','$hargajual','$jumlah','$tanggal','$user')");
            header("location: input_obat_admin.php?input=success"); 

        }

?>