<?php
	require 'koneksi.php';
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    if (isset($_POST['submit'])) {

    	$id = $_GET['id_obat'];
    	
    	$username = $_SESSION['username_akun'];
	    $result= mysqli_query($conn, "SELECT id_akun FROM akun WHERE username_akun='$username'");
	    $data = mysqli_fetch_array($result);
	    $user = $data['id_akun'];

	    $result1= mysqli_query($conn, "SELECT * FROM obat WHERE id_obat='$id'");
	    $data1 = mysqli_fetch_array($result1);

	    $id_obat = $data1['id_obat'];
	    $nama_obat = $data1['nama_obat'];
	    $hargajual = $data1['harga_jual_obat'];
	    $stok = $data1['stok_obat'];
	    $jumlah = $_POST['jumlah'];
	    $harga = $hargajual*$jumlah;
	    $tgl = date('Y-m-d');

	    $stokbaru = $stok-$jumlah;

	    if ($jumlah > $stok) {
	    	header("location: sistem_kasir.php?input=lebih");
	    }
	    else {
	    	$query1 = mysqli_query($conn, "INSERT INTO keranjang VALUES ('','$tgl','$id_obat','$jumlah','$harga','$user')");
	    	$query2 = mysqli_query($conn, "UPDATE obat SET stok_obat = $stokbaru WHERE id_obat = $id_obat");
	   		header("location: sistem_kasir.php");
	    }

    }

    
    



?>