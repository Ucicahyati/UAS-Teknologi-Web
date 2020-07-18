 <?php

 $title = 'Data Barang';
 include_once 'konek.php';

 $sql = 'SELECT * FROM data_barang';
 $result = mysqli_query($conn, $sql);

 include_once 'header.php';

 echo '<a href="tambah_barang.php" style="font-size:25px">Tambah Barang</a>';
 if ($result):
 ?>

<style type="text/css">
body { 
	font-family:arial; 
	font-size:14px;
	line-height:22px;
}
.container {
	width:980px;
	margin:0 auto; 
}
h1 {
	border-bottom:1px solid #ddd; 
	margin-bottom:20px;
}
table { 
	border-collapse:collapse; 
	border-spacing:0; 
	margin:20px 0;
}
table th,
table td {
	 padding: 2px 4px;
	 border:1px solid #ddd;
}
 td img { 
 	max-width:75px; 
 	max-height:50px; 
}
form { 
	margin:20px 0; 
}
.input, .submit { 
	margin:10px 0;
}
 .input label { 
 	display:inline-block; 
 	width:150px; 
 }
 .input select, 
 .input input[type="text"] { 
 	border-radius:3px;
 	border:1px solid #ddd;
 	padding: 2px 4px; 
 }
 .submit input[type="submit"] { 
 	margin-left:150px; 
 	border:0; 
 	border-radius:5px;
 	background-color:blue; 
 	color:#fff; 
 	padding: 4px;
 	cursor:pointer; 
 	</style>
 <table>
	 <tr>
		 <th>Gambar</th>
		 <th>Nama Barang</th>
		 <th>Katagori</th>
		 <th>Harga Jual</th>
		 <th>Harga Beli</th>
		 <th>Stok</th>
		 <th>Aksi</th>
	 </tr>

<?php while($row = mysqli_fetch_array($result)): ?>
	 <tr>
		 <td><?php echo "<img src=\"{$row['gambar']}\" />";?></td>
		 <td><?php echo $row['nama'];?></td>
		 <td><?php echo $row['kategori'];?></td>
		 <td><?php echo $row['harga_jual'];?></td>
		 <td><?php echo $row['harga_beli'];?></td>
		 <td><?php echo $row['stok'];?></td>
		 <td>
			 <a href="edit_barang.php?id=<?php echo $row['id_barang'];?>">Edit</a>
			 <a href="hapus_barang.php?id=<?php echo $row['id_barang'];?>">Delete</a>
		 </td>
	 </tr>
	 <?php endwhile; ?>
 </table>
 <?php
 endif;
 include_once 'footer.php';
 ?>