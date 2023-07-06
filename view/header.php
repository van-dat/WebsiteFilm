
<!doctype html>
<html lang="en">

<head>
    <title>Film</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./asset/css/main.css" >
    <link rel="stylesheet" href="./asset/css/style.css">
    <link href="http://fonts.cdnfonts.com/css/helvetica-neue-9" rel="stylesheet">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;1,100&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <div class="container ">
            <div class="row p-0 align-items-center">
                <div class="col-lg-5 p-0">
                    <a href="index.php?act=index" class="overflow-hidden">
                        <img src="./asset/img/Logo.webp" alt="img" class="img-fluid">
                    </a>
                </div>
                <div class="col-lg-4">
                    <form action="index.php?act=index" method="post" style=" overflow: hidden; border: 1px solid #273e52; border-radius: 20px; background-image: linear-gradient(to right, #172b31, #331d24);">
                        <div class="input-group border-0 ">
                            <input type="text" class=" border-0 fs-6 px-3 " name="search" style="outline: none; flex: 1; background: inherit ; color: #fff;">
                            <button class="px-2 bi bi-search border-0"  style="color: #fff; font-size: 1.2rem; background-color: transparent;"></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 ">
                    <div class="input-group justify-content-center">
                        <ul class=" d-flex  m-0 p-0 " style="color: #FFF; list-style-type: none; ">
                            
                            <?php 
                            if(isset($_SESSION['user']) && $_SESSION['user']['Keyuser'] != 1) {
                                $user = $_SESSION['user'];
                                // var_dump($user);
                                ?>
                                    <li class="px-3">
                                        <a class="nav-link" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">  
                                            <i class="bi bi-person-circle"></i>
                                            <span><?=$user['Username']?></span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="user">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <a class="dropdown-item" href="index.php?act=logout" data-toggle="modal" data-target="#logoutModal">
                                                <i class="fa-solid fa-right-from-bracket"></i>
                                                    Logout
                                                </a></li>
                                        </ul>
                                    </li>
                                <?php
                            }else {
                                ?>
                                <li>
                                    <a class="nav-link rounded-3 px-2 m-0 " href="login.php">Đăng Nhập</a>
                                </li>
                                <li class="px-3">
                                    <a class="nav-link rounded-3 px-2 m-0 " href="register.php">Đăng Ký</a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid " style="background: linear-gradient( to right, #2a343d, #2e2a3a ) ;">
        <div class="container p-0">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <div class="container-fluid p-0 ">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav nav">
                            <?php
                            $kq = getcategory();
                            if (isset($kq) && count($kq) > 0) {
                                foreach ($kq as $dscate) {
                                    echo '
                            <li class="nav-item">
                                <a class=" nav-link p-2 fs-6 text-capitalize text-decoration-none" href="index.php?act=category&id='.$dscate['ID'].'">'.$dscate['NameCategory'].'</a>
                            </li>
                            ';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    