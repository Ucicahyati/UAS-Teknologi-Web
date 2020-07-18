<?php
	 include_once 'login_session.php';
	 include_once 'konek.php';

	 $id = $_GET['id'];
	 $sql = "DELETE FROM data_barang WHERE id_barang = '{$id}'";
	 $result = mysqli_query($conn, $sql);

 	header('location: data_barang.php');
 ?>
