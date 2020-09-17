<?php
    // =======================API CCHAPTER MANG =======================
         $ChapterImage = [];
         $SlugNextChapter = '';
         $SlugPrevChapter = '';
         $SlugDetail = '';
         $ListDetail = [];
         $Synopsis = '';
         $ChapterList = [];
         $Title = '';
         $Image = '';
         $nextChapter = '';
         $prevChapter = '';
         $Notfound = 0;
         if($Api_ChapterManga->API_MangaRs->Status == "Not Complete"){ 
            $Notfound = 1;
         }else{
            foreach($Api_ChapterManga->API_MangaRs->Body->ChapterManga as $key => $Api_ChapterMangaV){ 
               $Title = substr($Api_ChapterMangaV->Title,0,20).'...';
               $Image = $Api_ChapterMangaV->Image;
               $ChapterImage = $Api_ChapterMangaV->ChapterImage;
               $ChapterList = $Api_ChapterMangaV->ChapterList;
               $ListDetail = $Api_ChapterMangaV->ListDetail;
               foreach($ListDetail as $ListDetailV){
                  $SlugNextChapter = $ListDetailV->ListInfo->SlugNextChapter;
                  $SlugPrevChapter = $ListDetailV->ListInfo->SlugPrevChapter;
                  $SlugDetail = $ListDetailV->ListInfo->SlugDetail;
                  $Synopsis =  $ListDetailV->Synopsis;
               }
               $resultsNextChp = explode('-', trim($SlugNextChapter,'-'));
               $resultsPrevChp = explode('-', trim($SlugPrevChapter,'-'));
               if(count($resultsNextChp) > 0){
                  $nextChapter = $resultsNextChp[count($resultsNextChp) - 1];
                  $prevChapter = $resultsPrevChp[count($resultsPrevChp) - 1];
               }
            }
            
            
            
         }
    // =======================END API CCHAPTER MANG =======================


?>

<!-- Card Body Anime Terbaru -->
<div class="content-body pd-btm-read">
   
        <div class="row">
            <div class="col-sm-2 hidden-xs" style="position: relative">
               <div style="left: 0; right: 0; margin: 0 auto; position: absolute; display: table;">
                  <br>
               </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-12" style="padding: 4px;">
            
               <div id="all" style="">
               <?php if($Notfound ==0){?>
                  <?php foreach($ChapterImage as $ChapterImageV){?>
                     <img class="img-responsive" src="<?php echo $ChapterImageV->SrcImage ?>" alt="<?php echo $ChapterImageV->SlugImage ?>" width="100%">
                  <?php }?>
                  <?php }else{?>
                  <div class="row mb40 pd-top-10">
                        <div class="col-12 col-md-12 not-found">
                        <h1 class="text-white font-bold"> 
                        </i>Read Manga Not Found</h1>
                        <img src="<?php echo base_url()."assets/template_2/assets/img/404.png"; ?>"class="center-404" width="80%" alt="404 NotFound" alt="">
                     </div>
                  </div>
            <?php }?>
               </div>
               
            </div>
            <div class="col-sm-2 hidden-xs" style="position: relative">
               <div style="left: 0; right: 0; margin: 0 auto; position: absolute; display: table;">
                  <br>
               </div>
            </div>
         </div>
            <div class="row footer-read">
               <div class="col-sm-2 hidden-xs" style="position: relative">
                  <div style="left: 0; right: 0; margin: 0 auto; position: absolute; display: table;">
                     <br>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-8 col-12" style="padding-top: 5%;padding-bottom: 5%;">
                  <div class="content-read d-flex">
                  <?php if(!empty($SlugPrevChapter)) {?>
                     <a href="<?php echo site_url('manga-read/'.$SlugPrevChapter); ?>" class="mr-auto">
                           <div class="manga-nav-btm">
                              <i class="fa fa-chevron-circle-left"></i> 
                              <img src="<?php echo $Image?>" alt="<?php echo $SlugPrevChapter ?>">
                              <div class="manga-nav-title">
                                 <span class="comic-nav-episode">Previous Chp.</span>
                                 <span class="comic-nav-name">Chapter <?php echo $prevChapter; ?></span>
                              </div>
                           </div>
                     </a>
                     <?php }?>
                     <?php if(!empty($SlugNextChapter)) {?>
                           <a href="<?php echo site_url('manga-read/'.$SlugNextChapter); ?>" class="ml-auto">
                                 <div class="manga-nav-btm">
                                       <div class="manga-nav-title">
                                             <span class="comic-nav-episode">Next Chp.</span>
                                             <span class="comic-nav-name">Chapter <?php echo $nextChapter;?></span>
                                       </div>
                                    <img src="<?php echo $Image?>" alt="<?php echo $SlugNextChapter ?>">
                                    <i class="fa fa-chevron-circle-right"></i>
                                 </div>
                           </a>
                     <?php }?>
                     
                     
                  </div>
               </div>
               <div class="col-sm-2 hidden-xs" style="position: relative">
                     <div style="left: 0; right: 0; margin: 0 auto; position: absolute; display: table;">
                        <br>
                     </div>
                  </div>
            </div>
</div>
   
    <div class="footer-nav-btm">
        <nav class="navbar fixed-bottom read-komik-nav mobile-nav-read navbar-expand-lg d-md-none">
            <?php if(!empty($SlugPrevChapter)){?>
            <a class="Back-arrow" href="<?php echo site_url('manga-read/'.$SlugPrevChapter); ?>">
               <div class="nav-prev">
                     <i class="fa fa-chevron-circle-left"></i> 
                     <span> Previous</span>
               </div>
            </a>
            <a class="Back-arrow" href="<?php echo site_url(); ?>">
               <div class="nav-prev">
                     <i class="fa fa-home"></i> 
                     <span> Home</span>
               </div>
            </a>
            <?php } if(!empty($SlugNextChapter)){?>
            <a class="Back-arrow" href="<?php echo site_url('manga-read/'.$SlugNextChapter); ?>">
                  <div class="nav-next">
                     <span>Next </span>
                     <i class="fa fa-chevron-circle-right"></i>
                  </div> 
            </a>
            <?php } ?>
        </nav>
    