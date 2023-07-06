<?php
include "./model/config.php";
include "./model/menu.php";
$err = [];
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    if (empty($username)) {
        $err['username'] = 'bạn chưa nhập name';
    }
    if (empty($email)) {
        $err['email'] = 'bạn chưa nhập email';
    }
    if (empty($password)) {
        $err['password'] = 'bạn chưa nhập password';
    }
    if ($rpassword != $password) {
        $err['rpassword'] = 'mật khẩu không đúng';
    }
    if (empty($err)) {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($pass);
        $conn = connectdb();
        $sql = "INSERT INTO `user` (`Email`, `Username`, `Password`) 
        VALUES ('$email', '$username', '$pass')";
      // use exec() because no results are returned
         $conn->exec($sql);
        if ($conn) {
           
            header('location:login.php');
        }
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

    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="./asset/css/login.css" rel="stylesheet" type="text/css">

</head>

<body>
    <section class="container">
        <div class="col-12 col-md-5 login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">REGISTER</h1>
                <form method="POST">
                    <input type="text" name="username" placeholder="Username" />
                    <span style="color: red; font-style: italic; font-size: 10px;">
                        <?php
                            echo isset($err['username'])?$err['username']:'';
                        ?>
                    </span>
                    <input type="email" name="email" placeholder="Email" />
                    <span style="color: red; font-style: italic; font-size: 10px;">
                        <?php
                            echo isset($err['email'])?$err['email']:'';
                        ?>
                    </span>
                    <input type="password" name="password" placeholder="Password" />
                    <span style="color: red; font-style: italic; font-size: 10px;">
                        <?php
                            echo isset($err['password'])?$err['password']:'';
                        ?>
                    </span>
                    <input type="password" name="rpassword" placeholder="nhập lại Password" />
                    <span style="color: red; font-style: italic; font-size: 10px;">
                        <?php
                            echo isset($err['rpassword'])?$err['rpassword']:'';
                        ?>
                    </span>
                    <button type="submit" class="opacity">SUBMIT</button>
                    <a href="" class="btn btn-google btn-user btn-block" style="outline: none; border: none;">
                        <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>
                    <a href="" class="btn btn-facebook btn-user btn-block" style="outline: none; border: none;">
                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a>
                </form>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>

</html>