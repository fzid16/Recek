<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    Berkat Sumber Group</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">Berkat Sumber Group</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>REKENING KARYAWAN BS GROUP</center></h4>
<?php

    include "Koneksi_ToDB.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_NIK'])) {
        $id_NIK=htmlspecialchars($_GET["id_NIK"]);

        $sql="delete from karyawan where id_NIK='$id_NIK' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>NIK Karyawan</th>
            <th>Nama</th>
            <th>PT</th>
            <th>Departemen</th>
            <th>Jabatan</th>
            <th>Nama Bank</th>
            <th>No Rekekning</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "Koneksi_ToDB.php";
        $sql="select * from karyawan order by id_NIK desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["id_NIK"]; ?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["nama_PT"];   ?></td>
                <td><?php echo $data["departemen"];   ?></td>
                <td><?php echo $data["jabatan"];   ?></td>
                <td><?php echo $data["Nama_Bank"];   ?></td>
                <td><?php echo $data["No_Rekening"];   ?></td>
                <td>
                    <a href="Update.php?id_NIK=<?php echo htmlspecialchars($data['id_NIK']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_NIK=<?php echo $data['id_NIK']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
