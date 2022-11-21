<?php 
$conn = mysqli_connect("localhost", "root", "", "pbolouis");

if(isset($_POST["submit"])){

$nim = $_POST["nim"];
$nama = $_POST["nama"];
$jk = $_POST["jk"];
$alamat = $_POST["alamat"];
$prodi = $_POST["prodi"];
$foto = $_POST["foto"];
$email = $_POST["email"];

$query = "INSERT INTO tbl_mhs VALUES ('', '$nim', '$nama', '$jk', '$alamat', '$prodi', '$foto', '$email')";
mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mahasiswa Baru</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<h1><p class="text-center">Tambah Data Mahasiswa</p></h1>
<button type="button" onclick="location.href='tableview.php'" class="btn btn-success">Kembali</button>

<form action="" method="post">

  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" class="form-control" name="nim" id="nim">
  </div>

  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" id="nama">
  </div>

  <div class="mb-3">
      <label for="jk" class="form-label">Jenis Kelamin</label>
  <select type="jk" name="jk">
    <?php
        $sql = "SELECT *FROM tbl_jk";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=''){
            while ($data = mysqli_fetch_array($result, MYSQLI_NUM)){
                ?>
                <option value = "<?php echo $data[0]?>"> <?php echo $data[0]?> </option>
                <?php
            }
        }else{
            ?>
            <option>Data Tidak Tersedia</option>
            <?php 
        }
    ?>
  </select>
</div>
  <!--<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Jenis Kelamin
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">L</a></li>
   
  </ul>
</div>-->

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="alamat">
  </div>

  <div class="mb-3">
      <label for="prodi" class="form-label">Program Studi</label>
  <select type="prodi" name="prodi">
    <?php
        $sql = "SELECT *FROM tbl_prodi";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)!=''){
            while ($data = mysqli_fetch_array($result, MYSQLI_NUM)){
                ?>
                <option value = "<?php echo $data[1]?>"> <?php echo $data[1]?> </option>
                <?php
            }
        }else{
            ?>
            <option>Data Tidak Tersedia</option>
            <?php 
        }
    ?>
  </select>
</div>

  <!--<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Program Studi
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Teknik Informatika</a></li>
    <li><a class="dropdown-item" href="#">Sistem Informasi</a></li>
    <li><a class="dropdown-item" href="#">Pendidikan Teknologi Informasi</a></li>
  </ul>
</div>-->

<div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <br>
    <input type="file" class="form" name="foto" id="foto">
  </div>

<!--<div class="mb-3">
  <label for="foto" class="form-label">Foto Mahasiswa</label>
  <br>
  <input class="form" type="file" id="foto">
</div>-->

  <div class="mb-3">
    <label for="email" class="form-label">E-Mail</label>
    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
  </div>

  <div class="form-text">Pastikan Data Telah Terisi Dengan Benar</div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>