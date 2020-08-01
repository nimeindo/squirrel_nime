<?php
    
    $pag = 0;
    $TotalSearchPage = 0;
    $PageNowSearch = 1;
    $FirstPagination = 5;
    if($API_LastUpdateManga->API_MangaRs->Status == "Not Complete"){ 
    }else{
        $TotalSearchPage = $API_LastUpdateManga->API_MangaRs->Body->TotalSearchPage;
        $PageNowSearch = $API_LastUpdateManga->API_MangaRs->Body->PageSearch;
        $FirstPagination = $API_LastUpdateManga->API_MangaRs->Body->FirstPagination;
    }
?>
<!-- Card Body Anime Terbaru -->
<script type="0f54aedd23b3507947356e49-text/javascript">$(document).ready(function(){
        $(".navbar-toggler").click(function(){
            $(".mobile-menu").toggleClass("show-mobile-menu");
            $(".mainbody").toggleClass("no-scroll");
        });
        $(window).scroll(function(){if($(this).scrollTop()>100){$(".scrollToTop").fadeIn()}else{$(".scrollToTop").fadeOut()}});
        });
     </script> 
    <div class="content-body">
        <div class="fixed-spacing pd-btm-search">
            <section class="container container-1080 mt40 mb80 animelist">
               <div class="row mb40">
                  <div class="col-12 col-md-7">
                     <h1 class="text-white font-bold"> <i class="far fa-eye text-lightmode-primary mr-3"></i>Chapter Manga Terbaru</h1>
                  </div>
               </div>
               
               <div class="row mt40">
               <?php if($API_LastUpdateManga->API_MangaRs->Status == "Not Complete"){ ?>
                <?php }else{?>
                <?php foreach($API_LastUpdateManga->API_MangaRs->Body->LastUpdateManga as $API_LastUpdateMangaV){ ?>
                <?php $slug = $API_LastUpdateMangaV->SlugChp; 
                    $Star = $API_LastUpdateMangaV->Star; 
                    $Stars = '';
                    for($i = 0 ; $i < $Star ;$i++){
                        $Stars .= '★';
                    }      
                ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-per5 mb40">
                            <a href="<?php echo site_url('manga-read/'.$slug); ?>">
                                    <div class="episode-card">
                                        <div class="episode-ratio background-cover" style="" >
                                        <img  src="<?php echo $API_LastUpdateMangaV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_LastUpdateMangaV->Title; ?>">
                                            <div class="episode-detail px-3 pt-5">
                                                <div class="">
                                                    <h5 class="text-white"><?php echo $API_LastUpdateMangaV->Title; ?></h5>
                                                    <div class="ratingarea">
                                                    <span class="series-rating" style="background-size: 0% 100%"><?php echo $Stars; ?></span>
                                                    <i class="score"><?php echo "Chp ".$API_LastUpdateMangaV->Chapter; ?></i>
                                                </div>
                                                </div>
                                                <div class="status-type text-white"> 
                                                    <span class="text-h6">
                                                    <span class="text-h6"><?php echo $API_LastUpdateMangaV->Genre; ?></span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </a>  
                        
                    </div>
                    <?php } ?>
                <?php }?>
                  <div class="col-12 mb40 text-center">
                     <nav aria-label="Page navigation example">
                        
                        <div class="pagina">
                            <?php if($FirstPagination >= $LimitRowPegination){?>
                                <?php if($this->agent->is_mobile()){?>
                                    <a  href="<?php echo site_url('manga-update/pages/'.($PageNowSearch-1)); ?>">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                <?php }else{ ?>    
                                    <a  href="<?php echo site_url('manga-update/pages/1'); ?>">
                                        <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>
                                    </a>
                                    <a  href="<?php echo site_url('manga-update/pages/'.($PageNowSearch-1)); ?>">
                                        <i class="fas fa-chevron-left"></i> Prev
                                    </a>
                                <?php }?>
                            <?php }?>
                            <?php for($i = $FirstPagination; $i <= $TotalSearchPage ; $i++){?>
                            <?php if($pag <= $LimitRowPegination) { ?>
                                
                                    <?php if($PageNowSearch == $i){  ?>    
                                        <a class ="pagina-active" href="<?php echo site_url('manga-update/pages/'.$i); ?>"> <?php echo $i ?>
                                        </a>
                                    <?php }else{ ?>    
                                        <a class ="" href="<?php echo site_url('manga-update/pages/'.$i); ?>"> <?php echo $i ?>
                                        </a>
                                    <?php }$pag++ ?>    
                                <?php } ?>
                            <?php } ?>
                            <?php if($PageNowSearch < $TotalSearchPage ){?>
                                <?php if($this->agent->is_mobile()){?>
                                    <a href="<?php echo site_url('manga-update/pages/'.($PageNowSearch+1)); ?>"> 
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                <?php }else{ ?>    
                                    <a href="<?php echo site_url('manga-update/pages/'.($PageNowSearch+1)); ?>">Next 
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                    <a href="<?php echo site_url('manga-update/pages/'.($TotalSearchPage)); ?>">
                                        <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i>
                                    </a>
                                <?php }?>
                            <?php }?>
                            
                        </div>
                     </nav>
                  </div>
               </div>
            </section>
         </div>
    </div>