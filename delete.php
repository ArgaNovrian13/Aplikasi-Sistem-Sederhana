<?php
require 'koneksi.php';
$id= $_GET['id'];

if (isset($_POST['confirm'])) {
  $sql = "DELETE FROM data WHERE id = '$id'";
  if(mysqli_query($conn,$sql)){
    echo "
    <script>
    alert('Data Berhasil Di Hapus');
    </script>";
  } else {
    echo "
    <script>
    alert('Data Gagal Di Hapus');
    document.location.href = 'index.php';
    </script>";
  }
}


