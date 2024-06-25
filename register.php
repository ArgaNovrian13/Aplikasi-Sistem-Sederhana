<?php
require 'koneksi.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['register'])){

    // Sanitasi input 
    $username =mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password =mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn,$_POST['confirmPassword']);
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    $hashed_confirmpassword = password_hash($confirm_password,PASSWORD_DEFAULT);
    

    // Validasi server-side
    if(strlen($_POST['password']) < 5){
      $error = "Password harus memiliki minimal 5 karakter";
    }else if($password !== $confirm_password){
      $error = "Konfirmasi password tidak sesuai";
    }else {
      // Validasi email
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = "Email tidak valid";
      }else {
        // Cek apakah username sudah ada dalam database
        $query = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");
        if(mysqli_num_rows($query) > 0){
          $error = "Username sudah ada";
        }else {
          // Input user baru ke database
          $sql = mysqli_query($conn, "INSERT INTO users (id,username,email,passworduser) VALUES (NULL,'$username','$email','$password')");
          if($sql){
            // Redirect ke halaman logi jika registrasi berhasil
            header('location:login.php');
          }else {
            $error = "Terjadi kesalahan saat melakukan registrasi.Silahkan coba lagi";
          }
          }
        }
      }
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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
  <div class="container">
    <h2 class="text-center mt-3 ">Register</h2>
    <form action="" method="POST">
      <label for="username" class="form-label ">Username</label>
      <input type="text" name="username" id="username" class="form-control border-dark mb-3" autocomplete="off" placeholder="Your Username...." required>
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control border-dark mb-3" autocomplete="off" placeholder="Your Email..." required>
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control border-dark mb-3" placeholder="Your Password..." required>
      <div class="form-text">Password Harus Lebih 5 Karakter</div>
      <p id="pesan"></p>
      <label for="password" class="form-label">Confirm Password</label>
      <input type="password" name="confirmPassword" id="confirmPassword" class="form-control border-dark mb-3" placeholder="Confirm Your Password... " required>
      <p id="confirmPassword"></p>
      <input type="checkbox" class="form-check-input" id="showPassword">
      <label for="showPassword" class="form-label">Show Password</label>
      <?php if (isset($error)) : ?>
        <div class="alert alert-danger" role="alert">
        <?= $error; ?>
        </div>
      <?php endif; ?>
      <button type="submit" name="register" class="btn btn-success w-100 mb-4">Register</button>
      <span>Sudah Punya Akun? Masuk Di Sini <i class="bi bi-hand-index"></i></span>
      <a href="login.php" class="text-decoration-none">Login</a>
    </form>

  </div>
  <!-- Link CDN Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Link SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Link Eksternal Javascript -->
<script src="validationRegister.js"></script>
</body>
</html>;