<!-- SHARE MODAL -->
<div class="modal fade" id="modalShare" tabindex="-1" role="dialog" aria-labelledby="modal-share" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-review">Share</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      <div id="share-buttons"> 
          <a href="https://www.facebook.com/sharer.php?u=<?=base_url()?>podcast/album/<?=$album->album_id."/".$current_podcast->podcast_id?>" target="_blank"><img src="https://4.bp.blogspot.com/-raFYZvIFUV0/UwNI2ek6i3I/AAAAAAAAGSA/zs-kwq0q58E/s1600/facebook.png" alt="Facebook" /></a> 

          <a href="https://twitter.com/share?url=<?=base_url()?>podcast/album/<?=$album->album_id."/".$current_podcast->podcast_id?>&text=<?=$album->title?>" target="_blank"><img src="https://4.bp.blogspot.com/--ISQEurz3aE/UwNI4hDaQMI/AAAAAAAAGS4/ZAgmPiM9Xpk/s1600/twitter.png" alt="Twitter" /></a>         

      </div>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL -->