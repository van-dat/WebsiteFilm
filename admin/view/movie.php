<table class="table table-hover">
  <thead>
    <tr>
      <th  scope="col">STT</th>
      <th scope="col">NameFilm</th>
      <th scope="col">video</th>
      <th scope="col">Episode</th>
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
                        <td><video style="height: 100px;" src="../Videos/'.$key['Video'].'" controls="controls"></td>
                        <td>'.$key['Episode'].'</td>
                        <td><a class="btn btn-primary" href="index.php?act=updatemovie&id='.$key['ID'].'">sửa</a></td>
                        <td><a class="btn btn-danger" href="index.php?act=deletemovie&id='.$key['ID'].'">xóa</a></td>
                     </tr>';
                    $i++;
                }
            }
        ?>
        
        </tr>
  </tbody>
</table>
