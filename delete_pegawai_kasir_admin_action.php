<?php

	require 'koneksi.php';

	session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

	$id = $_GET['id_akun'];

	$result = mysqli_query($conn, "DELETE FROM akun WHERE id_akun='$id'");

	header("location: view_pegawai_kasir_admin.php?delete=success");

?>