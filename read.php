<?php
require './koneksi.php';
$bacaData = mysqli_query($conn,"SELECT * FROM data");
if(mysqli_num_rows($bacaData) > 0){
  while($hasilData = mysqli_fetch_assoc($bacaData)){
    $hasilDataAll[] = $hasilData;
  }
}
?>
