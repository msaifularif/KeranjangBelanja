<?php
	session_start();

	$page_title = "Keranjang";
	include 'layout_head.php';

	$action = isset($_GET['action']) ? $_GET['action'] : "";
	$nama = isset($_GET['nama']) ? $_GET['nama'] : "";

	if ($action=='removed') {
		echo "<div class='alert alert-info'>";
		echo "<strong>{$nama}</strong> dikeluarkan dari keranjang!";
		echo "</div>";
	}

	else if ($action=='quantity_updated') {
		echo "<div class='alert alert-info'>";
		echo "<strong>{$nama}</strong> telah di-update!";
		echo "</div>";
	}

	if (count($_SESSION['cart_items'])>0) {
		//mendapatkan id produk
		$ids= "";
		foreach ($_SESSION['cart_items'] as $id=>$value) {
			$ids = $ids . $id . ",";
		}

		//menghapus koma terakhir
		$ids = rtrim($ids, ',');

		//memulai tabel
		echo "<table class='table table-hover table responsive table-bordered'>";

		//heading table
		echo "<tr>";
		echo "<th class='textAlignLeft'> Nama Produk </th>";
		echo "<th> Harga(USD) </th>";
		echo "<th> Action </th>";
		echo "</tr>";

		$query = "SELECT id, nama, harga FROM produk WHERE id IN {{$ids}} ORDER BY nama";
		$stmt = $kon->prepare($query);
		$stmt->execute();

		$total_harga=0;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			extract($row);

			echo "<tr>";
			echo "<td>{$nama}</td>";
			echo "<td>&#36;{$harga}</td>";
			echo "</td>";
			echo "<a href='hapus.php?id={$id}&nama={$nama}' class='btn btn-danger'>";
			echo "<span class='glyphicon glyphicon-remove'></span> Keluarkan dari keranjang!";
			echo "</a>";
			echo "</td>";
			echo "</tr>";

			$total_harga+=$harga;
		}
			echo "<tr>";
			echo "<td><b>Total</b></td>";
			echo "<td>&#36;{$total_harga}</td>";
			echo "</td>";
			echo "<a href='#' class='btn btn-success'>";
			echo "<span class='glyphicon glyphicon-shopping-cart'></span> Bayar";
			echo "</a>";
			echo "</td>";
			echo "</tr>";

			echo "</table>";
	}

	else{
		echo "<div class='alert alert-danger'>";
		echo "<strong>Tidak ada produk</strong> dalam keranjang!";
		echo "</div>";
	}

	include 'layout_foot.php';
	?>