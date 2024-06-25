<?php
require 'koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['create'])){
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $jenisKelamin = htmlspecialchars($_POST['jenisKelamin']);
    $tglLahir = htmlspecialchars($_POST['tglLahir']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_hp = htmlspecialchars($_POST['no_hp']);

    $sql = "INSERT INTO data (firstName, lastName, jenisKelamin, tglLahir, alamat, no_hp)
            VALUES ('$firstName', '$lastName', '$jenisKelamin', '$tglLahir', '$alamat', '$no_hp')";

    if(mysqli_query($conn, $sql)){
      echo"
      <script>
      document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
          title: 'Good job!',
          text: 'Data Berhasil Di Tambahkan',
          icon: 'success'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'index.php';
          }
        });
      });
      </script>
      ";
    } else {
      echo "
      <script>
      Swal.fire({
        title: 'Oops...',
        text: 'Data Gagal Ditambahkan',
        icon: 'error'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'create.php';
        }
      });
      </script>
      ";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create</title>
  <!-- Link Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Freeman&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
<!-- Link CDN Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
  * {
  font-family: "Source Sans 3", sans-serif;
  font-optical-sizing: auto;
  font-style: normal;
}
</style>
</head>
<body>
  <div class="container ">
  <h2 class="mt-3 text-center " >CREATE DATA</h2>
<form action="" method="POST" >
  <label for="firstName"  class="form-label ">First Name</label>
  <input type="text" name="firstName" id="firstName"  class="form-control  border-dark mb-1" required autocomplete="off" >
  
  <label for="lastName" class="form-label">Last Name</label>
  <input type="text" name="lastName" id="lastName" class="form-control  border-dark mb-1" required autocomplete="off">

  <label class="form-label">Jenis Kelamin</label>
  <br>
  <input type="radio" name="jenisKelamin" id="jenisKelaminL" value="Laki-Laki"  required>
  Laki-Laki
  <br>
  <input type="radio" name="jenisKelamin" id="jenisKelaminP" value="Perempuan" required>
 Perempuan
  <br>
  
  <label for="tglLahir">Tanggal Lahir</label>
  <br>
  <input type="date" name="tglLahir" id="tglLahir"  class="form-control  border-dark mb-1" required >
  
  <label for="alamat" class="form-label" >Alamat</label>
  <input type="text" name="alamat" id="alamat" class="form-control  border-dark mb-1" required autocomplete="off">
  
  <label for="no_hp" class="form-label ">No Handphone</label>
  <input type="text" name="no_hp" id="no_hp" class="form-control  border-dark mb-1" required autocomplete="off">
  <br>
  <button type="submit" name="create" class="btn btn-success w-100">Create</button>
</form>
</div>
  <!-- Link CDN Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
