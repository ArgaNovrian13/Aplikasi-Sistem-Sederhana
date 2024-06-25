<?php
require 'read.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data</title>
  <!-- Link Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Link Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Link Eksternal CSS -->
  <link rel="stylesheet" href="index.css">
  <!-- Link Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Freeman&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>
<body>
  <h1 class="text-center mt-1">CRUD SEDERHANA</h1>

 <button class="btn btn-primary mx-3 w-25"><a href="create.php" class="text-black text-decoration-none fw-bold">Tambah Data</a></button>
<div class="mx-3">
  <form action="" method="POST" id="searchForm">
    <i class="bi bi-search"></i>
    <label for="cariData" class="form-label fw-medium mt-1">Cari Data</label>
    <input type="text" name="cariData" id="cariData" class="form-control" autofocus autocomplete="off" placeholder="Cari Data...">
  </form>
</div>
  <div class="table-responsive m-3">
  <table class="table table-hover table-bordered border-dark text-center align-middle">
    <thead class="table-warning">
      <tr class="text-center table-bordered border-dark">
        <th>No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Full Name</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="dataBody">
    <?php if (!empty($hasilDataAll)): ?>
    <?php $no = 1 ?>
    <?php foreach($hasilDataAll as $data): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($data['firstName']) ?></td>
        <td><?= htmlspecialchars($data['lastName']) ?></td>
        <td><?= htmlspecialchars($data['firstName']) . " " . htmlspecialchars($data['lastName']) ?></td>
        <td><?= htmlspecialchars($data['jenisKelamin']) ?></td>
        <td><?= htmlspecialchars($data['tglLahir']) ?></td>
        <td><?= htmlspecialchars($data['alamat']) ?></td>
        <td><?= htmlspecialchars($data['no_hp']) ?></td>
        <td>
          <button type="button" class="btn btn-warning rounded-3 border-0"><a href="update.php?id=<?= $data['id'] ?>" class="text-decoration-none text-dark m-2 fw-bold">Update</a></button>
          <button class="btn btn-danger rounded-3"><a href="delete.php?id=<?= $data['id'] ?>" class="text-decoration-none text-dark fw-bold" onclick="return confirm('Apakah Anda Ingin Menghapusnya');">Delete</a></button>
        </td>
      </tr>
    <?php endforeach ?>
    <?php else: ?>
      <tr>
        <td colspan="9" class="text-center"><?= isset($pesan) ? $pesan : "Tidak Ada Data Yang Cocok" ?></td>
      </tr>
    <?php endif; ?>
    </tbody>
  </table>
  </div>
  <script src="searching.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
