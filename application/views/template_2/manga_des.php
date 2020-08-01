<?php 
$Synopsis = '';
$Title = '';
$Image = '';
$SlugDetail = '#';
$Author = '';
$Rating = '';
$newChapter = '#';
$RelatedData = [];
$slugNewChapter = '#';
$Genre = [];
$Notfound = 0;
if($API_DetailManga->API_MangaRs->Status == "Not Complete"){ 
   $Notfound = 1;  
}else{
   foreach($API_DetailManga->API_MangaRs->Body->SingleListManga as $key => $API_DetailMangaV){ 
      $Title = $API_DetailMangaV->Title;
      $Image = $API_DetailMangaV->Image;
      $SlugDetail = $API_DetailMangaV->SlugDetail;
      
      foreach($API_DetailMangaV->ListDetail as $ListV){
         $Rating = $ListV->ListInfo->Rating;
         $Synopsis = $ListV->Synopsis;
         $Genre = explode('|',$ListV->ListInfo->Genre);
         $Author = str_replace('|',' ',$ListV->ListInfo->Author);
      } 
      
      foreach($API_DetailMangaV->ListChapter as $key => $ListV){
         if($key == 0){
            $newChapter = $ListV->SlugChp;
            $slugNewChapter = $ListV->SlugChp;
         }
         
      }
      $RelatedData = $API_DetailMangaV->RelatedData;
   }
} 
?>

<!-- Card Body Anime Terbaru -->
<div class="content-body pd-btm-desc">
   <?php if($Notfound ==0){?>
         <div class="detail-top-wrap ">
               <div class="backg-image" style="
                      background-image: url(<?php echo $Image ?>);
                  "></div>
                <div class="detail-top">
                   <img src="<?php echo $Image ?>"  class="big-img" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt=<?php echo $Title ?> />
                  
                   <div class="detail-top-left">
                      <div class="top-comics-type">
                         Manga&nbsp;/ <?php echo $Title ?>
                      </div>
                      <h1 class="comics-title"><?php echo $Title ?></h1>
                      <div class="created-by"><?php echo $Author ?></div>
                      <div class="mb20">
                           <div class="genrexarea">
                              <ul class="mangagenre">
                                 <?php foreach($Genre as $genreV){?>
                                    <li><a href="<?php echo base_url('manga/genre/search/'.preg_replace('/[^A-Za-z0-9\-]/', '',$genreV)) ?>" rel="tag"><?php echo $genreV?> </a></li>
                                 <?php } ?>
                              </ul>
                           </div>
                        </div>
                   </div>
                   <div class="detail-top-right">
                      <img src="<?php echo $Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt=<?php echo $Title ?>>
                   </div>
                   <div class="top-button-wrap">
                   <a href="<?php echo site_url('manga-read/'.$slugNewChapter); ?>">
                        <span class="read-button">READ NEW CHAPTER</span>
                      </a>
                      <div class="star">
                         <span style="color: white;" class="iconfont">★ <?php echo $Rating ?></span>
                      </div>
                   </div>
                </div>
        </div>
        <!-- <a class="detail-download-bg" href="https://go.onelink.me/ZaZg?pid=official-web">
            
        </a> -->
        <!-- <div class="detail-pc-download-bg">
            
         </div> -->
         <div class="detail-menu-wrap">
            <a href="<?php echo base_url().'manga-detail/des/'.$SlugDetail?>">
               <div class="menu-item-des active"
                  id="detail">Description</div>
            </a>
            <a href="<?php echo base_url().'manga-detail/chap/'.$SlugDetail?>">
               <div class="menu-item-des"
                  id="episodes">Chapter</div>
            </a>
         </div>
         <div class="report-bg">
            <div class="report-wrapper">
               <div class="report-close">
                  <span class="iconfont report-bg-close">&#xe62a;</span>
               </div>
               <iframe frameborder="0" scrolling="yes" class="report-content"
                  src="https://h5.mangatoon.mobi/report/1752?_language=en&closeTopNav=1&_token="></iframe>
            </div>
         </div>
         <div class="selected-detail selected-tag">
            
            <div class="description">
                  <?php echo $Synopsis?>
            </div>
            <div class="description-tag">
               <?php foreach($Genre as $genreV){?>
                  <a href="<?php echo base_url('manga/genre/search/'.preg_replace('/[^A-Za-z0-9\-]/', '',$genreV)) ?>">
                     <div class="tag"><?php echo $genreV?></div>
                  </a>
               <?php } ?>
            </div>
            
            <div class="recommended-wrap">
               <div class="recommended-title">
                  Rekomendasi Manga Untuk Anda
               </div>
               <div class="recommend-comics">
                  <?php foreach($RelatedData as $RelatedDataV){ ?>
                     <?php $SlugDetail = $RelatedDataV->SlugDetail; 
                           $Star = $RelatedDataV->Star; 
                           $Stars = '';
                           for($i = 0 ; $i < $Star ;$i++){
                              $Stars .= '★';
                           }     
                     ?>
                     <div class="recommend-item">
                        <a href="<?php echo base_url().'manga-detail/des/'.$SlugDetail?>">
                           <div class="comics-image">
                              <img src="<?php echo $RelatedDataV->Image; ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt='<?php echo $RelatedDataV->Title ?>'/>
                           </div>
                        </a>
                        <div class="recommend-comics-title">
                        <?php echo $RelatedDataV->Title ?>
                        </div>
                        <div class="comics-type">
                           <div class="ratingarea">
                              <span class="series-rating" style="background-size: 0% 100%;color: #f6f92c;"><?php echo $Stars; ?></span>
                           </div>
                        </div>
                     </div>
                  <?php } ?>
               </div>
            </div>
         </div>
   <?php }else{?>
         <div class="row mb40 pd-top-10">
            <div class="col-12 col-md-12 not-found">
                  <h1 class="text-white font-bold"> 
                  </i>Manga Not Found</h1>
                  <img src="<?php echo base_url()."assets/template_2/assets/img/404.png"; ?>"class="center-404" width="80%" alt="404 NotFound" alt="">
               </div>
            </div>
   <?php }?>


         
</div>