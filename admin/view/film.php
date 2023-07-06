<table class="table table-hover">
  <thead>
    <tr>
      <th  scope="col">STT</th>
      <th scope="col">NameFilm</th>
      <th scope="col">ImgFilm</th>
      <th scope="col">Episode</th>
      <th scope="col">IDcategory</th>
      <th scope="col">Length</th>
      <th scope="col">Status</th>
      <th scope="col">Content_film</th>  
      <th scope="col"></th>
      <th scope="col">  </th>  
    </tr>
  </thead>
  <tbody>
    </tr>
        <?php
        
            if(isset($kq) && count($kq) > 0 ) {
                $i=1;
                foreach ($kq as $key) {
                    echo'
                    </tr>
                        <th scope="row">'.$i.'</th>
                        <td style="text-transform: capitalize; ">'.$key['NameFilm'].'</td>
                        <td><img style="height: 100px;" src="../img_upload/'.$key['ImgFilm'].'" alt="img"></td>
                        <td>'.$key['Episode'].'</td>
                        <td>'.$key['IDcategory'].'</td>
                        <td>'.$key['Length'].'</td>
                        <td>'.$key['Status'].'</td>
                        <td>'.$key['Content_film'].'</td>
                        <td><a class="btn btn-primary" href="index.php?act=addmovie&id='.$key['ID'].'">Thêm tập</a></td>
                        <td><a class="btn btn-primary" href="index.php?act=update&id='.$key['ID'].'">sửa</a></td>
                        <td><a class="btn btn-danger" href="index.php?act=delete&id='.$key['ID'].'">xóa</a></td>
                
                     </tr>';
                    $i++;
                }
            }
        ?>
        
        </tr>
  </tbody>
</table>
<div class="d-flex justify-content-center pb-3">
    <a href="index.php?act=addfilm" type="submit" class="btn btn-primary">thêm mới</a>
</div>
