<?php
 error_reporting(E_ALL);

 $title = 'Data Barang';
 include_once 'konek.php';

 if (isset($_POST['submit']))
 {
	 $nama = $_POST['nama'];
	 $kategori = $_POST['kategori'];
	 $harga_jual = $_POST['harga_jual'];
	 $harga_beli = $_POST['harga_beli'];
	 $stok = $_POST['stok'];
	 $file_gambar = $_FILES['file_gambar'];
	 $gambar = null;

 if ($file_gambar['error'] == 0)
 {
	 $filename = str_replace(' ', '_',$file_gambar['name']);
	 $destination = dirname(__FILE__) .'/gambar/' . $filename;
	 if
	(move_uploaded_file($file_gambar['tmp_name'], $destination))
	 {$gambar = 'gambar/' . $filename;; }
 }

 $sql = 'INSERT INTO data_barang (nama, kategori,harga_jual, harga_beli, stok, gambar) ';
 $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambar}')";
 $result = mysqli_query($conn, $sql);

 header('location: data_barang.php');

 }

 include_once 'header.php';
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
 }
</style>
 <h2>Tambah Barang</h2>
 <form method="post" action="tambah_barang.php"enctype="multipart/form-data">
	 <div class="input">
		 <label>Nama Barang</label>
		 <input type="text" name="nama" />
	 </div>
	 <div class="input">
	 <label>Kategori</label>
		 <select name="kategori">
			 <option value="Komputer">Komputer</option>
			 <option value="Elektronik">Elektronik</option>
			 <option value="Hand Phone">HandPhone</option>
		 </select>
	 </div>
	 <div class="input">
		 <label>Harga Jual</label>
		 <input type="text" name="harga_jual" />
	 </div>
	 <div class="input">
		 <label>Harga Beli</label>
		 <input type="text" name="harga_beli" />
	 </div>
	 <div class="input">
		 <label>Stok</label>
		 <input type="text" name="stok" />
	 </div>
	 <div class="input">
	 <label>File Gambar</label>
	 <input type="file" name="file_gambar" />
	 </div>
	 <div class="submit">
		 <input type="submit" name="submit" value="Simpan" />
	 </div>
 </form>
 <?php
 include_once 'footer.php';
 ?>