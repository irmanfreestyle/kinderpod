<div class="box-body">
    
    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addAlbum">
        Tambah Album
    </button>
    
    <br>
    <br>    
    <div class=" table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar Album</th>
                <th scope="col">Nama Album</th>
                <th scope="col">Aksi</th>                
                </tr>
            </thead>
            <?php if(empty($albums)):?>
                <tr>
                    <td colspan="3">                    
                        <h5 class="text-center">Belum ada album</h5>                    
                    </td>
                </tr>
            <?php else: ?>
                <tbody>
                    <?php $i = 1; foreach($albums as $album): ?>
                        <tr>
                            <th scope="row"><?=$i++?></th>
                            <td>
                                <img src="<?=base_url()?>upload/<?=$album->image?>" width="100" height="50" alt="">
                            </td>
                            <td>
                                <?=$album->title?>
                            </td>
                            <td>
                                <a onclick="return confirm('Jika album dihapus, semua episode akan terhapus')" href="<?=base_url()?>podcast/deleteAlbum?album_id=<?=$album->album_id?>&image=<?=$album->image?>">
                                    <button class="btn-sm btn btn-danger">Hapus Album</button>
                                </a>
                            </td>                        
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php endif;?>            
        </table>
    </div>
</div>




<!-- ADD ALBUM MODAL -->
<div class="modal fade" id="addAlbum" tabindex="-1" role="dialog" aria-labelledby="modal-review" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-review">Tambah Album</h5>        
      </div>
      <form enctype='multipart/form-data' method="post" action="<?=base_url()?>podcast/addAlbum">
        <div class="modal-body">
            <div class="form-group">
                <label class="text-success" for="file">Pilih Gambar Album</label>
                <input class="file" type="file" accept="image/*" name="album_image">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Album</label>
                <input required autofocus type="text" class="form-control" placeholder="Masukan Nama Album" name="album_title">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Tambah Album</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END MODAL -->