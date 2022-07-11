<?php
include "koneksi.php";
include "proses.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Btn Antara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #CEA2D7;
        }

        .mx-auto {
            width: 1000px
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="card text-bg-info mb-3">
            <div class="card-header">
                Create Data Member / Edit data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php

                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php

                }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">Angkatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo $tanggal_masuk ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="<?php echo $tanggal_keluar; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <input name="foto" type="file" class="form-control">
                    </div>
                    <div class="mb-3 row">
                        <label for="kesan_pesan" class="col-sm-2 col-form-label">Kesan Pesan</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="kesan_pesan" name="kesan_pesan" value="<?php echo $kesan_pesan; ?>">
                        </div>
                    </div>
            </div>
            <div class="col-12" align=center>
                <input type="submit" name="simpan" value="Simpan Data Anda" class="btn btn-success" />
                <br>
                <br>
                <button href="index.php" class="btn btn-outline-dark">Refresh Halaman</button>
            </div>
            <!-- untuk mengeluarkan data -->
            <div class="card">
                <div class="card-header text-white bg-secondary">
                    Data Penghuni Kontrakan Btn Antara
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Angkatan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Tanggal Keluar</th>
                                <th scope="col">Kesan & Pesan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql2   = "select * from member order by id desc";
                            $q2     = mysqli_query($koneksi, $sql2);
                            $urut   = 1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $id         = $r2['id'];
                                $nim        = $r2['nim'];
                                $nama       = $r2['nama'];
                                $alamat     = $r2['alamat'];
                                $tanggal_masuk = $r2['tanggal_masuk'];
                                $tanggal_keluar        = $r2['tanggal_keluar'];
                                $kesan_pesan        = $r2['kesan_pesan'];
                                $foto        = $r2['foto'];
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $urut++ ?></th>
                                    <th scope="row"><img src="berkas/<?php echo $r2['foto']; ?>" width="80px" height="80px"></th>
                                    <td scope="row"><?php echo $nim ?></td>
                                    <td scope="row"><?php echo $nama ?></td>
                                    <td scope="row"><?php echo $alamat ?></td>
                                    <td scope="row"><?php echo $tanggal_masuk ?></td>
                                    <td scope="row"><?php echo $tanggal_keluar ?></td>
                                    <td scope="row"><?php echo $kesan_pesan ?></td>
                                    <td scope="row">
                                        <a href="index.php?data=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                        <a href="index.php?data=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>

                    </table>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>