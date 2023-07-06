<div class="content">
    <div class="container bg-watch">
        <div class="row">
            <div class="col-md-8">
                <div class="height"></div>
                <div class="col-12 row p-0 m-0">
                    <div class="col-md-4">
                        <div class=" movie-post d-flex justify-content-center">
                            <img src="./img_upload/<?= $kq[0]['ImgFilm'] ?>" alt="img" class="img-fluid img-rd" />
                            <div class="movie-play">
                                <a href="index.php?act=view&id=<?= $kq[0]['ID'] ?>" class="btn-play">
                                    <i class="fa-solid fa-play"></i>
                                    Xem phim
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 py-3">
                        <div class="film-poster">
                            <h1 class="film-title"><?= $kq[0]['NameFilm'] ?></h1>
                            <p>
                                <i class="fa-regular fa-clock pe-1"></i>
                                <?= $kq[0]['Length'] ?> phút
                            </p>
                            <p>Mới nhất :
                                <span class="epi">Tập
                                    <?= $kq[0]['Episode'] ?>
                                </span>
                            </p>
                            <p>Thể loại :
                                <span class="film-category">
                                    <?= $kq[0]['NameCategory'] ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="height"></div>
                <div class="film-episode">
                    <ul class="nav nav-tabs " style="border-bottom: 1px solid #2e2e38; ">
                        <li class="nav-item border-0">
                            <a class="nav-link active border-0" style="background: #2e2e38; color: #FFF;">
                                <i class="fas fa-server"></i>
                                FULL HD
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="content-epi">
                    <ul class="nav">
                        <?php
                        foreach ($movie as $key) {
                        ?>
                            <li class="nav-item col-2 col-lg-1 p-1">
                                <a class="nav-link bg-item" href=""><?= $key['Episode'] ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="entry-content p-3">
                    <div class="section-title p-0 position-relative">
                        <span>Nội Dung phim</span>
                    </div>
                    <div class="heading-film">
                        <p style="text-transform: capitalize;">
                            <?= $kq[0]['NameFilm'] ?>
                        </p>
                    </div>
                    <div class="content-film">
                        <p><?= $kq[0]['Content_film'] ?></p>
                    </div>
                </div>

                <!-- comment -->
                <div class="height"></div>
                <div class="film-episode">
                    <ul class="nav  justify-content-center">
                        <li class="nav-item border-0 w-100">
                            <?php
                            if (isset($user) && $user != 1) {
                            ?>
                                <span class="comment nav-link border-0 ">
                                    Bình luận
                                </span>
                                <form method="post" action="index.php?act=watch&id=<?= $kq[0]['ID'] ?>">
                                    <div class="form-floating">
                                        <textarea class="form-control cmt-text text-dark " placeholder="Leave a comment here" name="comment"></textarea>
                                        <label for="floatingTextarea">Comments</label>
                                        <input type="hidden" name="id" value="<?= $user['ID'] ?>">
                                    </div>
                                    <div class="justify-content-end py-3 float-end">
                                        <input class="btn btn-danger" name="add" type="submit" value="gửi">
                                    </div>
                                </form>
                            <?php
                            } else {
                            ?>
                                <span class="comment nav-link border-0 ">
                                    Đăng nhập để bình luận
                                </span>
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>
                <div class="entry-content p-3">
                    <div class=" p-0 position-relative">
                        <span class="text-white">Bình Luận</span>
                        <?php
                        // var_dump($allcmt);
                        if ($allcmt[0] >= 1) {
                            foreach ($allcmt as $cmt) {
                        ?>
                                <div class="list-cmt d-flex my-3">
                                    <div class="avatar">
                                        <img style="width: 50px; padding: 5px;" class="img-fluid" src="./img_upload/anh1.png" alt="">
                                    </div>
                                    <div class="content-cmt px-3 d-flex flex-column">
                                        <div class="cmt-user"><?=$cmt['Username']?></div>
                                        <div class="cmt-text"><?=$cmt['ContentCmt']?></div>
                                        <div class="cmt-time">Nguyễn Văn A</div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                <div class="favourite ">
                    <div class="content-heading bd position-relative">
                        <span class="h-text">
                            xem nhiều
                        </span>
                    </div>
                    <div class="list-film">
                        <?php
                        $kqfavour = getfavourit();
                        if (isset($kqfavour)) {
                            foreach ($kqfavour as $ds) {
                                echo '
                      <div class="item-film overflow-hidden">
                        <a href="index.php?act=watch&id=' . $ds['ID'] . '" class="text-decoration-none d-flex" style="color: #FFF; font-size: 13px; ">
                          <figure class="overflow-hidden m-0">
                            <img src="./img_upload/' . $ds['ImgFilm'] . '" alt="" class="img-favourite img-fluid ">
                          </figure>
                          <div class="favourite-heading">
                            <span class="text-capitalize">' . $ds['NameFilm'] . '</span>
                          </div>
                        </a>
                      </div>
                      ';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>