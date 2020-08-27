    
    <!-- Card Body Anime Terbaru -->
    <div class="content-body pd-btm-page">
        <div class="list">
            <div class="list-item">
               <h2 class="item-title">Chapter Terbaru</h2>
               <a href=<?php echo site_url('manga-update/'); ?>>
                  <span class="see-all">Lihat Semua</span>
               </a>
               <!-- LAstUpdate -->
               <div class="item-2 row">
                <?php if($API_LastUpdateManga->API_MangaRs->Status == "Not Complete"){ ?>
                    <?php }else{?>
                        <?php foreach($API_LastUpdateManga->API_MangaRs->Body->LastUpdateManga as $key => $API_LastUpdateMangaV){ ?>
                        <?php $slug = $API_LastUpdateMangaV->SlugChp; ?>
                        <div class="content-4 col-md-4 col-lg-2 col-4">
                            <a href="<?php echo site_url('manga-read/'.$slug); ?>">
                                <div class="content-image">
                                <img src="<?php echo $API_LastUpdateMangaV->Image; ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_LastUpdateMangaV->Title; ?>" 
                                width="100%" />
                                <div class="info-chapter"><?php echo $API_LastUpdateMangaV->Chapter; ?></div>
                                <div class="status-chap">
                                <?php echo $API_LastUpdateMangaV->Status; ?>
                                </div>
                                </div>
                            </a>
                            <div class="content-title"><?php echo $API_LastUpdateMangaV->Title; ?></div>
                        </div>
                        
                    <?php } ?>
                <?php }?>
               </div>
               <!-- end Lastupdate -->
            </div>
         </div>
         <!-- New Manga -->
         <div class="list">
            <div class="list-item">
               <h2 class="item-title">Manga Terbaru</h2>
               <a href="<?php echo site_url('manga-search-ong'); ?>">
                  <span class="see-all">Lihat Semua</span>
               </a>
               <div class="item-2 row">
               <?php if($API_ListMangaOng->API_MangaRs->Status == "Not Complete"){ ?>
                    <?php }else{?>
                        <?php foreach($API_ListMangaOng->API_MangaRs->Body->SearchManga as $key => $SearchMangaV){ ?>
                           <?php $slug = $SearchMangaV->SlugDetail; ?>
                           <?php foreach($SearchMangaV->ListDetail as $ListDetailV){ ?>
                           <div class="content-4 col-md-4 col-lg-2 col-4">
                              <a href="<?php echo site_url('manga-detail/des/'.$slug); ?>">
                                 <div class="content-image">
                                 <img src="<?php echo $SearchMangaV->Image; ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $SearchMangaV->Title; ?>" width="100%" />
                                    <div class="info-chapter">Manga</div>
                                    <div class="status-chap">
                                    <?php echo $ListDetailV->ListInfo->Status; ?>
                                    </div>
                                 </div>
                                 
                              </a>
                              <div class="content-title"><?php echo $SearchMangaV->Title; ?></div>
                           </div>
                        <?php } ?>
                        <?php } ?>
                <?php }?>
               </div>
            </div>
         </div>
         <!-- End New Manga -->
         <div class="list" style="background-color:#631cec;">
            <div class="list-item">
               <h2 class="item-title">Genre Manga</h2>
               <a href="<?php echo base_url().'manga/genre'?>">
                  <div class="see-all">Lihat Semua</div>
               </a>
               <div id="list-channels">
                  <div class="channel" tag-id="8">
                     <a class="channel-a activity" href="<?php echo base_url('manga/genre/search/Romance') ?>">Romance</a>
                  </div>
                  <div class="channel" tag-id="32">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Fantasy') ?>">Fantasy</a>
                  </div>
                  <div class="channel" tag-id="10">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Action') ?>">Action</a>
                  </div>
                  <div class="channel" tag-id="7">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Adventure') ?>">Adventure</a>
                  </div>
                  <div class="channel" tag-id="29">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Comedy') ?>">Comedy</a>
                  </div>
                  <div class="channel" tag-id="13">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Horror') ?>">Horror</a>
                  </div>
                  <div class="channel" tag-id="4">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/Ecchi') ?>">Ecchi</a>
                  </div>
                  <div class="channel" tag-id="17">
                     <a class="channel-a " href="<?php echo base_url('manga/genre/search/isekai') ?>">Issekai</a>
                  </div>
               </div>
               <div class="item-2 row" id="genre">
               <?php if($API_GenreManga->API_MangaRs->Status == "Not Complete"){ ?>
                  <?php }else{?>
                  <?php foreach($API_GenreManga->API_MangaRs->Body->SearchGenreManga as $key => $API_GenreMangaV){ ?>
                     <?php $slug = $API_GenreMangaV->SlugDetail; ?>
                     <div class="content-4 col-md-4 col-lg-2 col-4">
                        <a href="<?php echo site_url('manga-detail/des/'.$slug); ?>">
                           <div class="content-image">
                              <img src="<?php echo $API_GenreMangaV->Image ?>" onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_GenreMangaV->Title; ?>" 
                              width="100%" height=" auto"/>
                              <div class="info-chapter">Manga</div>
                              <div class="status-chap">
                              <?php foreach( $API_GenreMangaV->ListDetail as $ListV){ 
                                 echo $ListV->ListInfo->Status;
                              }?>
                              </div>
                           </div>
                           
                        </a>
                        <div class="content-title"><?php echo $API_GenreMangaV->Title; ?></div>
                     </div>
                     <?php } ?>
                  <?php }?>
               </div>
               <div class="loading">
                  <img src="" alt="not found" width="50px;"/>
               </div>
            </div>
         </div>
         <div class="list">
            <div class="list-item">
               <h2 class="item-title">Rekomendasi Manga</h2>
               <div class="item-2 row">
               <?php if($API_RecomendationManga->API_MangaRs->Status == "Not Complete"){ ?>
                  <?php }else{?>
                  <?php foreach($API_RecomendationManga->API_MangaRs->Body->RecomendationManga as $key => $API_RecomendationMangaV){ ?>
                     <?php $slug = $API_RecomendationMangaV->SlugDetail; ?>
                  <div class="content-4 col-md-4 col-lg-2 col-4">
                     <a href="<?php echo site_url('manga-detail/des/'.$slug); ?>">
                        <div class="content-image">
                           <img src="<?php echo $API_RecomendationMangaV->Image ?>"  onerror="this.src='<?php echo base_url().'assets/template_2/assets/img/404_card_image_1.jpg'; ?>'" alt="<?php echo $API_RecomendationMangaV->Title ?>" width="100%"/>
                           <div class="info-chapter">Manga</div>
                           <div class="status-chap">
                              <?php echo $API_RecomendationMangaV->Status ?>
                           </div>
                        </div>
                        
                     </a>
                     <div class="content-title"><?php echo $API_RecomendationMangaV->Title ?></div>
                  </div>
                  
                     
                  <?php } ?>
               <?php }?>
               </div>
            </div>
         </div>
    </div>