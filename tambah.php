<?php
	session_start();

	//mendapatkan id produk
	$id = isset($_GET['id']) ? $_GET['id'] : "";
	$nama = isset($_GET['nama']) ? $_GET['nama'] : "";
	$jumlah = isset($_GET['jumlah']) ? $_GET['jumlah'] : "";

	/*
		memeriksa apakah array session 'keranjang' sudah dibuat jika belum, buat array 
		session keranjang
	*/
	if (!isset($_SESSION['cart_items'])) {
		$_SESSION['cart_items'] = array();
	}

	/*
		memeriksa apakah item berada dalama array,
		jika ada tidak ditambahkan
	*/
	if (array_key_exists($id, $_SESSION['cart_items'])) {

		//kembali pada daftar produk dan beritahu pengguna bahwa
		//item telah ditambahkan dalam keranjang
		header('location: produk.php?action=exists&id=' . $id . '&nama=' . $nama);

		//jika tidak, tambahkan item ke dalam array
	}else{
		$_SESSION['cart_items'][$id] = $nama;

		//kembali pada daftar produk dan beritahu pengguna bahwa
		//item telah ditambahkan dalam keranjang
		header('location: produk.php?action=exists&id=' . $id . '&nama=' . $nama);
	}
	?>