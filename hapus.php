<?php
	session_start();

	//mendapatkan id produk
	$id = isset($_GET['id']) ? $_GET['id'] : "";
	$nama = isset($_GET['nama']) ? $_GET['nama'] : "";

	//menghapus item dari array
	unset($_SESSION['cart_items'][$id]);

	//kembali pada daftar produk dan beritahu pengguna bahwa
	//produk telah ditambahkan dalam keranjang

	header('location: keranjang.php?action=removed&id=' . $id . '&nama=' . $nama);

	?>