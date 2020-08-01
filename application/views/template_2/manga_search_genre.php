<?php
    // =======================API SEARCH ANIME =======================
        $pageManga = 0;
        $TotalSearchPageManga = 0;
        $PageNowSearchManga = 1;
        $FirstPaginationManga = 5;
        $SearchGenreManga = [];
        if($API_SearchGenreManga->API_MangaRs->Status == "Not Complete"){ 
        }else{
            $TotalSearchPageManga = $API_SearchGenreManga->API_MangaRs->Body->TotalSearchPage;
            $PageNowSearchManga = $API_SearchGenreManga->API_MangaRs->Body->PageSearch;
            $FirstPaginationManga = $API_SearchGenreManga->API_MangaRs->Body->FirstPagination;
            $SearchGenreManga = $API_SearchGenreManga->API_MangaRs->Body->SearchGenreManga;
        }
    // =======================End API SEARCH ANIME =======================
?>
<!-- Card Body Anime Terbaru -->
    <div class="content-body">
        <div class="fixed-spacing pd-btm-search">
        
            <section class="container container-1080 mt40 mb80 animelist">
            <?php if(count($SearchGenreManga)){ ?>
               <div class="row mb40">
                  <div class="col-12 col-md-7">
                     <h1 class="text-white font-bold"> <i class="far fa-eye text-lightmode-primary mr-3"></i>Search Manga <?php echo str_replace('-', ' ', $KeywordGenre) ?></h1>
                  </div>
               </div>
               
                <div class="row mt40">
                    <?php foreach($SearchGenreManga as $SearchGenreMangaV){ ?>
                    <?php $slug = $SearchGenreMangaV->SlugDetail; ?>
                    <?php $ListDetail = $SearchGenreMangaV->ListDetail; ?>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-per5 mb40">
                                <a href="<?php echo site_url('manga-detail/des/'.$slug); ?>">
                                        <div class="episode-card">
                                            <div class="episode-ratio background-cover" style="" >
                                            <img  src="<?php echo $SearchGenreMangaV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $SearchGenreMangaV->Title; ?>">
                                                <div class="episode-detail px-3 pt-5">
                                                <?php foreach($ListDetail as $ListDetailV){ ?>
                                                    <div class="">
                                                        <h5 class="text-white"><?php echo $SearchGenreMangaV->Title; ?></h5>
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
                                <?php if($FirstPaginationManga >= $LimitRowPegination){?>
                                    <?php if($this->agent->is_mobile()){?>
                                        <a href="<?php echo site_url('manga/genre/search/'.$KeywordGenre.'/pages/'.($PageNowSearchManga-1)); ?>">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    <?php }else{ ?>    
                                        <a href="<?php echo site_url('manga/genre/search/'.$KeywordGenre.'/pages/1'); ?>">
                                            <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>
                                        </a>
                                        <a href="<?php echo site_url('manga/genre/search/'.$KeywordGenre.'/pages/'.($PageNowSearchManga-1)); ?>">
                                            <i class="fas fa-chevron-left"></i> Prev
                                        </a>
                                    <?php }?>
                                    
                                <?php }?>
                                <?php for($i = $FirstPaginationManga; $i <= $TotalSearchPageManga ; $i++){?>
                                <?php if($pageManga <= $LimitRowPegination && $TotalSearchPageManga !=1) { ?>
                                    
                                        <?php if($PageNowSearchManga == $i){  ?>    
                                            <a class ="pagina-active" href="<?php echo site_url('manga/genre/search/'.$KeywordGenre.'/pages/'.$i); ?>"> <?php echo $i ?>
                                            </a>
                                        <?php }else{ ?>    
                                            <a class ="" href="<?php echo site_url('manga/genre/search/'.$KeywordGenre.'/pages/'.$i); ?>"> <?php echo $i ?>
                                            </a>
                                        <?php }$pageManga++ ?>    
                                    <?php } ?>
                                <?php } ?>
                                <?php if($PageNowSearchManga < $TotalSearchPageManga ){?>
                                    <?php if($this->agent->is_mobile()){?>
                                        <a href="<?php echo site_url('manga/genre/search/'.$KeywordGenre.'/pages/'.($PageNowSearchManga+1)); ?>"> 
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    <?php }else{ ?> 
                                        <a href="<?php echo site_url('manga/genre/search/'.$KeywordGenre.'/pages/'.($PageNowSearchManga+1)); ?>">Next 
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                        <a href="<?php echo site_url('manga/genre/search/'.$KeywordGenre.'/pages/'.($TotalSearchPageManga)); ?>">
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
                            </i>Genre Manga Not Found</h1>
                            <img src="<?php echo base_url()."assets/template_2/assets/img/404.png"; ?>"class="center-404" width="80%" alt="404 NotFound" alt="">
                        </div>
                    </div>
                <?php } ?>
            </section>
        
         </div>
    </div>