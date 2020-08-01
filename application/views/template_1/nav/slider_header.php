<!-- Navbar slider-->
<div class="container ">
        <div class="text-center ongoing-anime">
            <h4>Recommended Anime</h4>
        </div>
        
        <div class="owl-carousel">
            <?php if($API_TheMovieTrendingRs->API_TheMovieRs->Status=="Not Complete"|| empty($API_TheMovieTrendingRs)){ ?>
                <div class="carousel-heider">
                    <img src=<?php echo base_url()."assets/template_1/assets/img/slide/1.png"?> class="">
                </div>
            <?php }else{?>
                <?php foreach($API_TheMovieTrendingRs->API_TheMovieRs->Body->TrendingWeekAnime as $API_TheMovieTrendingRs){ ?>
                    <?php //$param = $API_TheMovieTrendingRs->IdDetailAnime.'-'.$API_TheMovieTrendingRs->SlugDetail; ?>
                    <?php $param = $API_TheMovieTrendingRs->SlugDetail; ?>
                <div class="carousel-heider anime-inner" title="<?php echo $API_TheMovieTrendingRs->Title ?>" >
                    <a href="<?php echo site_url('anime/'.$param); ?>">
                        <img src="<?php echo $API_TheMovieTrendingRs->Image ?>" class="" alt="<?php echo $API_TheMovieTrendingRs->Title ?>">
                    </a>
                </div>
                <?php } ?>
            <?php }?>
        </div>
</div>
    <div class="container">
    <!-- iklan ylix -->
    
    </div>