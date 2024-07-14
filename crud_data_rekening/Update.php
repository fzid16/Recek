<!DOCTYPE html>
<html>
<head>
    <title>Form Update Rekening</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "Koneksi_ToDB.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_NIK
    if (isset($_GET['id_NIK'])) {
        $id_NIK=input($_GET["id_NIK"]);

        $sql="select * from karyawan where id_NIK=$id_NIK";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_NIK=htmlspecialchars($_POST["id_NIK"]);
        $nama=input($_POST["nama"]);
        $nama_PT=input($_POST["nama_PT"]);
        $departemen=input($_POST["departemen"]);
        $jabatan=input($_POST["jabatan"]);
        $Nama_Bank=input($_POST["Nama_Bank"]);
        $No_Rekening=input($_POST["No_Rekening"]);

        //Query update data pada tabel anggota
        $sql="update karyawan set
			nama='$nama',
			nama_PT='$nama_PT',
			departemen='$departemen',
			jabatan='$jabatan'
            Nama_Bank='$Nama_Bank'
            No_Rekening='$No_Rekening'
			where id_NIK=$id_NIK";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Karyawan" required />

        </div>
        <div class="form-group">
            <label>PT:</label>
            <input type="text" name="nama_PT" class="form-control" placeholder="Masukan Nama PT Karyawan" required/>
        </div>
        <div class="form-group">
            <label>Departemen :</label>
            <input type="text" name="departemen" class="form-control" placeholder="Masukkan Departemen" required/>
        </div>
        <div class="form-group">
            <label>Jabatan:</label>
            <input type="text" name="jabatan" class="form-control" placeholder="Masukan Jabatan" required/>
        </div>
        <div class="form-group">
            <label>Nama Bank:</label>
            <textarea name="Nama_Bank" class="form-control" rows="5"placeholder="Masukan Nama Bank" required></textarea>
        </div>
        <div class="form-group">
            <label>No Rekening:</label>
            <textarea name="No_Rekening" class="form-control" rows="5"placeholder="Masukan No Rekening" required></textarea>
        </div>

        <input type="hidden" name="id_NIK" value="<?php echo $data['id_NIK']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>