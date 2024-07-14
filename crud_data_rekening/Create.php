<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Rekening Karyawan Baru</title>
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
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_NIK=input($_POST["id_NIK"]);
        $nama=input($_POST["nama"]);
        $nama_PT=input($_POST["nama_PT"]);
        $departemen=input($_POST["departemen"]);
        $jabatan=input($_POST["jabatan"]);
        $Nama_Bank=input($_POST["Nama_Bank"]);
        $No_Rekening=input($_POST["No_Rekening"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into karyawan (id_NIK,nama,nama_PT,departemen,jabatan,Nama_Bank,No_Rekening) values
		('$id_NIK','$nama','$nama_PT','$departemen',' $jabatan',' $Nama_Bank',' $No_Rekening')";

        //Mengeksekusi/menjalankan query diatas
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
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>NIK :</label>
            <input type="number" name="id_NIK" class="form-control" placeholder="Masukkan Nomor Induk Karyawan (NIK)" required />
        </div>
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Karyawan Baru" required/>
        </div>
       <div class="form-group">
            <label>PT :</label>
            <input type="text" name="nama_PT" class="form-control" placeholder="Masukan Asal PT Karyawan" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Departemen :</label>
            <input type="text" name="departemen" class="form-control" placeholder="Masukan Departemen Karyawan" required/>
        </div>
        <div class="form-group">
            <label>Jabatan:</label>
            <textarea name="jabatan" class="form-control" rows="1"placeholder="Masukan Jabatan Karyawan" required></textarea>
        </div>
        <div class="form-group">
            <label>Nama Bank:</label>
            <input type="text" name="Nama_bank" class="form-control" placeholder="Masukan Nama Bank" required/>
        </div>          
        <div class="form-group">
            <label>No Rekening :</label>
            <input type="number" name="No_Rekening" class="form-control" placeholder="Masukkan Nomor Rekening Bank Karyawan" required />
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>