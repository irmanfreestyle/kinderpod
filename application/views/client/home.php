<style>
    .header-bg {
        width: 100%;
        height: 680px;
        background-repeat: no-repeat;        
        background-size: 100% 100%;
        background-position-y: -170px!important;
        margin-top: 70px;
        position: absolute;
        filter: brightness(28%);
        left: 0;
        right: 0;
        top: 0;
    }
    #header-carousel {        
        width: 100%;                  
    }

    .owl-carousel .owl-carousel-item {
        height: 490px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;        
        background: transparent!important;
    }    

    .owl-item {
        background: transparent!important;
    }

    .thumbnail-image {
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position-y: center;
        height: 150px;
        border-radius: 20px;
    }

    #contact {
        width: 100%;
        position: relative;        
        margin-top: 100px;
        margin-bottom: 100px;
    }
    #contact img {
        position: absolute;
        width: 150px;
        height: 150px;
        z-index: 1;       
        opacity: 0.7; 
    }
    #contact img:nth-child(1) {top: 0px;left: 30px;transform: rotate(-30deg)}
    #contact img:nth-child(2) {top: 0px;right: 30px;transform: rotate(30deg)}
    #contact img:nth-child(3) {bottom: 0px;left: 30px;transform: rotate(30deg)}
    #contact img:nth-child(4) {bottom: 0px;right: 30px;transform: rotate(-30deg)}
    .contact-inner {
        margin: auto;
        width: 700px;
        max-width: 100%;
        z-index: 200;
        position: relative;
    }


    .btn-album {
        transition: 0.3s;
    }
    .btn-album:hover {
        background: #1B3E98!important;
        cursor: pointer;
        color: white;
    }
    .album-active {
        background: #1B3E98;
        color: white;
    }


    .zoom-view {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 100%;
        background: rgba(0,0,0,0.7);
        display: none!important;
        border-radius: 20px;
    }

    .wrapper-podcast:hover .zoom-view {
        display: flex!important;
    }

    .wrap-trending {
        overflow-x: auto;
        padding: 17px;
        box-sizing: border-box;
    }
    .wrap-album {
        min-width: 700px;                
    }
    


    .owl-carousel {
        position: relative!important;
    }
    .owl-nav {        
        display: flex;
        justify-content: space-between;
        position: absolute;
        top: 40%;
        width: 100%;        
        height: 0px!important;
    }
    .owl-nav button {
        outline: none!important;
    }
    .owl-nav button span{        
        color: white!important;
        font-size: 60px!important;
        padding: 0 20px;
        font-weight: 200px!important;
    }


    .owl-dots {
        display: flex;
        justify-content: center;          
        position: absolute;
        bottom: 8%;
        width: 100%;      
    }
    .owl-dots .active {
        background: blue!important;
    }

    .owl-dots button {        
        margin: 0px 10px;
        width: 15px!important;
        height: 15px!important;
        border-radius: 100%!important;
        background: grey!important;
    }


    .share-wrapper {
        display: none;
        width: 100%;
        top:0;
        bottom:0;
        position: absolute;              
        align-items: center;
        justify-content: center;  
        background: white;
        border: 1px solid grey;
    }    

    a:hover {
        cursor: pointer;
    }
    
</style>

<div class="header-bg" style="background-image:url('<?=base_url()?>assets/images/baby.jpg')"></div>


<!-- HEADER CAROUSEL -->
<div class="owl-carousel" id="header-carousel">
  <div class="owl-carousel-item text-light">
      <h1>Welcome to the Education Podcast for Kids</h1>
      <h4>Listen to Indonesian Fabels, Folklore, Religion & More.</h4>
  </div>  
  <div class="owl-carousel-item text-light">
      <h1>About Us</h1>
      <h5 class="text-center" style="width:800px;max-width:100%;line-height:30px;">
        KinderPod adalah Podcast edukasi untuk mencerdaskan anak-anak Indonesia. <br>

        Kami mengangkat cerita fabel dan rakyat untuk mengingatkan kembali budaya
        Indonesia untuk generasi milenial. <br>

        Selain itu kami juga menampilkan cerita religi untuk dapat memperkenalkan kisah
        mulia para nabi agar semakin mendekatkan anak pada agama. <br>

        dan kisah inspiratif bagi anak yang dapat membantu untuk mengembangkan/
        membentuk karakteristik anak. <br>

        Yuk bantu kami untuk terus berkembang dengan menyebarkan Podcast kami ke
        teman & kerabat kamu! <br>

        Terima kasih
      </h5>
  </div>  
</div>
<!-- HEADER CAROUSEL END -->


<!-- TRENDING STORIES ALBUM -->
<div class="bg-warning py-3" id="trending" style="position:relative;z-index:300">
    <div class="container d-flex justify-content-center align-items-center flex-wrap wrap-trending">
        <span>Trending Stories Album: </span>
        <div class="wrap-album">
            <span class="btn-album rounded-pill border border-dark mx-3 py-1 px-4 text-center album-active">All</span>
            <span class="btn-album rounded-pill border border-dark mx-3 py-1 px-4 text-center">Fabels</span>
            <span class="btn-album rounded-pill border border-dark mx-3 py-1 px-4 text-center">Folfkore</span>
            <span class="btn-album rounded-pill border border-dark mx-3 py-1 px-4 text-center">Education</span>
            <span class="btn-album rounded-pill border border-dark mx-3 py-1 px-4 text-center">Religion</span>
        </div>
    </div>
</div>
<!-- END TRENDING STORIES ALBUM -->


<!-- PODCAST LIST -->
<div class="container my-3">
    <div class="row">
        <?php $i=0; foreach($albums as $album): ?>
            <?php if(count($album->podcasts) > 1): ?>
            <div class="col-sm-12 col-md-6 py-2 px-2 wrapper-podcast">            
                <div class="thumbnail-image my-1" style="position:relative;background-image:url('<?=base_url()?>upload/<?=$album->image?>')">
                
                    <div class="zoom-view d-flex justify-content-center align-items-center">
                        <a href="<?=base_url()?>podcast/album/<?=$album->album_id?>/<?=$album->podcasts[1]->podcast_id?>" class="px-3">
                            <i class="fa text-primary fa-play-circle" style="font-size:60px"></i>
                        </a>
                        <a href="#" class="px-3">
                            <i class="fa fa-plus-circle text-white" style="font-size:60px"></i>
                        </a>
                        <a class="px-3" onclick="showShare('<?=$i++?>')">
                            <i class="fa fa-share-square-o text-white" style="font-size:60px"></i>
                        </a>

                        <div class="share-wrapper flex-column">
                            <div>
                                <a href="https://www.facebook.com/sharer.php?u=<?=base_url()?>podcast/album/<?=$album->album_id?>/<?=$album->podcasts[1]->podcast_id?>" target="_blank"><img src="https://4.bp.blogspot.com/-raFYZvIFUV0/UwNI2ek6i3I/AAAAAAAAGSA/zs-kwq0q58E/s1600/facebook.png" alt="Facebook" /></a> 

                                <a href="https://twitter.com/share?url=<?=base_url()?>podcast/album/<?=$album->album_id?>/<?=$album->podcasts[1]->podcast_id?>&text=<?=$album->title?>" target="_blank"><img src="https://4.bp.blogspot.com/--ISQEurz3aE/UwNI4hDaQMI/AAAAAAAAGS4/ZAgmPiM9Xpk/s1600/twitter.png" alt="Twitter" /></a> 
                            </div>       
                            <button class="btn btn-sm btn-danger btn-close-share">close</button>
                        </div>


                        <a href="" class="px-3">
                            <i class="fa fa-download text-white" style="font-size:60px"></i>
                        </a>
                    </div>
                </div>                
                <div class="text-primary"><span class="font-weight-bold"><?=$album->title?></span>: <?=$album->podcasts[1]->podcast_title?></div>
                <div class="text-secondary">Podcaster #<?=$album->podcasts[1]->podcast_announcer?></div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<!-- END PODCAST LIST -->


<!-- CONTACT -->
<div id="contact">
    <img src="<?=base_url()?>assets/images/ice-cream-cup.png" alt="ice-cream-cup">
    <img src="<?=base_url()?>assets/images/popsicle.png" alt="popsicle">    
    <img src="<?=base_url()?>assets/images/popsicle.png" alt="popsicle">
    <img src="<?=base_url()?>assets/images/ice-cream-cup.png" alt="ice-cream-cup">    
    <div class="contact-inner">
        <h3>Contact Info</h3>
        <div class="px-5 py-5 bg-primary text-white">
            <h4>Coporate Address</h4>
            <p style="line-height:30px;">
                Ruang & Tempo Coworking Space <br>
                Gd. Tempo lt. 8 <br>
                Grogol Utara, Kebayoran Lama, Jakarta Selatan <br> <br>
                Phone: +62 878 7432 5228 / +62 812 9820 6571 <br>
                Email: zee@kinderpod.id/  qpradifa@kinderpod.id
            </p>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.671214178441!2d106.7898938!3d-6.2084943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc744bc8572b47d1c!2sPT%20Tempo%20Inti%20Media%20Tbk!5e0!3m2!1sid!2sid!4v1570888792632!5m2!1sid!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</div>
<!-- END CONTACT -->



<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            items: 1,                       
            dots: true, 
            nav: true,
            singleItem: true,
            autoplay: true,
            loop: true,
            autoplayHoverPause: true            
        });

        
    })



    function showShare(index) {        
        $(".share-wrapper").eq(index).css("display", "flex");            
    }
    $(".btn-close-share").click(function() {
        $(".share-wrapper").css("display", "none");            
    })


    // SCROLL
    let pages = document.querySelectorAll(".page");
    pages.forEach(function(page) {
        page.addEventListener('click', function(e) {
            e.preventDefault()
            let target = document.getElementById(e.target.hash.split("#")[1]);            

            window.scrollTo({
                top: target.offsetTop - 150,
                behavior: 'smooth'                
            })
        });
    })



    
</script>