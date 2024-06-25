<?php
 require 'koneksi.php';
 session_start();
 if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['login'])){
    $username =$_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' ");
    if(mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if(password_verify($hashed_password,$row['passworduser'])){
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
      }else {
        echo "Password tidak sesuai. Silakan coba lagi.";
      }
    }else {
      echo "Username Tidak Sesuai";
    }
  }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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
  <div class="container mt-5 ">
    <h2 class="text-center mt-3" >Login</h2>
    <div>
      <form action="index.php" method="POST">
          <label for="username" class="form-label">Username</label>
          <i class="bi bi-person"></i>
          <input type="text" name="username" id="username" class="form-control border-dark mb-2 " autocomplete="off" required>
          <label for="password" class="form-label">Password</label>
          <i class="bi bi-shield-lock"></i>
          <input type="password" name="password" id="password" class="form-control border-dark mb-2 "required>
          <input type="checkbox" name="showPassword" id="showPassword" class=" form-check-input mb-3" > 
          <label for="showPassword" class="form-label-check">Show Password</label>
          <br>
          <button type="submit" class="btn btn-primary w-100 focus-ring mb-2" name="login">Login</button>
          <span>Belum Punya Akun  ?
          Daftar Di Sini <i class="bi bi-hand-index"></i></span>
          <a href="register.php" class="text-decoration-none">Register</a>
      </form>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="validationLogin.js"></script>
</body>
</html>