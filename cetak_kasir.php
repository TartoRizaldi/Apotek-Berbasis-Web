

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
						<table>
	 						<thead>
                              <tr>
                                <th class="th-sm coloum1">No</th>
                                <th class="th-sm coloum2">Obat</th>
                                <th class="th-sm coloum3">Jumlah</th>
                                <th class="th-sm coloum4">Harga</th>
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
                              </tr>
                            <?php
                                }
                             ?>
                            </tbody>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td>
                                 <?php
                                        require 'koneksi.php';


                                        $total = mysqli_query($conn, "SELECT SUM(harga_obat) FROM keranjang");
                                        $total4 = mysqli_fetch_array($total);
                                 ?>
                                 <?php echo "Rp. ".number_format($total4['SUM(harga_obat)']); ?>
                                 </td>   
                              </tr>
                            <!--Table body-->

                          </table>	

</body>
</html>

<script>
	window.print();
</script>

<?php
	require 'koneksi.php';
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    
//	$tgl=date('Y-m-d');

    $simpan = mysqli_query($conn, "INSERT INTO transaksi (tanggal,id_obat,jumlah_obat,harga_obat,id_akun) SELECT tanggal,id_obat,jumlah_obat,harga_obat,id_akun FROM keranjang");

    $hapus = mysqli_query($conn, "DELETE FROM keranjang");
    
?>