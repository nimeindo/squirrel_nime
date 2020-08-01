<?php
$ListManga = [];
$pag = 0;
$TotalSearchPage = 0;
$PageNowSearch = 1;
$FirstPagination = 5;
$nameIndex = '';
if(empty($NameIndexVal)){
    $nameIndex = 'ALL';
}elseif($NameIndexVal == 1){
    $nameIndex = '#';
}else{
    $nameIndex = $NameIndexVal;
}
if($API_ListManga->API_MangaRs->Status == "Not Complete"){ 
}else{
   $ListManga = $API_ListManga->API_MangaRs->Body->ListManga;
   $TotalSearchPage = $API_ListManga->API_MangaRs->Body->TotalSearchPage;
   $PageNowSearch = $API_ListManga->API_MangaRs->Body->PageSearch;
   $FirstPagination = $API_ListManga->API_MangaRs->Body->FirstPagination;
}
?>
<script type="0f54aedd23b3507947356e49-text/javascript">$(document).ready(function(){
        $(".navbar-toggler").click(function(){
            $(".mobile-menu").toggleClass("show-mobile-menu");
            $(".mainbody").toggleClass("no-scroll");
        });
        $(window).scroll(function(){if($(this).scrollTop()>100){$(".scrollToTop").fadeIn()}else{$(".scrollToTop").fadeOut()}});
        });
     </script> 
    <div class="content-body">
        <div class="fixed-spacing pd-btm-list">
            <section class="container container-1080 mt40 mb80 animelist">
               <div class="row mb40">
                  <div class="col-12 col-md-7">
                     <h1 class="text-white font-bold"> <i class="far fa-eye text-lightmode-primary mr-3"></i>Manga List Image <?php echo $nameIndex ?></h1>
                  </div>
                  <div class="col mt-3 mt-md-0">
                     <div class="mode_anime text-left text-md-right text-white"> 
                         <a href="<?php echo base_url().'manga-list/txt'?>"> Text Mode 
                             <i class="fas fa-toggle-on text-primary mx-2"></i> Image Mode 
                        </a>
                    </div>
                  </div>
               </div>
               <form class="filteranilist mb40" action="<?php echo base_url().'manga-list/img'?>" method="POST">
                  <div class="row thefilter">
                      <!-- tombol togel genre -->
                     <!-- <div class="d-none d-lg-block col-lg"> 
                         <a class="btn btn-block filterss text-white" data-toggle="collapse" href="#collapseGenre" role="button" aria-expanded="false" aria-controls="collapseGenre"> Toggle Genre <i class="fa fa-sort ml-2"></i> 
                        </a>
                     </div> -->
                     <div class="col-6 col-sm-4 col-md-4 col-lg mr-2 mr-sm-0">
                        <div class="row">
                           <div class="col-4 pr-0"> <label for="order">Sort by:</label></div>
                           <div class="col pl-0">
                              <select id="order" name="nameIndex">
                              <?php if(empty($NameIndexVal)){?>
                                <option selected="selected" value="0">ALL</option>
                              <?php }else{?>
                                <option  value="0">ALL</option>
                              <?php } ?>
                              <?php if($NameIndexVal == 1){ ?>
                                <option selected='selected' value="1">#</option>
                              <?php }else{ ?>
                                <option  value="1">#</option>
                                <?php } ?>
                                <?php foreach (range('A', 'Z') as $char) { ?>
                                    <?php if($nameIndex == $char){ ?>
                                        <option selected='selected' value="<?php echo $char; ?>"><?php echo $char; ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $char; ?>"><?php echo $char; ?></option>
                                    <?php } ?>
                                 <?php } ?>
                                 <!-- <option value="titlereverse">Z-A</option> -->
                                 <!-- <option value="update">Latest Update</option>
                                 <option value="latest">Latest Added</option>
                                 <option value="popular">Popular</option> -->
                              </select>
                           </div>
                        </div>
                     </div>
                     <!-- <div class="col-6 col-sm-4 col-md-4 col-lg">
                        <div class="row">
                           <div class="col-4 pr-0"> <label for="status">Status:</label></div>
                           <div class="col pl-0">
                              <select id="status" name="status">
                                 <option selected="selected" value="">All</option>
                                 <option value="Currently Airing">Currently Airing</option>
                                 <option value="Finished Airing">Finished Airing</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-6 col-sm-4 col-md-4 col-lg">
                        <div class="row">
                           <div class="col-4 pr-0"> <label for="type">Type:</label></div>
                           <div class="col pl-0">
                              <select id="type" name="type">
                                 <option selected="selected" value="">All</option>
                                 <option value="TV">TV</option>
                                 <option value="Movie">Movie</option>
                                 <option value="OVA">OVA</option>
                                 <option value="Special">Special</option>
                                 <option value="ONA">ONA</option>
                              </select>
                           </div>
                        </div>
                     </div> -->
                     <div class="col-6 col-sm-4 col-md-4 col-lg">
                        <div class="row">
                           <div class="col-4 pr-0"> <label for="type">Row:</label></div>
                           <div class="col pl-0">
                              <select id="type" name="limitRange">
                              <?php foreach($DataLimitRange as $DataLimitRangeV){?>
                                <?php if($DataLimitRangeV == $limitRange){ ?>
                                    <option selected="selected" value="<?php echo $DataLimitRangeV ?>"><?php echo $DataLimitRangeV ?></option>
                                 <?php }else{?>
                                    <option value="<?php echo $DataLimitRangeV ?>"><?php echo $DataLimitRangeV ?></option>
                                    <?php }?>
                                <?php }?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <!-- tombol toggle genre mobile -->
                     <!-- <div class="col-6 col-sm-6 d-lg-none"> 
                         <a class="btn btn-block filterss text-white" data-toggle="collapse" href="#collapseGenre" role="button" aria-expanded="false" aria-controls="collapseGenre"> Toggle Genre <i class="fa fa-sort ml-2"></i> 
                        </a>
                     </div> -->
                     <div class="col-6 col-sm-4 col-lg"> 
                         <button type="submit" class="btn btn-block btn-primary">Filter</button>
                    </div>
                  </div>
                  <!-- anakan yang berisi genre untuk tombol togel genre -->
                  <!-- <div class="collapse" id="collapseGenre">
                     <table width="100%">
                        <tbody>
                            <tr class="filter_tax">
                                <td class="filter_act"> 
                                    <label class="tax_fil">Action 
                                        <input type="checkbox" name="genre[]" value="action" /> 
                                        <span class="checkfil"></span> 
                                    </label>
                                    <label class="tax_fil">Action 
                                        <input type="checkbox" name="genre[]" value="action" /> 
                                        <span class="checkfil"></span> 
                                    </label>
                                </td>
                                
                            </tr>
                        </tbody>
                     </table>
                  </div> -->
               </form>
               <div class="row mt40">
                  <?php foreach($ListManga as $ListMangaV){?>
                    <?php foreach($ListMangaV->ListSubIndex as $ListSubIndexV) {?>
                     <?php 
                        $SlugDetail = $ListSubIndexV->SlugDetail;
                        $Image = $ListSubIndexV->Image;
                        $Title = $ListSubIndexV->Title;
                     ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-per5 mb40">
                            <a href="<?php echo base_url().'manga-detail/des/'.$SlugDetail?>">
                                    <div class="episode-card">
                                        <div class="episode-ratio background-cover" style="" >
                                        <img  src="<?php echo $Image; ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $Title?>">
                                            <div class="episode-detail px-3 pt-5">
                                                <div class="">
                                                    <h5 class="text-white"><?php echo $Title?> </h5>
                                                    <div class="ratingarea">
                                                    <span class="series-rating" style="background-size: 0% 100%">★★★★★</span>
                                                    <i class="score">8.48</i>
                                                </div>
                                                </div>
                                                <div class="status-type text-white"> 
                                                    <span class="text-h6">
                                                    <span class="text-h6">Adventure, Drama</span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </a>  
                        
                    </div>
                    <?php }?>
                  <?php }?>
                  
            <div class="col-12 mb40 text-center">
               <nav aria-label="Page navigation example">
                  <div class="pagina">
                        
                     <?php if($FirstPagination >= $LimitRowPegination){?>
                        <?php if($this->agent->is_mobile()){?>
                           <a  href="<?php echo site_url('manga-list/img/'.$NameIndexVal.'/pages/'.($PageNowSearch-1).'-'.$limitRange); ?>">
                           <i class="fas fa-chevron-left"></i>
                        </a>
                        <?php }else{?>
                           <a  href="<?php echo site_url('manga-list/img/'.$NameIndexVal.'/pages/1'.'-'.$limitRange); ?>">
                              <i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i>
                           </a>
                           <a  href="<?php echo site_url('manga-list/img/'.$NameIndexVal.'/pages/'.($PageNowSearch-1).'-'.$limitRange); ?>">
                              <i class="fas fa-chevron-left"></i> Prev
                           </a>
                        <?php }?>
                     <?php }?>
                     <?php for($i = $FirstPagination; $i <= $TotalSearchPage ; $i++){?>
                     <?php if($pag <= $LimitRowPegination && $TotalSearchPage !=1 ) { ?>
                     <?php if($PageNowSearch == $i){  ?>    
                        <a class ="pagina-active" href="<?php echo site_url('manga-list/img/'.$NameIndexVal.'/pages/'.$i.'-'.$limitRange); ?>"> <?php echo $i ?>
                        </a>
                        <?php }else{ ?>    
                        <a class ="" href="<?php echo site_url('manga-list/img/'.$NameIndexVal.'/pages/'.$i.'-'.$limitRange); ?>"> <?php echo $i ?>
                        </a>
                     <?php }$pag++ ?>    
                     <?php } ?>
                     <?php } ?>
                     <?php if($PageNowSearch < $TotalSearchPage ){?>
                        <?php if($this->agent->is_mobile()){?>
                           <a href="<?php echo site_url('manga-list/img/'.$NameIndexVal.'/pages/'.($PageNowSearch+1).'-'.$limitRange); ?>">
                           <i class="fas fa-chevron-right"></i>
                        </a>
                        <?php }else{ ?>    
                           <a href="<?php echo site_url('manga-list/img/'.$NameIndexVal.'/pages/'.($PageNowSearch+1).'-'.$limitRange); ?>">Next 
                              <i class="fas fa-chevron-right"></i>
                           </a>
                           <a href="<?php echo site_url('manga-list/img/'.$NameIndexVal.'/pages/'.($TotalSearchPage).'-'.$limitRange); ?>">
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