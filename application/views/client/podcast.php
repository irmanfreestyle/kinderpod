<style>

    @media only screen and (min-width: 991px) {
        .container {
            padding: 0 100px!important;                        
        }
    }


    .thumbnail-image {
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;        
        height: 230px;
        border-radius: 20px;        
        margin-right: 20px;
    }

    .control-btn:hover {
        transform: rotate(10deg);
        cursor: pointer;
    }

    .hide {
        display: none!important;        
    }

</style>


<div class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-7">
                <div class="d-flex align-items-center">
                    <div class="thumbnail-image my-1 mx-0" style="background-image:url('<?=base_url()?>upload/<?=$podcast->image?>')"></div>                                       
                </div>                                 
            </div>

            <div class="col-sm-12 col-md-1">
                <i onclick="playPodcast()" id="play_btn" class="control-btn fa fa-play-circle text-primary" style="font-size:70px"></i>
                <i onclick="pausePodcast()" id="pause_btn" class="hide control-btn fa fa-pause-circle text-primary" style="font-size:70px"></i>
            </div>

            <div class="col-sm-12 col-md-3">
                <div>
                    <button type="button" class="btn btn-warning btn-block">
                        <i class="fa fa-share-alt"></i>
                        Share
                    </button>
                    <a href="<?=base_url()?>upload/<?=$podcast->file?>" type="button" class="btn btn-secondary btn-block">
                        <i class="fa fa-download"></i>
                        Download
                    </a>
                </div>
            </div>

            <div class="col-sm12 col-md-8">
                <div class="text-primary"><?=$podcast->podcast_title?></div>
                <div class="text-secondary">Podcaster #<?=$podcast->podcast_announcer?></div>  
                <audio controls style="width:100%" id="podcast_play">
                    <source src="<?=base_url()?>upload/<?=$podcast->file?>" type="audio/ogg">
                    <source src="<?=base_url()?>upload/<?=$podcast->file?>" type="audio/mpeg">
                    <source src="<?=base_url()?>upload/<?=$podcast->file?>" type="audio/mp3">
                    <source src="<?=base_url()?>upload/<?=$podcast->file?>" type="audio/mp4">
                    Your browser does not support the audio element.
                </audio> 
            </div>
            <div class="col-sm-12 col-md-4"></div>


            <div class="col-sm12 col-md-8">
                <br><br>
                <h5>Episode Info</h5>
                <p>
                    <?=$podcast->podcast_info?>
                </p>
                <br><br>

                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modalReview">
                    Beri Ulasan
                </button>
                <div class="py-3 px-3 my-2" style="background:#ddd;">
                    <?php for($i=0;$i<5;$i++):?>
                        <i class="fa fa-star text-warning" style="font-size:19px"></i>
                    <?php endfor; ?>
                    <p>
                        Podcastnya keren sangat menginspirasi, Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium distinctio debitis dolores veritatis.
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </div>
</div>



<!-- REVIEW MODAL -->
<div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="modal-review" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-review">Beri Ulasan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>podcast/review/<?=$podcast->podcast_id?>">
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Rating</label>
                <br>
                <?php for($i=0;$i<5;$i++):?>
                    <i onclick="rate(<?=$i?>)" class="rating-star fa fa-star text-secondary" style="font-size:19px"></i>
                <?php endfor; ?>
                <input type="hidden" name="rating" value="">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" placeholder="Masukan Nama" value="anonim" name="reviewer_name">
            </div>
            <div class="form-group">
                <label>Pesan</label>
                <textarea placeholder="Masukan pesan ulasan" class="form-control" rows="3" name="message"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Submit Ulasan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END MODAL -->



<script>
    let podcast_play = document.getElementById("podcast_play");
    let play_btn = document.getElementById("play_btn");
    let pause_btn = document.getElementById("pause_btn");

    function playPodcast() {
        podcast_play.play();
        play_btn.classList.add("hide");
        pause_btn.classList.remove("hide");
    }
    function pausePodcast() {
        podcast_play.pause();
        play_btn.classList.remove("hide");
        pause_btn.classList.add("hide");
    }

    podcast_play.addEventListener("ended", function(){
        play_btn.classList.remove("hide");
        pause_btn.classList.add("hide");
    });



    function rate(index) {            
        let stars = document.querySelectorAll(".rating-star");
        stars.forEach(function(star) {
            star.classList.remove('text-warning');
        })
        
        for(i=0;i<=index;i++) {            
            stars[i].classList.add('text-warning');
        }
    }    
</script>