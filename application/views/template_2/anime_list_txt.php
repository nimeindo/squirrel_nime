<?php
$ListAnime = [];
$pag = 0;
$TotalSearchPage = 0;
$PageNowSearch = 1;
$FirstPagination = 5;
if($API_ListAllAnime->API_TheMovieRs->Status == "Not Complete"){ 
}else{
   $ListAnime = $API_ListAllAnime->API_TheMovieRs->Body->ListAnime;
   $TotalSearchPage = $API_ListAllAnime->API_TheMovieRs->Body->TotalSearchPage;
   $PageNowSearch = $API_ListAllAnime->API_TheMovieRs->Body->PageSearch;
   $FirstPagination = $API_ListAllAnime->API_TheMovieRs->Body->FirstPagination;
}

?>

<!-- Card Body Anime Terbaru -->
<div class="content-body">
        <div class="fixed-spacing pd-btm-list">
            <section class="container container-1080 mt40 mb80 animelist">
                <div class="row mb40">
                    <div class="col-12 col-md-7">
                    <h1 class="text-white font-bold">
                        <i class="far fa-eye text-lightmode-primary mr-3"></i>List Anime
                    </h1>
                    </div>
                    <div class="col mt-3 mt-md-0">
                    <!-- <div class="mode_anime text-left text-md-right text-white">
                        <a href="https://animeindo.fun/anime-list/">
                        Text Mode <i class="fas fa-toggle-off text-primary mx-2"></i> Image Mode
                        </a>
                    </div> -->
                    </div>
                </div>
                <div class="navlist">
                    <div class="l">
                    <div class="letterlist">
                       <a href="<?php echo base_url().'anime-list/0'?>">ALL</a>
                       <a href="<?php echo base_url().'anime-list/1'?>">#</a>
                       <?php foreach (range('A', 'Z') as $char) { ?>
                       <a href="<?php echo base_url().'anime-list/'.$char ?>"><?php echo $char; ?></a>
                        <?php } ?>
                     </div>
                    </div>
                </div>
                <div class="row the-animelist-text">
                    <div class="sad the-sadasd-text"></div>
                    <?php foreach($ListAnime as $ListAnimeV){?>
                    <div class="col-12 col-sm-6 mb40">
                    <div class="text-h2 alphabet mb20 text-primary font-bold">
                       <a name="."><?php echo $ListAnimeV->NameIndex; ?></a>
                     </div>
                     <?php foreach($ListAnimeV->ListSubIndex as $ListSubIndexV) {?>
                        <?php 
                           $colorList = 'Special';
                           $SlugDetail = $ListSubIndexV->SlugDetail;
                           $Status = $ListSubIndexV->Status;
                           $Title = $ListSubIndexV->Title;
                           if($Status == 'Ended'){
                              $colorList = 'Special';
                           }elseif($Status == 'Ongoing'){
                              $colorList = 'OVA';
                           }elseif($Status == 'Ongoing'){
                              $colorList = 'Movie';
                           }
                        ?>
                        <a class="list-anime ONA show" href="<?php echo base_url().'anime-detail/des/'.$SlugDetail?>">
                              <div class="d-flex justify-content-start align-items-center the-anime mb10">
                                 <div class="<?php echo $colorList.' type text-h5 text-uppercase';?>" >
                                 <?php echo substr($Status,0,3) ?> 
                                 </div>
                                 <div class="title text-h4">
                                 <?php echo $Title?> 
                                 </div>
                              </div>
                        </a>
                     <?php }?>
                     
                     </div>
                     <?php }?>
               </div>
                    
            </section>
            <div class="col-12 mb40 text-center">
               <nav aria-label="Page navigation example">
                  <div class="pagina">
                        
                     <?php if($FirstPagination >= $LimitRowPegination){?>
                        <?php if($this->agent->is_mobile()){?>
                           <a  href="<?php echo site_url('anime-list/'.$NameIndexVal.'/pages/'.($PageNowSearch-1)); ?>">
                              <i class="fas fa-chevron-left"></i>
                           </a>
                        <?php }else{ ?>    
                           <a  href="<?php echo site_url('anime-list/'.$NameIndexVal.'/pages/1'); ?>">
                              <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>
                           </a>
                           <a  href="<?php echo site_url('anime-list/'.$NameIndexVal.'/pages/'.($PageNowSearch-1)); ?>">
                              <i class="fas fa-chevron-left"></i> Prev
                           </a>
                        <?php }?>
                     <?php }?>
                     <?php for($i = $FirstPagination; $i <= $TotalSearchPage ; $i++){?>
                     <?php if($pag <= $LimitRowPegination && $TotalSearchPage !=1 ) { ?>
                     <?php if($PageNowSearch == $i){  ?>    
                        <a class ="pagina-active" href="<?php echo site_url('anime-list/'.$NameIndexVal.'/pages/'.$i); ?>"> <?php echo $i ?>
                        </a>
                        <?php }else{ ?>    
                        <a class ="" href="<?php echo site_url('anime-list/'.$NameIndexVal.'/pages/'.$i); ?>"> <?php echo $i ?>
                        </a>
                     <?php }$pag++ ?>    
                     <?php } ?>
                     <?php } ?>
                     <?php if($PageNowSearch < $TotalSearchPage ){?>
                        <?php if($this->agent->is_mobile()){?>
                           <a href="<?php echo site_url('anime-list/'.$NameIndexVal.'/pages/'.($PageNowSearch+1)); ?>"> 
                              <i class="fas fa-chevron-right"></i>
                           </a>
                        <?php }else{ ?> 
                           <a href="<?php echo site_url('anime-list/'.$NameIndexVal.'/pages/'.($PageNowSearch+1)); ?>">Next 
                              <i class="fas fa-chevron-right"></i>
                           </a>
                           <a href="<?php echo site_url('anime-list/'.$NameIndexVal.'/pages/'.($TotalSearchPage)); ?>">
                              <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i>
                           </a>
                        <?php }?>
                     <?php }?>
                  </div>
               </nav>
            </div>
        </div>
   
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>