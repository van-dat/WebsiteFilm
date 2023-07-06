
<div class="container">
    <div class="row justify-content-center">
        <form action="index.php?act=addmovie" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">NameFilm</label>
                <input type="text" class="form-control" value="<?=$kqone[0]['NameFilm']?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">video</label>
                <input class="form-control h-auto" type="file" name="video" >
            </div>
            <div class="d-flex">
                <div class="col-auto p-0">
                    <label class="visually-hidden" >Tập</label>
                    <input type="number" min="0" class="form-control w-50" name="epimovie" >
                </div>
            </div>
            <div class="d-flex justify-content-center py-3">
                <input type="hidden" name="id" value="<?=$kqone[0]['ID']?>">
                <input class="btn btn-facebook" name="addmovie" type="submit" value="Submit">
            </div>
        </form>

    </div>
</div>