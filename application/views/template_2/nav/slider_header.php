<?php
// ============================== API Anime ===========================
   $SliderAnime = [];
   if($API_SliderAnime->API_TheMovieRs->Status == "Not Complete"){ 
   }else{
      $SliderAnime = $API_SliderAnime->API_TheMovieRs->Body->SliderAnime;
   }
// ==============================End API Anime ===========================

// ============================== API MANGA ===========================
   $SliderManga = [];
   if($API_SliderManga->API_MangaRs->Status == "Not Complete"){ 
   }else{
      $SliderManga = $API_SliderManga->API_MangaRs->Body->SliderManga;
   }
// ==============================End API MANGA ===========================
?>
<?php if(count($SliderAnime) > 0 || count($SliderManga)){?>
<!-- body Slide header-->
   <div class="container-slide">
        <div class="banner">
           <div class="banner-images">
              <div id="slide" class="slide" style="height: 432px;">
               <?php foreach($SliderAnime as $key => $SliderValueAs) {?>
                  <?php $slug = $SliderValueAs->SlugDetail; 
                     $ImageAsset = $SliderValueAs->ImageAsset; 
                  ?>
                  <a href="<?php echo site_url('anime-detail/des/'.$slug); ?>">
                     <div class="img" data-slide-imgid="0"><img src="<?php echo base_url()."assets/template_2/assets/img/header_anime/".$ImageAsset; ?>" alt="<?php echo $SliderValueAs->Title; ?>"></div>
                  </a>
               <?php }?>
               <?php foreach($SliderManga as $key => $SliderValueAs) {?>
                  <?php $slug = $SliderValueAs->SlugDetail; 
                     $ImageAsset = $SliderValueAs->ImageAsset; 
                  ?>
                  <a href="<?php echo site_url('manga-detail/des/'.$slug); ?>">
                     <div class="img" data-slide-imgid="0"><img src="<?php echo base_url()."assets/template_2/assets/img/header_anime/".$ImageAsset; ?>" alt="<?php echo $SliderValueAs->Title; ?>"></div>
                  </a>
               <?php }?>
                 
                 <div class="slide-bt" style="margin-left: -71px;">
                 </div>
              </div>
              <div class="change-banner-left">
                 <!-- <span class="iconfont arrow"></span> -->
              </div>
              <div class="change-banner-right">
                 <!-- <span class="iconfont arrow"></span> -->
              </div>
           </div>
        </div>
   </div>


<?php }?>