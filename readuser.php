<?php

require 'koneksi.php';

$bacaData = mysqli_query($conn,"SELECT * FROM users");
if(mysqli_num_rows($bacaData) > 0){
  while($hasilData = mysqli_fetch_array($bacaData)){
    $fetchDataAll[] = $hasilData;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data User</title>
</head>
<body>
  <table border="1" cellpadding="10" cellspacing="1">
    <thead>
      <tr>
        <td>No</td>
        <td>Username</td>
        <td>Email</td>
        <td>Password</td>
        <td>Aksi</td>
      </tr>
    </thead>
    <tbody>
    <?php $no= 1 ?>
       <?php foreach($fetchDataAll as $data): ?>
      <tr>
       
        <td><?= $no++ ?></td>
        <td><?= htmlspecialchars($data['username'])?></td>
        <td><?= htmlspecialchars($data['email'])?></td>
        <td><?= htmlspecialchars($data['passworduser'])?></td>
       <td><a href="deleteuser.php?id=<?= $data['id'] ?>">Delete</a></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>
</html>