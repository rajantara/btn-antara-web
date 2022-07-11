<?php
// //local
$server = "localhost";
$user = "root";
$password = "";
$db = "btn";

//online
// $server = "sql111.epizy.com";
// $user = "epiz_32140091";
// $password = "jzcR0ozMnis16AB";
// $db = "epiz_32140091_btn";

$koneksi = mysqli_connect($server, $user, $password, $db);

if (!$koneksi) {
    die("Could not connect to server");
}

//ini berfungsi agar data tidak error pada html 
$nim        = "";
$nama       = "";
$alamat     = "";
$foto     = "";
$tanggal_masuk = "";
$tanggal_keluar = "";
$kesan_pesan = "";
$sukses = "";
$error = "";
