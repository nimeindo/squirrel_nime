<!-- Content 2 -->
        <div class="container">
            <div class="row populer-anime">
                <div class="">
                    <h4>Populer Anime Ongoing</h4>
                    <!-- Baris 1 -->
                    <div class="row text-center ">
                    <?php if($API_TheMovieTrendingRs->API_TheMovieRs->Status=="Not Complete"||empty($API_TheMovieTrendingRs)){ ?>
                    <?php }else{?>
                        <?php foreach($API_TheMovieTrendingRs->API_TheMovieRs->Body->TrendingWeekAnime as $API_TheMovieTrendingRs){ ?>
                        <?php //$params = $API_TheMovieTrendingRs->IdDetailAnime.'-'.$API_TheMovieTrendingRs->SlugDetail;?>
                        <?php $params = $API_TheMovieTrendingRs->SlugDetail;?>
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6" href="<?php echo site_url('anime/'.$params); ?>" title="<?php echo $API_TheMovieTrendingRs->Title ?>">
                            <a href="<?php echo site_url('anime/'.$params); ?>">
                                <figure class="figure">
                                        <img src="<?php echo $API_TheMovieTrendingRs->Image ?>" class="figure-img img-fluid" alt="<?php echo $API_TheMovieTrendingRs->Title ?>">
                                        <figcaption class="figure-caption text-left">
                                            <h6><?php echo $API_TheMovieTrendingRs->Title ?></h6>
                                            <p><?php echo $API_TheMovieTrendingRs->Status ?></p>
                                        </figcaption>
                                </figure>
                            </a>
                        </div>
                        
                        <?php } ?>
                    <?php }?>

                    </div>

                </div>
            </div>
        </div>
        <!-- Content 2 -->