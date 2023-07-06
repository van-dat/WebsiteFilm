<?php
session_start();
ob_start();
include "./model/config.php";
include "./model/user.php";
$err = [];
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if (empty($email)) {
    $err['email'] = 'bạn chưa nhập email';
  }
  if (empty($password)) {
    $err['password'] = 'bạn chưa nhập password';
  }

  if ($user = checkuser($email, $password)) {
    $user = checkuser($email, $password);
    $passhas = $user['Password'];
    // var_dump($passhas);
    // var_dump($user['Password']);
    if (password_verify($password, $passhas)) {
      $_SESSION['user'] = $user;
      if ($user['Keyuser'] == 1) header('location: ./admin/index.php');
      else header('location: index.php');
    } else
      $err['ktmk'] = 'Mật Khẩu Không dúng';
  } else {
    $err['ktmail'] = 'email không tồn tại !!!';
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Login</title>

  <!-- Custom fonts for this template-->
  <link href="./admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="./asset/css/login.css" rel="stylesheet" type="text/css">

</head>

<body>
  <section class="container">
    <div class="login-container">
      <div class="circle circle-one"></div>
      <div class="form-container">
        <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
        <h1 class="opacity">LOGIN</h1>
        <form action="login.php" method="POST">
          <input type="email" name="email" placeholder="Email" />
          <span style="color: red; font-style: italic; font-size: 10px;">
            <?php
            if (isset($err['email'])) {
              echo $err['email'];
            }
            if (isset($err['ktmail']) && $email) {
             echo $err['ktmail'];
           }
            // echo isset($err['email'])?$err['email']:"";
            ?>
          </span>
          <input type="password" name="password" placeholder="Password" />
          <span style="color: red; font-style: italic; font-size: 10px;">
            <?php
            // var_dump(($err['ktmk']));
            if (isset($err['password'])) {
              echo $err['password'];
            }
            if (isset($err['ktmk']) && $password) {
              echo $err['ktmk'];
            }
            // echo isset($err['password'])?$err['password']:'';
            ?>
          </span>
          <input name="submit" type="submit" value="Submit" class="opacity btn-primary ">
        </form>
        <div class="register-forget opacity">
          <a href="">REGISTER</a>
          <a href="">FORGOT PASSWORD</a>
        </div>
      </div>
      <div class="circle circle-two"></div>
    </div>
    <div class="theme-btn-container"></div>
  </section>
</body>

</html>