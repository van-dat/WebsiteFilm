<?php
function updatemovie($id, $idmovi, $video, $episode)
{
    $conn = connectdb();
    $sql = "UPDATE movie SET  IDFilm  = '$idmovi', Video = '$video', Episode = '$episode'  WHERE  ID= ".$id;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
}
function onemovie($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT t1.ID, 
    t1.IDFilm , 
    t1.Episode, 
    t1.Video, 
    t2.NameFilm , 
    t2.ImgFilm FROM movie t1 INNER JOIN film t2 ON t1.IDFilm = t2.ID WHERE t1.ID=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getallmovie()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT t1.ID, 
    t1.IDFilm , 
    t1.Episode, 
    t1.Video, 
    t2.NameFilm , 
    t2.ImgFilm FROM movie t1 INNER JOIN film t2 ON t1.IDFilm = t2.ID;");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function deletemovie($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM movie WHERE ID=" . $id;

    // use exec() because no results are returned
    $conn->exec($sql);
}
//search
function search($search)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT 
        t1.ID, 
        t1.NameCategory, 
        t1.numFilm,
        t2.ID,
        t2.NameFilm, 
        t2.ImgFilm, 
        t2.Episode, 
        t2.IDcategory, 
        t2.Length, 
        t2.Status, 
        t2.Content_film  
        FROM category t1
        INNER JOIN film t2 ON t1.ID = t2.IDcategory WHERE t2.NameFilm LIKE '$search' or t1.NameCategory LIKE '$search'");
    $stmt->execute();
    $kq = $stmt->fetchAll();
    return $kq;
}

function getEpisode($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT IDFilm, Episode, video FROM movie WHERE IDFilm =" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqMovie = $stmt->fetchAll();
    return $kqMovie;
}
function getfavourit()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT 
        t1.ID, 
        t1.NameCategory, 
        t1.numFilm,
        t2.ID,
        t2.NameFilm, 
        t2.ImgFilm, 
        t2.Episode, 
        t2.IDcategory, 
        t2.Length, 
        t2.Status, 
        t2.Content_film  
        FROM category t1
        INNER JOIN film t2 ON t1.ID = t2.IDcategory WHERE  t2.Status ='1'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqone = $stmt->fetchAll();
    return $kqone;
}
function getfilmcate($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT 
        t1.ID, 
        t1.NameCategory, 
        t1.numFilm,
        t2.ID,
        t2.NameFilm, 
        t2.ImgFilm, 
        t2.Episode, 
        t2.IDcategory, 
        t2.Length, 
        t2.Status, 
        t2.Content_film  
        FROM category t1
        INNER JOIN film t2 ON t1.ID = t2.IDcategory WHERE  t2.IDcategory =" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqone = $stmt->fetchAll();
    return $kqone;
}
function addfilm($namefilm, $imgFilm, $episode, $category, $lenght, $status, $contentfilm)
{
    $conn = connectdb();
    $sql = "INSERT INTO `film` (`NameFilm`, `ImgFilm`, `Episode`, `IDcategory`, `Length`, `Status`, `Content_film`) VALUES 
        ( '$namefilm', '$imgFilm', '$episode', '$category', '$lenght', '$status', '$contentfilm')";
    $conn->exec($sql);
}
function addmovie($idfilm, $epi, $video)
{
    $conn = connectdb();
    $sql = "INSERT INTO movie (IDFilm, Episode, Video) VALUES ('$idfilm', '$epi', '$video')";
    $conn->exec($sql);
}
function addcmt($iduser, $cmt)
{
    $conn = connectdb();
    $sql = "INSERT INTO comment (Iduser, ContentCmt) VALUES ('$iduser', '$cmt')";
    $conn->exec($sql);
}
function uploadfile()
{
    $target_dir = "../img_upload/";
    $target_file = $target_dir . basename($_FILES["imgfilm"]["name"]);

    move_uploaded_file($_FILES["imgfilm"]["tmp_name"], $target_file);
}
function uploadvideos()
{
    $target_dir = "../Videos/";
    $target_file = $target_dir . basename($_FILES["video"]["name"]);
    move_uploaded_file($_FILES["video"]["tmp_name"], $target_file);
}
function updatefilm($id, $namefilm, $imgFilm, $episode, $category, $lenght,  $status, $contentfilm)
{
    $conn = connectdb();
    $sql = "UPDATE `film` SET  `NameFilm` = '$namefilm', `ImgFilm` = '$imgFilm', `Episode` = '$episode', `IDcategory` = '$category', `Length` = '$lenght', `Status` = '$status', `Content_film` = '$contentfilm' WHERE `film`.`ID` = " . $id;
    // Prepare statement
    $stmt = $conn->prepare($sql);
    // execute the query
    $stmt->execute();
}
function getcategory()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM category");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqcate = $stmt->fetchAll();
    return $kqcate;
}
function getonefilm($id)
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT 
        t1.ID, 
        t1.NameCategory, 
        t1.numFilm,
        t2.ID,
        t2.NameFilm, 
        t2.ImgFilm, 
        t2.Episode, 
        t2.IDcategory, 
        t2.Length, 
        t2.Status, 
        t2.Content_film  
        FROM category t1
        INNER JOIN film t2 ON t1.ID = t2.IDcategory WHERE t2.ID =" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqone = $stmt->fetchAll();
    return $kqone;
}
function deletefilm($id)
{
    $conn = connectdb();
    $sql = "DELETE FROM film WHERE ID=" . $id;

    // use exec() because no results are returned
    $conn->exec($sql);
}
function getallcmt()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT t1.ID,
         t1.Iduser,
         t1.ContentCmt,
         t1.time,
         t2.ID,
         t2.Email,
         t2.Username,
         t2.Password,
         t2.Keyuser
        FROM comment t1 INNER JOIN user t2 ON t1.Iduser = t2.ID");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function getallfilm()
{
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT 
        t1.ID, 
        t1.NameCategory, 
        t1.numFilm,
        t2.ID,
        t2.NameFilm, 
        t2.ImgFilm, 
        t2.Episode, 
        t2.IDcategory, 
        t2.Length, 
        t2.Status, 
        t2.Content_film  
        FROM category t1
        INNER JOIN film t2 ON t1.ID = t2.IDcategory");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
