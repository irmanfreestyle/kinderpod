<div class="box-body">
    <form action="<?=base_url()?>admin/changePassword" method="post">
        <div class="form-group">
            <label class="text-success" for="judul">Password Lama</label>
            <input required type="text" class="form-control" id="judul" placeholder="Masukan password lama..." name="old-password">
        </div>
        <div class="form-group">
            <label class="text-success" for="judul">Password Baru</label>
            <input required type="text" class="form-control" id="judul" placeholder="Masukan password baru..." name="new-password">
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-success text-light" type="submit">Ubah</button>
        </div>
        
        <?php if($this->session->flashdata('changePassword') == 'success'): ?>
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>
                    <i class="icon fa fa-ban"></i>
                    Berhasil ubah password
                </h4>            
            </div>
        <?php elseif($this->session->flashdata('changePassword') == 'error'): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4>
                    <i class="icon fa fa-ban"></i>
                    Gagal ubah password, kemungkinan password lama salah
                </h4>            
            </div>
        <?php endif; ?>
    </form>
</div>