<div class="content">
    <div class="container bg-watch">
        <div class="row">
            <div class="col-md-8">
                <div class="height"></div>
                <div class="col-12  p-0 m-0">
                    <div class="ratio ratio-16x9">
                        <iframe src="./Videos/<?=$movie[0]['video']?>" title="YouTube video" allowfullscreen></iframe>
                    </div>
                </div>"
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
                        <a href="index.php?act=kq&id=' . $ds['ID'] . '" class="text-decoration-none d-flex" style="color: #FFF; font-size: 13px; ">
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