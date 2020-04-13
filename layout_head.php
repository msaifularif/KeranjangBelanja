<?php
	//koneksi database
	include 'config/db_konek.php';
	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatile" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo isset($page_title) ? $page_title : "msaifula_"; ?> - LIVE DEMO</title>
	
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

	</head>
	<body>
		<?php include 'navigasi.php'; ?>
		<div class="container">
			<div class="page-header">
			<h1><?php echo isset($page_title) ? $page_title : "msaifula_"; ?></h1>
		</div>
	</body>