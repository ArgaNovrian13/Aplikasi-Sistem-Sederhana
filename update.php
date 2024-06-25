<?php
require 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM data WHERE id = '$id'");
$hasilData = mysqli_fetch_assoc($query);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['update'])) {
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $jenisKelamin = htmlspecialchars($_POST['jenisKelamin']);
        $tglLahir = htmlspecialchars($_POST['tglLahir']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $no_hp = htmlspecialchars($_POST['no_hp']);

        $sql = "UPDATE contoh SET 
        firstName = '$firstName', 
        lastName = '$lastName', 
        jenisKelamin = '$jenisKelamin',
        tglLahir = '$tglLahir',
        alamat = '$alamat',
        no_hp = '$no_hp'
         WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "
            <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Good job!',
                    text: 'Data Berhasil Di Update',
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
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Oops...',
                    text: 'Data Gagal DiUpdate',
                    icon: 'error'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'create.php';
                    }
                });
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
  <title>Update</title>
   <!-- Link Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Freeman&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
  <!-- Link Bootstrap -->
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
  <div class="container">
    <h2 class="text-center mt-3">UPDATE DATA</h2>
    <form action="" method="POST">
      <input type="hidden" name="id" value="<?= htmlspecialchars($hasilData['id']) ?>">
      <label for="firstName" class="form-label">First Name</label>
      <input type="text" name="firstName" id="firstName" value="<?= htmlspecialchars($hasilData['firstName']) ?>" class="form-control border-dark mb-1" autocomplete="off">
      <label for="lastName" class="form-label">Last Name</label>
      <input type="text" name="lastName" id="lastName" value="<?= htmlspecialchars($hasilData['lastName']) ?>" class="form-control border-dark mb-1" autocomplete="off">

      <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
      <br>
      <input type="radio" name="jenisKelamin" id="jenisKelaminL" value="Laki-Laki" <?= ($hasilData['jenisKelamin'] == 'Laki-Laki') ? 'checked' : '' ?>> Laki-laki
      <br>
      <input type="radio" name="jenisKelamin" id="jenisKelaminP" value="Perempuan" <?= ($hasilData['jenisKelamin'] == 'Perempuan') ? 'checked' : '' ?>> Perempuan
      <br>

      <label for="tanggalLahir">Tanggal Lahir</label>
      <input type="date" name="tglLahir" id="tanggalLahir" value="<?= htmlspecialchars($hasilData['tglLahir']) ?>" class="form-control border-dark mb-1" autocomplete="off">
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" id="alamat" value="<?= htmlspecialchars($hasilData['alamat']) ?>" class="form-control border-dark mb-1" autocomplete="off">
      <label for="no_hp" class="form-label">No Handphone</label>
      <input type="text" name="no_hp" id="no_hp" value="<?= htmlspecialchars($hasilData['no_hp']) ?>" class="form-control border-dark mb-1" autocomplete="off">
      <button type="submit" name="update" class="btn btn-primary w-100 mt-3">UPDATE</button>
    </form>
  </div>
    <!-- Link CDN Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
