<?php
    // =======================API SEARCH MANG =======================
        $pagManga = 0;
        $TotalSearchPageManga = 0;
        $PageNowSearchManga = 1;
        $FirstPaginationManga = 5;
        $SearchManga = [];
        $NotfoundManga = 0;
        if($API_SearchManga->API_MangaRs->Status == "Not Complete"){ 
            $NotfoundManga = 1;
        }else{
            $TotalSearchPageManga = $API_SearchManga->API_MangaRs->Body->TotalSearchPage;
            $PageNowSearchManga = $API_SearchManga->API_MangaRs->Body->PageSearch;
            $FirstPaginationManga = $API_SearchManga->API_MangaRs->Body->FirstPagination;
            $SearchManga = $API_SearchManga->API_MangaRs->Body->SearchManga;;
        }
    // =======================End API SEARCH Manga =======================

    // =======================API SEARCH ANIME =======================
        $pagAnime = 0;
        $TotalSearchPageAnime = 0;
        $PageNowSearchAnime = 1;
        $FirstPaginationAnime = 5;
        $SearchAnime = [];
        $NotfoundAnime = 0;
        if($API_SearchAnime->API_TheMovieRs->Status == "Not Complete"){ 
            $NotfoundAnime = 1;
        }else{
            $TotalSearchPageAnime = $API_SearchAnime->API_TheMovieRs->Body->TotalSearchPage;
            $PageNowSearchAnime = $API_SearchAnime->API_TheMovieRs->Body->PageSearch;
            $FirstPaginationAnime = $API_SearchAnime->API_TheMovieRs->Body->FirstPagination;
            $SearchAnime = $API_SearchAnime->API_TheMovieRs->Body->SearchAnime;
        }
    // =======================End API SEARCH ANIME =======================
?>
<!-- Card Body Anime Terbaru -->
    <div class="content-body">
        <div class="fixed-spacing pd-btm-search">
        <?php if($NotfoundManga ==0 && $NotfoundAnime ==0 || $NotfoundManga ==0 || $NotfoundAnime ==0){ ?>
            <section class="container container-1080 mt40 mb80 animelist">
            <?php if(count($SearchManga)){ ?>
               <div class="row mb40">
                  <div class="col-12 col-md-7">
                     <h1 class="text-white font-bold"> <i class="far fa-eye text-lightmode-primary mr-3"></i>Search Manga <?php echo $KeywordSearch ?></h1>
                  </div>
               </div>
               
               <div class="row mt40">
                <?php foreach($SearchManga as $SearchMangaV){ ?>
                <?php $SlugDetail = $SearchMangaV->SlugDetail; ?>
                <?php $ListDetail = $SearchMangaV->ListDetail; ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-per5 mb40">
                            <a href="<?php echo base_url().'manga-detail/des/'.$SlugDetail?>">
                                    <div class="episode-card">
                                        <div class="episode-ratio background-cover" style="" >
                                        <img  src="<?php echo $SearchMangaV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $SearchMangaV->Title; ?>">
                                            <div class="episode-detail px-3 pt-5">
                                            <?php foreach($ListDetail as $ListDetailV){ ?>
                                                <?php 
                                                    $Star = $ListDetailV->ListInfo->Star; 
                                                    $Stars = '';
                                                    for($i = 0 ; $i < $Star ;$i++){
                                                        $Stars .= '★';
                                                    } 
                                                ?>
                                                <div class="">
                                                    <h5 class="text-white"><?php echo $SearchMangaV->Title; ?></h5>
                                                    <div class="ratingarea">
                                                    <span class="series-rating" style="background-size: 0% 100%"><?php echo $Stars; ?></span>
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
                                        <a  href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.($PageNowSearchManga-1).'-anime-'.$PageNowSearchAnime); ?>">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    <?php }else{ ?>    
                                        <a  href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-1-anime-'.$PageNowSearchAnime); ?>">
                                            <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>
                                        </a>
                                        <a  href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.($PageNowSearchManga-1).'-anime-'.$PageNowSearchAnime); ?>">
                                            <i class="fas fa-chevron-left"></i> Prev
                                        </a>
                                    <?php }?>
                                <?php }?>
                                <?php for($i = $FirstPaginationManga; $i <= $TotalSearchPageManga ; $i++){?>
                                <?php if($pagManga <= $LimitRowPegination) { ?>
                                    
                                        <?php if($PageNowSearchManga == $i){  ?>    
                                            <a class ="pagina-active" href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.($i).'-anime-'.$PageNowSearchAnime); ?>"> <?php echo $i ?>
                                            </a>
                                        <?php }else{ ?>    
                                            <a class ="" href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.($i).'-anime-'.$PageNowSearchAnime); ?>"> <?php echo $i ?>
                                            </a>
                                        <?php }$pagManga++ ?>    
                                    <?php } ?>
                                <?php } ?>
                                <?php if($PageNowSearchManga < $TotalSearchPageManga ){?>
                                    <?php if($this->agent->is_mobile()){?>
                                        <a href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.($PageNowSearchManga+1).'-anime-'.$PageNowSearchAnime); ?>">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    <?php }else{ ?>    
                                        <a href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.($PageNowSearchManga+1).'-anime-'.$PageNowSearchAnime); ?>">Next 
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                        <a href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.($TotalSearchPageManga).'-anime-'.$PageNowSearchAnime); ?>">
                                            <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i>
                                        </a>
                                    <?php }?>
                                <?php }?>
                            </div>
                        </nav>
                    </div>
               </div>
               <?php }else{?>
                    <div class="row mb40">
                    <div class="col-12 col-md-7">
                        <h1 class="text-white font-bold"> <i class="far fa-eye text-lightmode-primary mr-3"></i>Search Manga Not Found</h1>
                    </div>
                </div>
                <?php } ?>
            </section>
        
        
            <section class="container container-1080 mt40 mb80 animelist">
            <?php if(count($SearchAnime)){ ?>
               <div class="row mb40">
                  <div class="col-12 col-md-7">
                     <h1 class="text-white font-bold"> <i class="far fa-eye text-lightmode-primary mr-3"></i>Search Anime <?php echo $KeywordSearch ?></h1>
                  </div>
               </div>
               
                <div class="row mt40">
                    <?php foreach($SearchAnime as $SearchAnimeV){ ?>
                    <?php $SlugDetail = $SearchAnimeV->SlugDetail; ?>
                    <?php $ListDetail = $SearchAnimeV->ListDetail; ?>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-per5 mb40">
                                <a href="<?php echo site_url('anime-detail/des/'.$SlugDetail); ?>">
                                        <div class="episode-card">
                                            <div class="episode-ratio background-cover" style="" >
                                            <img  src="<?php echo $SearchAnimeV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $SearchAnimeV->Title; ?>">
                                                <div class="episode-detail px-3 pt-5">
                                                <?php foreach($ListDetail as $ListDetailV){ ?>
                                                <?php 
                                                    $Star = $ListDetailV->ListInfo->Star; 
                                                    $Stars = '';
                                                    for($i = 0 ; $i < $Star ;$i++){
                                                        $Stars .= '★';
                                                    } 
                                                ?>
                                                    <div class="">
                                                        <h5 class="text-white"><?php echo $SearchAnimeV->Title; ?></h5>
                                                        <div class="ratingarea">
                                                        <span class="series-rating" style="background-size: 0% 100%"><?php echo $Stars; ?></span>
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
                                        <a  href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.$PageNowSearchManga.'-anime-'.($PageNowSearchAnime-1)); ?>">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    <?php }else{ ?>    
                                        <a  href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.$PageNowSearchManga.'-anime-1'); ?>">
                                            <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>
                                        </a>
                                        <a  href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.$PageNowSearchManga.'-anime-'.($PageNowSearchAnime-1)); ?>">
                                            <i class="fas fa-chevron-left"></i> Prev
                                        </a>
                                    <?php }?>
                                <?php }?>
                                <?php for($i = $FirstPaginationAnime; $i <= $TotalSearchPageAnime ; $i++){?>
                                <?php if($pagAnime <= $LimitRowPegination) { ?>
                                    
                                        <?php if($PageNowSearchAnime == $i){  ?>    
                                            <a class ="pagina-active" href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.$PageNowSearchManga.'-anime-'.$i); ?>"> <?php echo $i ?>
                                            </a>
                                        <?php }else{ ?>    
                                            <a class ="" href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.$PageNowSearchManga.'-anime-'.$i); ?>"> <?php echo $i ?>
                                            </a>
                                        <?php }$pagAnime++ ?>    
                                    <?php } ?>
                                <?php } ?>
                                <?php if($PageNowSearchAnime < $TotalSearchPageAnime ){?>
                                    <?php if($this->agent->is_mobile()){?>
                                        <a href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.$PageNowSearchManga.'-anime-'.($PageNowSearchAnime+1)); ?>">
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    <?php }else{ ?>    
                                        <a href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.$PageNowSearchManga.'-anime-'.($PageNowSearchAnime+1)); ?>">Next 
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                        <a href="<?php echo site_url('search/pages/'.$KeywordSearch.'-manga-'.$PageNowSearchManga.'-anime-'.($TotalSearchPageAnime)); ?>">
                                            <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i>
                                        </a>
                                    <?php }?>
                                <?php }?>
                                
                            </div>
                        </nav>
                    </div>
                </div>
                <?php }else{?>
                    <div class="row mb40">
                    <div class="col-12 col-md-7">
                        <h1 class="text-white font-bold"> <i class="far fa-eye text-lightmode-primary mr-3"></i>Search Anime Not Found</h1>
                    </div>
                </div>
                <?php } ?>
            </section>
        <?php }else{?>
            <div class="row mb40 pd-top-10">
                    <div class="col-12 col-md-12 not-found">
                    <h1 class="text-white font-bold"> 
                    </i>Search NimeIndo Not Found</h1>
                    <img src="<?php echo base_url()."assets/template_2/assets/img/404.png"; ?>"class="center-404" width="80%" alt="404 NotFound" alt="">
                </div>
            </div>
        <?php }?>
         </div>
    </div>