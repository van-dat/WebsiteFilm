<?php
    session_start();
    ob_start();
    include "../model/config.php";
    include "../model/menu.php";
    
    if(isset($_SESSION['user']) && $_SESSION['user']['Keyuser'] == 1){
        include "./view/header.php";
        if (isset($_GET['act'])) {
            switch ($_GET['act']) {
                case 'film':
                    $kq=getallfilm();
                    include "./view/film.php";
                    break;
                case 'delete':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                       deletefilm($id);
                    }
                    $kq=getallfilm();
                    include "./view/film.php";
                    break;
                case 'update':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $kqone=getonefilm($id);
                        $kqcate=getcategory();
                        include "./view/updatefilm.php";
                    }
                    
                    
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $namefilm = $_POST['namefilm'];
                        $imgFilm = $_FILES['imgfilm']['name'];
                        $episode = $_POST['episode'];
                        $category = $_POST['category'];
                        $lenght = $_POST['length'];
                        $status = $_POST['status'];
                        $contentfilm = $_POST['contentfilm'];
                        uploadfile();
                        updatefilm($id, $namefilm, $imgFilm, $episode, $category, $lenght, $status, $contentfilm);
                        $kq=getallfilm();
                        include "./view/film.php";
                        
                    }
                    break;
                case 'addfilm':
                    $kqcate=getcategory();
                    if(isset($kqcate)) {
                        include "./view/addfilm.php";
                    }
                    
                    if (isset($_POST['addfilm'])) {
                        $namefilm = $_POST['namefilm'];
                        $imgFilm = $_FILES['imgfilm']['name'];
                        $episode = $_POST['episode'];
                        $category = $_POST['category'];
                        $lenght = $_POST['length'];
                        $status = $_POST['status'];
                        $contentfilm = $_POST['contentfilm'];
                        uploadfile();
                        addfilm($namefilm, $imgFilm, $episode, $category, $lenght, $status, $contentfilm);
                        $kq=getallfilm();
                        include "./view/film.php";
                    }

                    break;
                    case 'addmovie':
                        
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $kqone=getonefilm($id);
                            include "./view/addmovie.php";  
                           
                        }
                        if(isset($_POST['id'])) {
                            $idfilm = $_POST['id'];
                            $video = $_FILES['video']['name'];
                            $epi = $_POST['epimovie'];
                            uploadvideos();
                            addmovie($idfilm, $epi, $video);
                            $kq=getallfilm();
                            include "./view/film.php";  
                        }   
                         
                        break;
                        //phần tập phim
                        case 'movie':
                            $kq = getallmovie();
                            include "./view/movie.php";
                            break;
                        case 'deletemovie':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                               deletemovie($id);
                            }
                            $kq = getallmovie();
                            include "./view/movie.php";
                            break;
                        case 'updatemovie':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $kqone=onemovie($id);
                                include "./view/updatemovie.php";
                            }
                            if (isset($_POST['id'])) {
                                $id = $_POST['id'];
                                $idmovi = $_POST['idfilm'];
                                $video = $_FILES['video']['name'];
                                $episode = $_POST['epi'];
                                uploadvideos();
                                updatemovie($id, $idmovi, $video, $episode);
                                $kq = getallmovie();
                                // var_dump($idfilm);  
                                var_dump($id);  

                                include "./view/movie.php";
                                
                            }
                            break;



                            //login
                    case 'logout':
                        if (isset($_SESSION['user'])) {
                            unset($_SESSION['user']);
                            header('location: ../index.php');
                        }
                        break;
                    
                default:
                    # code...
                    break;
            }
        }else {
            include "./view/home.php";
        }
        include "./view/footer.php";
    } else header('location: ../index.php')
?>