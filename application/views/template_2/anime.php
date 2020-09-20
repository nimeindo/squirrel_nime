    
    <!-- Card Body Anime Terbaru -->
    <div class="content-body pd-btm-page">
        <div class="list">
            <div class="list-item">
               <h2 class="item-title">Episode Terbaru</h2>
               <a href="<?php echo site_url('anime-update/'); ?>">
                  <span class="see-all">Lihat Semua</span>
               </a>
               <div class="item-2 row">
               <?php if($API_LastUpdateAnime->API_TheMovieRs->Status == "Not Complete"){ ?>
               <?php }else{?>
               <?php foreach($API_LastUpdateAnime->API_TheMovieRs->Body->LastUpdateAnime as $key => $API_LastUpdateAnimeV){ ?>
               <?php $slug = $API_LastUpdateAnimeV->SlugEp; ?>
                  <div class="content-4 col-md-4 col-lg-2 col-4">
                     <a href="<?php echo site_url('anime-streaming/'.$slug); ?>">
                        <div class="content-image">
                           <img  src="<?php echo $API_LastUpdateAnimeV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_LastUpdateAnimeV->Title; ?>" 
                           width="100%"  height=" auto";/>
                           <div class="info-chapter"><?php echo "Ep ".$API_LastUpdateAnimeV->Episode ?></div>
                           <div class="status-chap">
                           <?php echo $API_LastUpdateAnimeV->Status; ?>
                           </div>
                        </div>
                        
                     </a>
                     <div class="content-title"><?php echo $API_LastUpdateAnimeV->Title; ?></div>
                  </div>
                  
                  <?php } ?>
               <?php }?>
               </div>
            </div>
         </div>
         <div class="list">
            <div class="list-item">
               <h2 class="item-title">Anime Ongoing</h2>
               <a href="<?php echo site_url('anime-search-ong'); ?>">
                  <span class="see-all">Lihat Semua</span>
               </a> 
               <div class="item-2 row">
               <?php if($API_ListAnimeOng->API_TheMovieRs->Status == "Not Complete"){ ?>
               <?php }else{?>
                  <?php foreach($API_ListAnimeOng->API_TheMovieRs->Body->SearchAnime as $key => $API_ListAnimeOngV){ ?>
                     <?php $slug = $API_ListAnimeOngV->SlugDetail; ?>
                     <?php foreach($API_ListAnimeOngV->ListDetail as $ListDetailV){ ?>
                        <div class="content-4 col-md-4 col-lg-2 col-4">
                           <a href="<?php echo site_url('anime-detail/des/'.$slug); ?>">
                              <div class="content-image">
                                 <img src="<?php echo $API_ListAnimeOngV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_ListAnimeOngV->Title; ?>" width="100%"/>
                                 <div class="info-chapter">TV</div>
                                 <div class="status-chap">
                                    <?php echo $ListDetailV->ListInfo->Status; ?>
                                 </div>
                              </div>
                           </a>
                           <div class="content-title"><?php echo $API_ListAnimeOngV->Title; ?></div>
                        </div>
                     <?php } ?>
                  <?php } ?>
                <?php }?>
               </div>
            </div>
         </div>
         <div class="list" style="background-color:#631cec;">
            <div class="list-item">
               <h2 class="item-title">Genre Anime</h2>
               <a href="<?php echo base_url().'anime/genre'?>">
                  <div class="see-all">Lihat Semua</div>
               </a>
               <div id="list-channels">
                  <div class="channel" tag-id="8">
                     <a class="channel-a activity" href="<?php echo base_url('anime/genre/search/Romance') ?>">Romance</a>
                  </div>
                  <div class="channel" tag-id="32">
                     <a class="channel-a " href="<?php echo base_url('anime/genre/search/Fantasy') ?>">Fantasy</a>
                  </div>
                  <div class="channel" tag-id="10">
                     <a class="channel-a " href="<?php echo base_url('anime/genre/search/Action') ?>">Action</a>
                  </div>
                  <div class="channel" tag-id="7">
                     <a class="channel-a " href="<?php echo base_url('anime/genre/search/Adventure') ?>">Adventure</a>
                  </div>
                  <div class="channel" tag-id="29">
                     <a class="channel-a " href="<?php echo base_url('anime/genre/search/Comedy') ?>">Comedy</a>
                  </div>
                  <div class="channel" tag-id="13">
                     <a class="channel-a " href="<?php echo base_url('anime/genre/search/Horror') ?>">Horror</a>
                  </div>
                  <div class="channel" tag-id="4">
                     <a class="channel-a " href="<?php echo base_url('anime/genre/search/Ecchi') ?>">Ecchi</a>
                  </div>
               </div>
               <div class="item-2 row" id="genre">
               <?php if($API_GenreAnime->API_TheMovieRs->Status == "Not Complete"){ ?>
                  <?php }else{?>
                  <?php foreach($API_GenreAnime->API_TheMovieRs->Body->SearchGenreAnime as $key => $API_GenreAnimeV){ ?>
                     <?php $slug = $API_GenreAnimeV->SlugDetail; ?>
                     <div class="content-4 col-md-4 col-lg-2 col-4">
                        <a href="<?php echo site_url('anime-detail/des/'.$slug); ?>">
                           <div class="content-image">
                              <img src="<?php echo $API_GenreAnimeV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_GenreAnimeV->Title; ?>" width="100%"/>
                              <div class="info-chapter">TV</div>
                              <div class="status-chap">
                              <?php foreach( $API_GenreAnimeV->ListDetail as $ListV){ 
                                 echo $ListV->ListInfo->Status;
                              }?>
                              </div>
                           </div>
                           
                        </a>
                        <div class="content-title"><?php echo $API_GenreAnimeV->Title; ?></div>
                     </div>
                     <?php } ?>
                  <?php }?>
               </div>
               <div class="loading">
                  <img src="" width="50px;" alt="loading"/>
               </div>
            </div>
         </div>
         <div class="list">
            <div class="list-item">
               <h2 class="item-title">Rekomendasi Anime</h2>
               
               <div class="item-2 row">
                  <?php if($API_RecomendationAnime->API_TheMovieRs->Status == "Not Complete"){ ?>
                  <?php }else{?>
                  <?php foreach($API_RecomendationAnime->API_TheMovieRs->Body->RecomendationAnime as $key => $API_RecomendationAnimeV){ ?>
                     <?php $slug = $API_RecomendationAnimeV->SlugDetail; ?>
                     <div class="content-4 col-md-4 col-lg-2 col-4">
                        <a href="<?php echo site_url('anime-detail/des/'.$slug); ?>">
                           <div class="content-image">
                              <img src="<?php echo $API_RecomendationAnimeV->Image ?>"  onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_RecomendationAnimeV->Title ?>" width="100%"/>
                              <div class="info-chapter">TV</div>
                              <div class="status-chap">
                              <?php echo $API_RecomendationAnimeV->Status ?>
                              </div>
                           </div>
                           
                        </a>
                        <div class="content-title"><?php echo $API_RecomendationAnimeV->Title ?></div>
                     </div>
                     
                  <?php } ?>
               <?php }?>
               </div>
            </div>
         </div>
    </div>