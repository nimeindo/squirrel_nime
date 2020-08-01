<?php
    // =======================API SEARCH ANIME =======================
        $pagAnime = 0;
        $TotalSearchPageAnime = 0;
        $PageNowSearchAnime = 1;
        $FirstPaginationAnime = 5;
        $SearchGenreAnime = [];
        if($API_SearchGenreAnime->API_TheMovieRs->Status == "Not Complete"){ 
        }else{
            $TotalSearchPageAnime = $API_SearchGenreAnime->API_TheMovieRs->Body->TotalSearchPage;
            $PageNowSearchAnime = $API_SearchGenreAnime->API_TheMovieRs->Body->PageSearch;
            $FirstPaginationAnime = $API_SearchGenreAnime->API_TheMovieRs->Body->FirstPagination;
            $SearchGenreAnime = $API_SearchGenreAnime->API_TheMovieRs->Body->SearchGenreAnime;
        }
    // =======================End API SEARCH ANIME =======================
?>
<!-- Card Body Anime Terbaru -->
    <div class="content-body">
        <div class="fixed-spacing pd-btm-search">
        
            <section class="container container-1080 mt40 mb80 animelist">
            <?php if(count($SearchGenreAnime)){ ?>
               <div class="row mb40">
                  <div class="col-12 col-md-7">
                     <h1 class="text-white font-bold"> <i class="far fa-eye text-lightmode-primary mr-3"></i>Search Anime <?php echo str_replace('-', ' ', $KeywordGenre) ?></h1>
                  </div>
               </div>
               
                <div class="row mt40">
                    <?php foreach($SearchGenreAnime as $SearchGenreAnimeV){ ?>
                    <?php $slug = $SearchGenreAnimeV->SlugDetail; ?>
                    <?php $ListDetail = $SearchGenreAnimeV->ListDetail; ?>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-per5 mb40">
                                <a href="<?php echo site_url('anime-detail/des/'.$slug); ?>">
                                        <div class="episode-card">
                                            <div class="episode-ratio background-cover" style="" >
                                            <img  src="<?php echo $SearchGenreAnimeV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $SearchGenreAnimeV->Title; ?>">
                                                <div class="episode-detail px-3 pt-5">
                                                <?php foreach($ListDetail as $ListDetailV){ ?>
                                                    <div class="">
                                                        <h5 class="text-white"><?php echo $SearchGenreAnimeV->Title; ?></h5>
                                                        <div class="ratingarea">
                                                        <span class="series-rating" style="background-size: 0% 100%">★★★★★</span>
                                                        <i class="score"><?php echo $ListDetailV->ListInfo->Rating; ?></i>
                                                    </div>
                                                    </div>
                                                    <div class="status-type text-white"> 
                                                        <span class="text-h6">
                                                        <span class="text-h6"><?php echo $ListDetailV->ListInfo->Genre; ?></span>
                                                        </span>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </a>  
                            
                        </div>
                        <?php } ?>
                    
                    <div class="col-12 mb40 text-center">
                        <nav aria-label="Page navigation example">
                            
                            <div class="pagina">
                                <?php if($FirstPaginationAnime >= $LimitRowPegination){?>
                                    <?php if($this->agent->is_mobile()){?>
                                        <a href="<?php echo site_url('anime/genre/search/'.$KeywordGenre.'/pages/'.($PageNowSearchAnime-1)); ?>">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    <?php }else{ ?>    
                                        <a href="<?php echo site_url('anime/genre/search/'.$KeywordGenre.'/pages/1'); ?>">
                                            <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>
                                        </a>
                                        <a href="<?php echo site_url('anime/genre/search/'.$KeywordGenre.'/pages/'.($PageNowSearchAnime-1)); ?>">
                                            <i class="fas fa-chevron-left"></i> Prev
                                        </a>
                                    <?php }?>
                                <?php }?>
                                <?php for($i = $FirstPaginationAnime; $i <= $TotalSearchPageAnime ; $i++){?>
                                <?php if($pagAnime <= $LimitRowPegination && $TotalSearchPageAnime !=1 ) { ?>
                                    
                                        <?php if($PageNowSearchAnime == $i){  ?>    
                                            <a class ="pagina-active" href="<?php echo site_url('anime/genre/search/'.$KeywordGenre.'/pages/'.$i); ?>"> <?php echo $i ?>
                                            </a>
                                        <?php }else{ ?>    
                                            <a class ="" href="<?php echo site_url('anime/genre/search/'.$KeywordGenre.'/pages/'.$i); ?>"> <?php echo $i ?>
                                            </a>
                                        <?php }$pagAnime++ ?>    
                                    <?php } ?>
                                <?php } ?>
                                <?php if($PageNowSearchAnime < $TotalSearchPageAnime ){?>
                                    <?php if($this->agent->is_mobile()){?>
                                        <a href="<?php echo site_url('anime/genre/search/'.$KeywordGenre.'/pages/'.($PageNowSearchAnime+1)); ?>">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    <?php }else{ ?>    
                                        <a href="<?php echo site_url('anime/genre/search/'.$KeywordGenre.'/pages/'.($PageNowSearchAnime+1)); ?>">Next 
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                        <a href="<?php echo site_url('anime/genre/search/'.$KeywordGenre.'/pages/'.($TotalSearchPageAnime)); ?>">
                                            <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i>
                                        </a>
                                    <?php }?>
                                <?php }?>
                                
                            </div>
                        </nav>
                    </div>
                </div>
                <?php }else{?>
                    <div class="row mb40 pd-top-10">
                        <div class="col-12 col-md-12 not-found">
                            <h1 class="text-white font-bold"> 
                            </i>Genre Anime Not Found</h1>
                            <img src="<?php echo base_url()."assets/template_2/assets/img/404.png"; ?>"class="center-404" width="80%" alt="404 NotFound" alt="">
                        </div>
                    </div>
                <?php } ?>
            </section>
        
         </div>
    </div>