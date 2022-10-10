<?php

	require 'koneksi.php';

	session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

	$id = $_GET['id'];

	$result = mysqli_query($conn, "DELETE FROM transaksi WHERE id='$id'");

	header("location: view_transaksi_admin.php?delete=success");

?>