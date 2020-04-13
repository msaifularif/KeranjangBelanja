<?php
	include 'config/db_konek.php';

	session_start();

	$page_title = "Daftar Produk";
	include 'layout_head.php';

	//mencegah index tidak ditentukan
	$action = isset($_GET['action']) ? $_GET['action'] : "";
	$id_produk = isset($_GET['id_produk']) ? $_GET['id_produk'] : "1";
	$nama = isset($_GET['nama']) ? $_GET['nama'] : "";

	if ($action=='added') {
		echo "<div class='alert alert-info'>";
		echo "<strong>{$nama}</strong> telah ditambahkan dalam keranjang!";
		echo "</div>";
	}
	if ($action=='exists') {
		echo "<div class='alert alert-info'>";
		echo "<strong>{$nama}</strong> sudah ada dalam keranjang!";
		echo "</div>";
	}

	$query = "SELECT id, nama, harga FROM produk ORDER BY nama";
	$stmt = $kon->prepare($query);
	$stmt->execute();

	$num = $stmt->rowCount();

	if ($num>0) {
		//awal tabel
		echo "<table class='table table-hover table responsive table-bordered'>";
		//heading table
		echo "<tr>";
		echo "<th class='textAlignLeft'> Nama Produk </th>";
		echo "<th> Harga(USD) </th>";
		echo "<th> Action </th>";
		echo "</tr>";

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			extract($row);

			//membuat baris baru untuk tiap data

			echo "<tr>";
			echo "<td>";
			echo "<div class='id-produk' style='display:none;'>{$id}</div>";
			echo "<div class='nama-produk'>{$nama}</div>";
			echo "</td>";
			echo "<td>&#36;{$harga}</td>";
			echo "<td>";
			echo "<a href='tambah.php?id={$id}&nama={$nama}' class='btn btn-primary'>";
			echo "<span class='glyphicon glyphicon-shopping-cart'></span> Tambahkan dalam keranjang";
			echo "</a>";
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	//memberitahu pengguna jika tidak ada produk dalam database 
	else{
		echo "produk tidak ditemukan.";
	}
	include 'layout_foot.php';
	?>

	