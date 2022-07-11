<?php
include "koneksi.php";
if (isset($_GET['data'])) {
    $data = $_GET['data'];
} else {
    $data = "";
}




//edit data
if ($data == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from member where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nim        = $r1['nim'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $tanggal_masuk = $r1['tanggal_masuk'];
    $tanggal_keluar = $r1['tanggal_keluar'];
    $kesan_pesan = $r1['kesan_pesan'];

    if ($nim == '') {
        $error = "data tidak ditemukan";
    }
}




//create data dan edit
if (isset($_POST['simpan'])) {
    $nim        = $_POST['nim'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $kesan_pesan = $_POST['kesan_pesan'];
    $filename = rand(0, 9999) . $_FILES['foto']['name'];
    $folder = "berkas/";

    if ($nim && $filename && $nama && $alamat && $tanggal_masuk && $tanggal_keluar && $kesan_pesan) {
        move_uploaded_file($_FILES['foto']['tmp_name'], $folder . $filename);
        if ($data == 'edit') {
            $sql1 = "update member set nim = '$nim', foto='$filename', nama='$nama',alamat='$alamat',tanggal_masuk='$tanggal_masuk',tanggal_keluar='$tanggal_keluar',kesan_pesan='$kesan_pesan' where id = $id";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "data berhasil di update";
            } else {
                $error = "update member gagal";
            }
        } else {
            $sql1 = "insert into member(foto,nim, nama, alamat, tanggal_masuk, tanggal_keluar, kesan_pesan) values ('$filename','$nim','$nama', '$alamat','$tanggal_masuk','$tanggal_keluar','$kesan_pesan')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "berhasil memasukan data";
            } else {
                $error = "gagal memasukan data";
            }
        }
    } else {
        $error = "masukan semua data";
    }
}

if ($data == 'delete') {
    $id         = $_GET['id'];
    $sql1       = "delete from member where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error  = "Gagal melakukan delete data";
    }
}
