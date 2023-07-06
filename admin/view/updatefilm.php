
<div class="container">
    <div class="row justify-content-center">
        <form action="index.php?act=update" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label">NameFilm</label>
                <input type="text" class="form-control" name="namefilm" value="<?=$kqone[0]['NameFilm']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">imgfilm</label>
                <input class="form-control h-auto" type="file" name="imgfilm">
            </div>
            <div class="d-flex">
                <div class="col-auto p-0">
                    <label class="visually-hidden" >Episode</label>
                    <input type="number" class="form-control" name="episode" value="<?=$kqone[0]['Episode']?>">
                </div>
                <div class="col-auto px-3">
                    <label class="visually-hidden">Length</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="length" value="<?=$kqone[0]['Length']?>">
                    </div>
                </div>
                <div class="col-auto p-0 ">
                    <label class="visually-hidden">Category</label>
                    <div>
                        <select class="form-control" name="category">
                            <option selected value="<?=$kqone[0]['IDcategory']?>" ><?=$kqone[0]['NameCategory']?></option>
                            
                            <?php
                                if(isset($kqcate)) {
                                    foreach ($kqcate as $key) {
                                        echo'
                                        <option value="'.$key['ID'].'">'.$key['NameCategory'].'</option>
                                        ';
                                    }
                                }
                            ?>
                        </select>
                    </div>  
                </div>
                <div class="col-auto p-0 ">
                    <label class="visually-hidden">Status</label>
                    <div>
                        <select class="form-control" name="status">
                            <option selected><?=$kqone[0]['Status']?></option>
                            <option value="0">Không</option>
                            <option value="1">có</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Content_film</label>
                <textarea  class="form-control"  rows="3" name="contentfilm"><?=$kqone[0]['Content_film']?></textarea>
            </div>
            <div class="d-flex justify-content-center py-3">
                <input type="hidden" name="id" value="<?=$kqone[0]['ID']?>">
                <input class="btn btn-facebook" name="capnhat" type="submit" value="Submit">
            </div>
        </form>

    </div>
</div>
