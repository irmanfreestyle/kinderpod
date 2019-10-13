<input type="hidden" class="base_url" value="<?=base_url()?>">

<div class="box-body">            
    <form method="post" enctype='multipart/form-data' action="<?=base_url()?>admin/uploadPodcast">                    

        <div class="form-group">
            <?php if($this->session->flashdata('success_upload')): ?>        
                <div class="alert alert-success alert-dismissible" role="alert">
                Berhasil upload Podcast
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>                
            <?php elseif($this->session->flashdata('error_upload')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Gagal upload Podcast
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>        

        <div class="form-group">
            <label class="text-success" for="file">Pilih File Podcast</label>
            <input class="file" type="file" name="podcast_file">
        </div>

        <div class="form-group">
            <label class="text-success">Judul Podcast</label>
            <input required type="text" class="form-control" placeholder="Masukkan Judul Podcast" name="podcast_title" value="">
        </div> 

        <div class="form-group">
            <label class="text-success">Kategori Podcast</label>
            <select class="form-control" name="podcast_category">
                <option value="" selected disabled>pilih Kategori podcast</option>
                <option value="fabels">Fabels</option>             
                <option value="folklore">Folklore</option>
                <option value="education">Education</option>
                <option value="religion">Religion</option>
            </select>
        </div>

        <div class="form-group">            
            <label class="text-success">Album</label>
            <select class="form-control" name="podcast_album">
                <option value="" selected disabled>pilih album</option>
                <?php foreach($albums as $album): ?>                
                    <option value="<?=$album->album_id?>,<?=$album->title?>"><?=$album->title?></option>             
                <?php endforeach;?>
            </select>
        </div>

        <div class="form-group">
            <label class="text-success">Podcast Info</label>
            <textarea name="podcast_info" class="form-control" rows="3" placeholder="Masukan info podcast..."></textarea>
        </div> 

        <div class="form-group">
            <label class="text-success">Penyiar Podcast</label>
            <input required type="text" class="form-control" placeholder="Masukkan Penyiar Podcast" name="podcast_announcer" value="">
        </div> 

        <div class="form-group">
            <button type="submit" class="btn btn-success"><?=$title?></button>
        </div>
    </form>    
</div>
