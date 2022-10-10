<?php

	require 'koneksi.php';

	session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

	$id = $_GET['id_obat'];

	$result = mysqli_query($conn, "DELETE FROM obat WHERE id_obat='$id'");

	header("location: view_obat_admin.php?delete=success");

?>