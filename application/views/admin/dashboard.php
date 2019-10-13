
<div class="box-body">
    <div class=" table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">No</th>                
                <th scope="col">Judul Podcast</th>
                <th scope="col">Podcast Info</th>
                <th scope="col">Album</th>
                <th scope="col">Audio Podcast</th>
                <th scope="col">Penyiar</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach($podcasts as $podcast): ?>
                <tr>
                    <th scope="row"><?=$i++?></th>                        
                        <td><?=$podcast->podcast_title?></td>
                        <td style="width:150px;">
                        <?=$podcast->podcast_info?>...
                        </td>
                        <td><?=$podcast->album_title?></td>
                        <td>
                            <audio controls>
                                <source src="<?=base_url()?>upload/<?=$podcast->file?>" type="audio/ogg">
                                <source src="<?=base_url()?>upload/<?=$podcast->file?>" type="audio/mpeg">
                                <source src="<?=base_url()?>upload/<?=$podcast->file?>" type="audio/mp3">
                                <source src="<?=base_url()?>upload/<?=$podcast->file?>" type="audio/mp4">
                                Your browser does not support the audio element.
                            </audio>
                        </td>
                        <td><?=$podcast->podcast_announcer?></td>
                        <td>
                            <a onclick="return confirm('Hapus Podcast <?=$podcast->podcast_title?>')" class="btn btn-danger btn-sm" href="<?=base_url()?>admin/deletePodcast?id=<?=$podcast->podcast_id?>file=<?=$podcast->file?>" style="color:white;">HAPUS</a>
                            <a class="btn btn-primary btn-sm" href="" style="color:white;">DETAIL</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>