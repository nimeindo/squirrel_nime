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
         $SlugChp = '';
         $ChapterNow = '';
         if($Api_ChapterManga->API_MangaRs->Status == "Not Complete"){ 
         }else{
            foreach($Api_ChapterManga->API_MangaRs->Body->ChapterManga as $key => $Api_ChapterMangaV){ 
               $Title = substr($Api_ChapterMangaV->Title,0,20).'...';
               $ChapterImage = $Api_ChapterMangaV->ChapterImage;
               $ChapterList = $Api_ChapterMangaV->ChapterList;
               $ListDetail = $Api_ChapterMangaV->ListDetail;
               $SlugChp = $Api_ChapterMangaV->SlugChp;
               foreach($ListDetail as $ListDetailV){
                  $SlugNextChapter = $ListDetailV->ListInfo->SlugNextChapter;
                  $SlugPrevChapter = $ListDetailV->ListInfo->SlugPrevChapter;
                  $SlugDetail = $ListDetailV->ListInfo->SlugDetail;
                  $Synopsis =  $ListDetailV->Synopsis;
               }
               $resultsChp = explode('-', trim($SlugChp,'-'));
               if(count($resultsChp) > 0){
                  $ChapterNow = $resultsChp[count($resultsChp) - 1];
               }
            }
            // print_r(str_replace('-',' ',$SlugDetail));exit;
         }
    // =======================END API CCHAPTER MANG =======================
?>

<!-- Navbar -->
<header>
      <div class="header-nav d-none d-md-block post-fixed">
          <div class="container container-big">
              <div class="row align-items-center">
                  <div class="col d-flex justify-content-start align-items-center">
                      <a href="<?php echo site_url(); ?>">
                          <div class="header-logo d-flex align-items-center justify-content-start right-logo-reader">
                          <img src=<?php echo base_url()."assets/template_2/assets/img/logoo.png" ?> class="img-fluid" width="106" alt="Nimeindo">
                          </div>
                      </a>
                      <ul class="main-nav right-read d-flex flex-row justify-content-start text-h4  mb-0 mt-1" id=accordionHeaderNav>
                          <li id=menu-item-29 class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-29 ">
                             <a class='trim-text' href="<?php echo site_url('manga-detail/des/'.$SlugDetail); ?>"><?php echo substr(str_replace('-',' ',$SlugDetail),0,20) ?></a>
                          </li>
                          <div class="vertical-line">
                          </div>
                          <li id=menu-item-29 class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-29">
                             <a class='trim-text' href="<?php echo site_url('manga-detail/des/'.$SlugDetail); ?>"><?php echo 'Chapter Now 0'.$ChapterNow ?></a>
                          </li>
                          
                      </ul>
                      <ul class="next-prev-chapt right-read d-flex flex-row justify-content-start text-h4 ml-chap mb-0 mt-1 pd-nav-chap">
                            <?php if(!empty($SlugPrevChapter)) {?>
                            <a href="<?php echo site_url('manga-read/'.$SlugPrevChapter); ?>">
                                <div class="prev-arrow">
                                    <i class="fa fa-caret-left" style="font-size:24px"></i>
                                </div>
                            </a>
                            <?php }?>
                            <a href="<?php echo site_url('manga-detail/des/'.$SlugDetail); ?>">
                                <div class="text-chapt">
                                    <span class='trim-text'><?php echo "Chapter 0".$ChapterNow ?></span>
                                </div>
                             </a>
                             <?php if(!empty($SlugNextChapter)) {?>
                             <a href="<?php echo site_url('manga-read/'.$SlugNextChapter); ?>">
                                <div class="prev-arrow">
                                    <i class="fa fa-caret-right" style="font-size:24px"></i>
                                </div>
                              </a>
                              <?php }?>
                         
                       </ul>
                  </div>
                  <div class="col-2 d-none d-md-flex flex-row justify-content-end">
                        <div class="col-md-12">
                              <div class="dropdown">
                                    <button class="btn btn-lis-chapt " type="button" id="dropdownMenuChapter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-list">
                                                </i>
                                                <span>Chapter</span>
                                        </button>
                                    <div class="dropdown-menu dropdown-menu-right scrollable-menu" aria-labelledby="dropdownMenuChapter">
                                     <?php foreach($ChapterList as $ChapterListV){?>
                                        <a class="dropdown-item" href="<?php echo site_url('manga-read/'.$ChapterListV->SlugChp); ?>"><?php echo $ChapterListV->Title?></a>
                                      <?php }?>
                                    </div>
                                    
                                  </div>
                         </div>
                  </div>
                  
              </div>
          </div>
      </div>
      <nav class="navbar read-komik-nav mobile-nav-read navbar-expand-lg d-md-none">
          <a class="Back-arrow" href="<?php echo site_url('manga-detail/des/'.$SlugDetail); ?>">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </a>
          <div class="back-detail text-h4">
            <ul class="main-nav right-read d-flex flex-row justify-content-start text-h4 mb-0" id=accordionHeaderNav>
                <li id=menu-item-29 class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-29">
                    <a href="index.html">Chapter</a>
                </li>
                <div class="vertical-line">
                </div>
                <li id=menu-item-29 class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-29">
                    <a href="index.html"><?php echo '0'.$ChapterNow ?></a>
                </li>
            </ul>
            <a class="title-manga" href="index.html"><?php echo substr(str_replace('-',' ',$SlugDetail),0,20).'...' ?></a>
          </div>
          <div class="dropdown dropdownMenuChapter" >
                <button class="btn btn-lis-chapt" type="button" id="dropdownMenuChapter-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list">
                            </i>
                            <span>Chapter</span>
                    </button>
                <div class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuChapter-2" style="width: 100%;">
                <?php foreach($ChapterList as $ChapterListV){?>
                    <a class="dropdown-item" href="<?php echo site_url('manga-read/'.$ChapterListV->SlugChp); ?>"><?php echo $ChapterListV->Title?></a>
                  <?php }?>
                </div>
        </div>
          
      </nav>
  </header>
    <script>
        $(document).ready(function() {
            $(".navbar-toggler").click(function() {
                $(".mobile-menu").toggleClass("show-mobile-menu");
                $(".mainbody").toggleClass("no-scroll");
            });
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $(".scrollToTop").fadeIn()
                } else {
                    $(".scrollToTop").fadeOut()
                }
            });
        });
    </script>
    <input id="baseUrl" type="hidden" value="#">
    