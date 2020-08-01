<?php
//============================= API LAST UPDATE MANGA =====================
   $LastUpdateManga = [];
   if($API_LastUpdateManga->API_MangaRs->Status == "Not Complete"){ 
   }else{
      $LastUpdateManga = $API_LastUpdateManga->API_MangaRs->Body->LastUpdateManga;
         foreach($API_LastUpdateManga->API_MangaRs->Body->LastUpdateManga as $key => $API_LastUpdateMangaV){ 
         $slug = $API_LastUpdateMangaV->SlugChp; 
         }
   }
//============================= End API LAST UPDATE MANGA =====================

//============================= API GENRE MANGA =====================
   $SearchGenreManga =[];
   
   if($API_GenreManga->API_MangaRs->Status == "Not Complete"){ 
   }else{
      $SearchGenreManga = $API_GenreManga->API_MangaRs->Body->SearchGenreManga;
   }
//============================= End API GENRE MANGA =====================

//============================= API LAST UPDATE ANIME =====================
   $LastUpdateAnime = [];
   if($API_LastUpdateAnime->API_TheMovieRs->Status == "Not Complete"){ 
   }else{
      $LastUpdateAnime = $API_LastUpdateAnime->API_TheMovieRs->Body->LastUpdateAnime;
   }
//============================= End API LAST UPDATE ANIME =====================

//============================= API RECOMENDATION ANIME =====================
   $RecomendationAnime = [];
   if($API_RecomendationAnime->API_TheMovieRs->Status == "Not Complete"){ 
   }else{
      $RecomendationAnime = $API_RecomendationAnime->API_TheMovieRs->Body->RecomendationAnime;
   }
//============================= End API RECOMENDATION ANIME ===================

//============================= API RECOMENDATION MANGA =====================
   $RecomendationManga = [];
   if($API_RecomendationManga->API_MangaRs->Status == "Not Complete"){ 
   }else{
      $RecomendationManga = $API_RecomendationManga->API_MangaRs->Body->RecomendationManga;
   }
//============================= End API RECOMENDATION MANGA ===================

//============================= API TOP MANGA =====================
   $TopManga = [];
   if($API_TopManga->API_MangaRs->Status == "Not Complete"){ 
   }else{
      $i=1;
      $TopManga = $API_TopManga->API_MangaRs->Body->TopManga;
   }
//============================= End API TOP MANGA ===================

//============================= API TOP ANIME =====================
   $TopAnime = [];
   if($API_TopAnime->API_TheMovieRs->Status == "Not Complete"){ 
   }else{
      $j=1;
      $TopAnime = $API_TopAnime->API_TheMovieRs->Body->TopAnime;
   }
//============================= End API TOP ANIME ===================
?>


<!-- Card Body Anime Terbaru -->
<div class="content-body">
      <div class="left-content card-full">
          <!-- #region LastUpdate Manga -->
         <div class="postbody">   
            <section class="dark">
               <div class="widget-title">
                  <h2>Baca Manga Terbaru</h2>
               </div>
               <div class="widget-body">
                  <div class="content">
                     <div class="post-show chapterbaru">
                        <div class="row">
                           <?php foreach($LastUpdateManga as $key => $API_LastUpdateMangaV){ ?>
                            <?php $slug = $API_LastUpdateMangaV->SlugChp; 
                                  $Star = $API_LastUpdateMangaV->Star; 
                                  $Stars = '';
                                  for($i = 0 ; $i < $Star ;$i++){
                                    $Stars .= '★';
                                  }      
                            ?>
                                 <div class="col-6 col-sm-6 col-md-3 col-lg-2 mb40 width20">
                                       <a href="<?php echo site_url('manga-read/'.$slug); ?>">
                                             <div class="episode-card">
                                                <div class="episode-ratio background-cover" style="" >
                                                <img  src="<?php echo $API_LastUpdateMangaV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_LastUpdateMangaV->Title; ?>">
                                                   <div class="episode-detail px-3 pt-5">
                                                         <div class="">
                                                            <h5 class="text-white"><?php echo $API_LastUpdateMangaV->Title; ?></h5>
                                                            <div class="ratingarea">
                                                               <span class="series-rating" style="background-size: 0% 100%"><?php echo $Stars; ?></span>
                                                               <i class="score"><?php echo $API_LastUpdateMangaV->Rating; ?></i>
                                                            </div>
                                                         </div>
                                                         <div class="status-type text-white"> <span class="text-h6"></span> <span class="text-h6">TV</span></div>
                                                   </div>
                                                   <div class="episode-number manga-number"><?php echo $API_LastUpdateMangaV->Chapter ?></div>
                                                </div>
                                             </div>
                                       </a>      
                                 </div>
                              <?php } ?>
                        </div>
                        <a class="linkupdate" href="<?php echo site_url('manga-update/'); ?>">Lihat Semua Chapter Manga Terbaru</a>
                     </div>
                  </div>
               </div>
            </section>
            
         </div>
         <!-- #endregion Lastupdate Manga-->

         <!-- Genre -->
         <div class="postbody">   
            <section class="purple">
               <div class="widget-title">
                  <h2>Genre Manga</h2>
               </div>
               <div id="list-channels">
                  <div class="channel" tag-id="8">
                     <a class="channel-a activity" href="<?php echo base_url('manga/genre/search/Romance') ?>">Romance</a>
                  </div>
                  <div class="channel" tag-id="10">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Fantasy') ?>">Fantasy</a>
                  </div>
                  <div class="channel" tag-id="7">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Action') ?>">Action</a>
                  </div>
                  <div class="channel" tag-id="29">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Adventure') ?>">Adventure</a>
                  </div>
                  <div class="channel" tag-id="13">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Comedy') ?>">Comedy</a>
                  </div>
                  <div class="channel" tag-id="4">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Horror') ?>">Horror</a>
                  </div>
                  <div class="channel" tag-id="17">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Ecchi') ?>">Ecchi</a>
                  </div>
                  <div class="channel" tag-id="18">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/isekai') ?>">Issekai</a>
                  </div>
            </div>
               <div class="widget-body">
                  <div class="content"> 
                     <div class="post-show chapterbaru">
                        <div class="row genre-body no-hover">
                           <?php foreach($SearchGenreManga as $key => $API_GenreMangaV){ ?>
                              <?php $SlugDetail = $API_GenreMangaV->SlugDetail; ?>
                              <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb40 width20">
                                 <a href="<?php echo base_url().'manga-detail/des/'.$SlugDetail?>">
                                    <div class="episode-card">
                                       <div class="episode-ratio rounded-card background-cover" style="" >
                                       <img class="rounded-card" src="<?php echo $API_GenreMangaV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_GenreMangaV->Title; ?>">
                                       </div>
                                       <div class="detail">
                                             <h4><a class="title-series" href="#" rel="2823" title="Anime One Piece"><?php echo $API_GenreMangaV->Title; ?></a></h4>
                                          <?php foreach($API_GenreMangaV->ListDetail as $ListDetailV){ ?>
                                          <?php 
                                             $Star = $ListDetailV->ListInfo->Star; 
                                             $Stars = '';
                                             for($i = 0 ; $i < $Star ;$i++){
                                               $Stars .= '★';
                                             }    
                                             ?>
                                          <span>
                                             <div class="rating">
                                                <div class="rtg">
                                                   <div class="clearfix archiveanime-rating">
                                                      <div class="rating10 archiveanime-rating-content">
                                                         <div class="ratingarea">
                                                            <span class="series-rating" style="background-size: 0% 100%"><?php echo $Stars; ?></span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <i class="score"><?php echo $ListDetailV->ListInfo->Rating; ?></i>
                                             </div>
                                          </span>
                                          <?php } ?>
                                       </div>
                                    </div>
                                 </a>
                              </div>
                              <?php } ?>
                        </div>
                        <a class="linkupdate-genre" href="<?php echo base_url().'manga/genre'?>">Lihat Semua Genre Manga</a>
                     </div>
                  </div>
               </div>
            </section>
            
         </div>
        
         <!-- #region LastUpdate Anime -->
         <div class="postbody">   
            <section class="dark">
               <div class="widget-title">
                  <h2>Nonton Anime Terbaru</h2>
               </div>
               <div class="widget-body">
                  <div class="content">
                     <div class="post-show chapterbaru">
                        <div class="row">
                            <?php foreach($LastUpdateAnime as $key => $API_LastUpdateAnimeV){ ?>
                            <?php $slug = $API_LastUpdateAnimeV->SlugEp; 
                                 $Star = $API_LastUpdateAnimeV->Star; 
                                 $Stars = '';
                                 for($i = 0 ; $i < $Star ;$i++){
                                    $Stars .= '★';
                                 }      
                            ?>
                                <div class="col-6 col-sm-6 col-md-3 col-lg-2 mb40 width20">
                                    <a href="<?php echo site_url('anime-streaming/'.$slug); ?>">
                                        <div class="episode-card">
                                            <div class="episode-ratio background-cover" style="" >
                                            <img  src="<?php echo $API_LastUpdateAnimeV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_LastUpdateAnimeV->Title; ?>">
                                                <div class="episode-detail px-3 pt-5">
                                                    <div class="">
                                                        <h5 class="text-white"><?php echo $API_LastUpdateAnimeV->Title; ?></h5>
                                                        <div class="ratingarea">
                                                        <span class="series-rating" style="background-size: 0% 100%"><?php echo $Stars; ?></span>
                                                            <i class="score"><?php echo $API_LastUpdateAnimeV->Rating; ?></i>
                                                        </div>
                                                    </div>
                                                    <div class="status-type text-white"> <span class="text-h6"></span> <span class="text-h6">TV</span></div>
                                                </div>
                                                <div class="episode-number"><?php echo $API_LastUpdateAnimeV->Episode ?></div>
                                            </div>
                                        </div>
                                    </a>      
                                </div>
                                <?php } ?>
                        </div>
                        <a class="linkupdate" href="<?php echo site_url('anime-update/'); ?>">Lihat Semua Episode Anime Terbaru</a>
                     </div>
                  </div>
               </div>
            </section>
            
         </div>
         <!-- #endregion LstUpdate Anime -->
         
         <!-- #region Recomendation -->
         <div class="postbody recomended-body">   
            <section class="purple">
               <div class="widget-body">
                  <div class="content">
                     <div class="post-show chapterbaru">
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="widget-title recomendation-column">
                                 <h2>Rekomendasi Anime</h2>
                              </div>
                                 <?php foreach($RecomendationAnime as $key => $API_RecomendationAnimeV){ ?>
                                    <?php $SlugDetail = $API_RecomendationAnimeV->SlugDetail; 
                                          $Star = $API_RecomendationAnimeV->Star; 
                                          $Stars = '';
                                          for($i = 0 ; $i < $Star ;$i++){
                                             $Stars .= '★';
                                          }      
                                    ?>
                                    <div class="col-sm-12">
                                          <div class="media manga-item" style="margin-bottom: 4px;">
                                             <div class="media-left">
                                                <a href="<?php echo base_url().'anime-detail/des/'.$SlugDetail?>" class="thumbnail">
                                                <img width="80" src="<?php echo $API_RecomendationAnimeV->Image ?>"  onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_RecomendationAnimeV->Title; ?>">
                                                </a>
                                                <span class="hot">Hot</span>
                                             </div>
                                             <div class="media-body">
                                                <h3 class="media-heading manga-heading text-truncate">
                                                   <!-- <i class="fa fa-book"></i> -->
                                                   <a href="<?php echo base_url().'anime-detail/des/'.$SlugDetail?>" class="chart-title"><?php echo $API_RecomendationAnimeV->Title; ?></a>
                                                </h3>
                                                <div class="readOnly-228" style="display: inline-block; width: 100px;" title="good">
                                                   <div class="ratingarea" style="color: #f1e120">
                                                      <span class="series-rating" style="background-size: 0% 100%; "><?php echo $Stars; ?></span>
                                                   </div>
                                                </div>
                                                <!-- <script>$('.readOnly-228').raty({path: "https://mangaid.click/packages/escapeboy/jraty/raty/lib/img", readOnly: true, score: 4.78});</script> -->
                                                <div style="color: aliceblue; font-size: 12px;">
                                                   Genre : <?php echo $API_RecomendationAnimeV->Genre; ?>
                                                </div>
                                             </div>
                                          </div>
                                    </div>
                              
                                 <?php } ?>
                            </div>
                            <div class="col-sm-6" >
                              <div class="widget-title recomendation-column">
                                 <h2>Rekomendasi Manga</h2>
                              </div>
                                 <?php foreach($RecomendationManga as $key => $API_RecomendationMangaV){ ?>
                                    <?php $SlugDetail = $API_RecomendationMangaV->SlugDetail; 
                                          $Star = $API_RecomendationMangaV->Star; 
                                          $Stars = '';
                                          for($i = 0 ; $i < $Star ;$i++){
                                             $Stars .= '★';
                                          }     
                                    ?>
                                    <div class="col-sm-12">
                                       <div class="media manga-item" style="margin-bottom: 4px;">
                                          <div class="media-left">
                                             <a href="<?php echo base_url().'manga-detail/des/'.$SlugDetail?>" class="thumbnail">
                                             <img width="80" src="<?php echo $API_RecomendationMangaV->Image ?>" alt="<?php echo $API_RecomendationMangaV->Title; ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'">
                                             </a>
                                             <span class="hot">Hot</span>
                                          </div>
                                          <div class="media-body">
                                             <h3 class="media-heading manga-heading text-truncate">
                                                <!-- <i class="fa fa-book"></i> -->
                                                <a href="<?php echo base_url().'manga-detail/des/'.$SlugDetail?>" class="chart-title"><?php echo $API_RecomendationMangaV->Title; ?></a>
                                             </h3>
                                             <div class="readOnly-228" style="display: inline-block; width: 100px;" title="good">
                                                <div class="ratingarea" style="color: #f1e120">
                                                   <span class="series-rating" style="background-size: 0% 100%; "><?php echo $Stars; ?></span>
                                                </div>
                                             </div>
                                             <!-- <script>$('.readOnly-228').raty({path: "https://mangaid.click/packages/escapeboy/jraty/raty/lib/img", readOnly: true, score: 4.78});</script> -->
                                             <div style="color: aliceblue; font-size: 12px;">
                                                Genre : <?php echo $API_RecomendationMangaV->Genre; ?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                        <!-- <a class="linkupdate-pink" href="/anime-terbaru/">Lihat Semua Update Episode Terbaru</a> -->
                     </div>
                  </div>
               </div>
            </section>
            
         </div>
      </div>  

      <div class="rigt-content card-hidden">
         <div id="sidebar">
            <div class="senc">
               <aside class="widgets">
                  <div class="sencs">
                     <h3 class="widget-title">Like On Facebook</h3>
                     <div class='widget-post'>
                           <div class="facebook-fanspage"> 
                              <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FNimeindotv-113849613658888%2F&tabs=tabs&width=340&height=130&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=false&appId" 
                                 width="100%" height="130" 
                                 style="border:none;overflow:hidden" 
                                 scrolling="no" frameborder="0" 
                                 allowTransparency="true" allow="encrypted-media"></iframe>
                           </div>
                     </div>
                  </div>
               </aside>
            </div>
         </div>
         
         <div id="sidebar">
            <div class="senc">
               <aside class="widgets">
                  <div class="sencs">
                     <h3 class="widget-title">Chatroom</h3>
                     <div class='widget-post'>
                        <div class="chatroom-page">
                           
                              <script type="" id="cid0020000234317034312" rel="noopener noreferrer nofollow" data-cfasync="false" async src="https://st.chatango.com/js/gz/emb.js" >
                                 {
                                     "handle": "nime-indo",
                                     "arch": "js",
                                     "styles": {
                                       "a":"6600cc",
                                       "b":100,
                                       "c":"FFFFFF",
                                       "d":"FFFFFF",
                                       "k":"0084ef",
                                       "l":"0084ef",
                                       "m":"0084ef",
                                       "n":"FFFFFF",
                                       "p":"10",
                                       "q":"0084ef",
                                       "r":100,
                                       "cnrs":"0.35",
                                         "fwtickm": 1
                                     }
                                 }
                              </script>
                        </div>
                     </div>
                  </div>
               </aside>
            </div>
         </div>
         <div id="sidebar">
            <div class="senc">
               <aside class="widgets">
                  <div class="sencs">
                     <h3 class="widget-title">Anime Terpopuler</h3>
                     
                     <div class='widget-post'>
                     <?php foreach($TopAnime as $key => $API_TopAnimeV){ ?>
                           <?php $SlugDetail = $API_TopAnimeV->SlugDetail; 
                                 $Star = $API_TopAnimeV->Star; 
                                 $Stars = '';
                                 for($i = 0 ; $i < $Star ;$i++){
                                 $Stars .= '★';
                                 }     
                           ?>
                              <div class="serieslist pop">
                                 <ul>
                                    <li>
                                       <div class="ctr"><?php echo $j ?></div>
                                       <div class="imgseries">
                                          <a class="series" href="<?php echo base_url().'anime-detail/des/'.$SlugDetail?>" rel="2823" title="Anime One Piece">
                                             <img src="<?php echo $API_TopAnimeV->Image ?>" alt="<?php echo $API_TopAnimeV->Title; ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" />
                                             <noscript><img src="<?php echo $API_TopAnimeV->Image ?>" alt="<?php echo $API_TopAnimeV->Title; ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'"  title="<?php echo $API_TopAnimeV->Title; ?>" itemprop="image" /></noscript>
                                          </a>
                                       </div>
                                       <div class="leftseries">
                                          <h4><a class="series" href="<?php echo base_url().'anime-detail/des/'.$SlugDetail?>" rel="2823" title="Anime One Piece"><?php echo $API_TopAnimeV->Title; ?></a></h4>
                                          <span><?php echo $API_TopAnimeV->Status; ?></span> 
                                          
                                          <span>
                                             <div class="rating">
                                                <div class="rtg">
                                                   <div class="clearfix archiveanime-rating">
                                                      <div class="rating10 archiveanime-rating-content">
                                                         <div class="ratingarea">
                                                            <span class="series-rating" style="background-size: 0% 100%"><?php echo $Stars; ?></span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <i><?php echo $API_TopAnimeV->Rating; ?></i>
                                             </div>
                                          </span>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           
                           <?php $j++; ?>   
                        <?php } ?>

                     </div>
                  </div>
               </aside>
            </div>
         </div>
         <div id="sidebar">
            <div class="senc">
               <aside class="widgets">
                  <div class="sencs">
                     <h3 class="widget-title">Manga Terpopuler</h3>
                     <div class='widget-post'>
                     
                     <?php foreach($TopManga as $key => $TopMangaV){ ?>
                           <?php $SlugDetail = $TopMangaV->SlugDetail; 
                              $Star = $TopMangaV->Star; 
                              $Stars = '';
                              for($i = 0 ; $i < $Star ;$i++){
                                 $Stars .= '★';
                              }      
                              $key++;
                           ?>
                              <div class="serieslist pop">
                                 <ul>
                                    <li>
                                       <div class="ctr"><?php echo $key ?></div>
                                       <div class="imgseries">
                                          <a class="series" href="<?php echo base_url().'manga-detail/des/'.$SlugDetail?>" rel="2823" title="Anime One Piece">
                                             <img src="<?php echo $TopMangaV->Image ?>" alt="<?php echo $TopMangaV->Title; ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" />
                                             <noscript><img src="<?php echo $TopMangaV->Image ?>" alt="<?php echo $TopMangaV->Title; ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'"  title="<?php echo $TopMangaV->Title; ?>" itemprop="image" /></noscript>
                                          </a>
                                       </div>
                                       <div class="leftseries">
                                          <h4>
                                             <a class="series" href="<?php echo base_url().'manga-detail/des/'.$SlugDetail?>" rel="2823" title="Anime One Piece"><?php echo $TopMangaV->Title; ?></a>
                                          </h4>
                                          <span><?php echo $TopMangaV->Status; ?></span> 
                                          <span>
                                             <div class="rating">
                                                <div class="rtg">
                                                   <div class="clearfix archiveanime-rating">
                                                      <div class="rating10 archiveanime-rating-content">
                                                         <div class="ratingarea">
                                                            <span class="series-rating" style="background-size: 0% 100%"><?php echo $Stars; ?></span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <i><?php echo $TopMangaV->Rating; ?></i>
                                             </div>
                                          </span>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                        <?php } ?>
                        
                     </div>
                  </div>
               </aside>
            </div>
         </div>
      </div>
</div>