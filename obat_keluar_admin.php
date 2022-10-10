<?php
	require 'koneksi.php';
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    
//	$tgl=date('Y-m-d');

    $result = mysqli_query($conn, "SELECT * FROM keranjang");
    $data = mysqli_fetch_array($result);
    $test = mysqli_num_rows($result);

    if ($test < 1) {
    	header("location: sistem_kasir.php?input=error"); 
    }
    else {
    	$simpan = mysqli_query($conn, "INSERT INTO transaksi (tanggal,id_obat,jumlah_obat,harga_obat,id_akun) SELECT tanggal,id_obat,jumlah_obat,harga_obat,id_akun FROM keranjang");

	    $hapus = mysqli_query($conn, "DELETE FROM keranjang");

	    header("location: sistem_kasir.php");
    }   



?>