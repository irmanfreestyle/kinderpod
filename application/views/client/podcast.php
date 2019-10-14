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

    .active-podcast {        
        border: 1px solid #1D4598;
        box-sizing: border-box!important;
        box-shadow: 1px 2px 4px rgba(0,0,0,0.5);
    }



    .bg {
        position: absolute;
        width: 150px;
        height: 150px;
        z-index: 1;        
        opacity: 0.6;
    }
    .bg:nth-child(1) {top: 0px;left: -180px;transform: rotate(-30deg)}
    .bg:nth-child(2) {top: 0px;right: 220px;transform: rotate(30deg)}
    .bg:nth-child(3) {bottom: 0px;left: -180px;transform: rotate(30deg)}
    .bg:nth-child(4) {bottom: 0px;right: 220px;transform: rotate(-30deg)}

</style>


<div class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-7">
                <div class="d-flex align-items-center">
                    <div class="thumbnail-image my-1 mx-0" style="background-image:url('<?=base_url()?>upload/<?=$album->image?>')"></div>                                       
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
                    <a download href="<?=base_url()?>upload/<?=$current_podcast->file?>" type="button" class="btn btn-secondary btn-block">
                        <i class="fa fa-download"></i>
                        Download
                    </a>
                </div>
            </div>

            <div class="col-sm12 col-md-7">
                <div class="text-primary"><?=$album->title.": ".$current_podcast->podcast_title?></div>
                <div class="text-secondary">Podcaster #<?=$current_podcast->podcast_announcer?></div>   
                <br>
                <audio controls style="width:100%" id="podcast_play">
                    <source src="<?=base_url()?>upload/<?=$current_podcast->file?>" type="audio/ogg">
                    <source src="<?=base_url()?>upload/<?=$current_podcast->file?>" type="audio/mpeg">
                    <source src="<?=base_url()?>upload/<?=$current_podcast->file?>" type="audio/mp3">
                    <source src="<?=base_url()?>upload/<?=$current_podcast->file?>" type="audio/mp4">
                    Your browser does not support the audio element.
                </audio> 
            </div>
            <div class="col-sm-12 col-md-5"></div>            
        </div>

        <div class="row my-4" style="position: relative;">
            <img class="bg" src="<?=base_url()?>assets/images/ice-cream-cup.png" alt="ice-cream-cup">
            <img class="bg" src="<?=base_url()?>assets/images/popsicle.png" alt="popsicle">    
            <img class="bg" src="<?=base_url()?>assets/images/popsicle.png" alt="popsicle">
            <img class="bg" src="<?=base_url()?>assets/images/ice-cream-cup.png" alt="ice-cream-cup">    

            <div class="col-sm-12 col-md-7" style="z-index:999;">                
                <h5>Episode Info</h5>
                <p>
                    <?=$current_podcast->podcast_info?>
                </p>      
                <br><br>
                
                <h5>Episode Lainnya</h5>
                <ul class="list-group">                    
                    <?php foreach($podcasts as $index=>$podcast): ?>
                        <a href="<?=base_url()?>podcast/album/<?=$album->album_id."/".$podcast->podcast_id?>">
                            <li class="list-group-item d-flex align-items-center my-1 
                                <?=($podcast_id==$podcast->podcast_id) ? 'active-podcast' : '' ?>
                            ">
                                <div class="d-flex flex-column w-100">
                                    <span><?=$podcast->podcast_title?></span>
                                    <small class="text-secondary">Podcaster #<?=$podcast->podcast_announcer?></small>                            
                                </div>                                 
                                <span>
                                    <i style="font-size:25px" class="text-primary fa fa-play-circle"></i>
                                </span>                                                                                        
                            </li>       
                        </a>       
                    <?php endforeach; ?>      
                </ul>

                <br><br>
                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modalReview">
                    Beri Ulasan
                </button>
                <?php if(empty($reviews)): ?>
                    <div class="py-2 text-secondary">Belum ada review untuk podcast <?=$current_podcast->podcast_title?></div>
                <?php endif; ?>
                
                <?php foreach($reviews as $review): ?>
                    <div class="py-3 px-3 my-2" style="background:#ddd;">
                        <div><b><?=$review->reviewer?></b></div>
                        <?php for($i=0;$i<$review->rate;$i++):?>
                            <i class="fa fa-star text-warning" style="font-size:19px"></i>
                        <?php endfor; ?>
                        <p>
                            <?=$review->message?>
                        </p>
                    </div>                          
                <?php endforeach; ?>
            </div>            
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
      <form method="post" action="<?=base_url()?>podcast/review/<?=$album->album_id.'/'.$current_podcast->podcast_id?>">
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Rating</label>
                <br>
                <?php for($i=0;$i<5;$i++):?>
                    <i onclick="rate(<?=$i?>)" class="rating-star fa fa-star text-secondary" style="font-size:19px"></i>
                <?php endfor; ?>
                <input type="hidden" required id="rating" name="rating" value="">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" required class="form-control" placeholder="Masukan Nama" value="anonim" name="reviewer_name">
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

        document.getElementById("rating").value = index+1
    }    


    // CALCULATE PODCAST DURATION
    // function readableDuration(seconds) {
    //     sec = Math.floor( seconds );    
    //     min = Math.floor( sec / 60 );
    //     min = min >= 10 ? min : '0' + min;    
    //     sec = Math.floor( sec % 60 );
    //     sec = sec >= 10 ? sec : '0' + sec;    
    //     return min + ':' + sec;
    // }    
</script>