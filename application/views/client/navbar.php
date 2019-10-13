<style>
    .navbar {        
        height: auto;
        padding-top: 0px!important;
        padding-bottom: 0px!important;
    }    
    .navbar-brand {
        margin: 0px!important;
        padding: 0px!important;
    }
    .navbar .nav-item {
        padding-left: 20px;
        padding-right: 20px;
    }
</style>


<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="<?=base_url()?>">
        <img src="<?=base_url()?>assets/images/logo.png" width="350" height="" alt="" class="my-1">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link text-light" href="#">ABOUT US</a>
        </li>      
        <li class="nav-item">
            <a class="nav-link text-light page" href="#trending">TRENDING</a>
        </li>      
        <li class="nav-item">
            <a class="nav-link text-light page" href="#contact">CONTACT</a>
        </li>      
        <li class="nav-item">
            <a class="nav-link">
                <i class="text-white fa fa-search" style="font-size:20px;"></i>
            </a>
        </li>              
        </ul>    
    </div>
</nav>