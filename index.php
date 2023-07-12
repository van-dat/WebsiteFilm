<?php
session_start();
ob_start();
include "./model/config.php";
include "./model/menu.php";
include "./view/header.php";
if (isset($_GET['act'])) {
  switch ($_GET['act']) {
    case 'index':
      if (isset($_POST['search'])&& $_POST['search'] !="") {
       $search = $_POST['search'];
       $kq =search($search);
      }else {
        $kq = getallfilm();
      }
      include "./view/main.php";
      break;
    case 'category':
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $kq = getfilmcate($id);
        include "./view/main.php";
      }
      break;
    case 'watch':
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $kq = getonefilm($id);
        $movie = getEpisode($id);
        $allcmt = getallcmt();
        include "./view/watch.php";
      }
      if (isset($_POST['id'])) {
        $iduser = $_POST['id'];
        $cmt = $_POST['comment'];
        addcmt($iduser, $cmt);
      }
      break;
    case 'view':
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $kq = getonefilm($id);
        $movie = getEpisode($id);
        include "./view/view.php";
        // var_dump($view);
      }

      break;

    case 'logout':
      unset($_SESSION['user']);
      header('location: index.php');
      break;
    case '':

      break;

    default:
      # code...
      break;
  }
} else {
  $kq = getallfilm();
  include "./view/main.php";
}
include "./view/footer.php";
