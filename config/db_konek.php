<?php 

$host = "localhost";
$nama_db = "db_kbelanja";
$username = "root";
$password = "";

try{
	$kon = new PDO("mysql:host={$host}; dbname={$nama_db}", $username, $password);
}
//mengatasi koneksi error
catch(PDOException $exception){
	echo "Koneksi Error : ". $exception->getMessage();
}
?>