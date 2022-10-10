<?php

	require 'koneksi.php';

	session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

	$id = $_GET['id_keranjang'];

	$result1= mysqli_query($conn, "SELECT * FROM keranjang WHERE id_keranjang='$id'");
    $data1 = mysqli_fetch_array($result1);
    $id_obat = $data1['id_obat'];
    $jumlah_obat = $data1['jumlah_obat'];

    $result2= mysqli_query($conn, "SELECT * FROM obat WHERE id_obat='$id_obat'");
    $data2 = mysqli_fetch_array($result2);
    $stok2 = $data2['stok_obat'];

    $stokbalik = $stok2+$jumlah_obat;

    $query3 = mysqli_query($conn, "UPDATE obat SET stok_obat = $stokbalik WHERE id_obat = $id_obat");

	$result = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang='$id'");

	header("location: sistem_kasir.php");

?>