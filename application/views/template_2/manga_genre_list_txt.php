<?php
$GenreListManga = [];
$Notfound = 0;
if($API_GenreListAllManga->API_MangaRs->Status == "Not Complete"){ 
    $Notfound = 1;  
}else{
   $GenreListManga = $API_GenreListAllManga->API_MangaRs->Body->GenreListManga;
}

?>

<!-- Card Body Anime Terbaru -->
<div class="content-body">
        <div class="fixed-spacing pd-btm-list">
            <section class="container container-1080 mt40 mb80 animelist">
                <div class="row mb40">
                    <div class="col-12 col-md-7">
                    <h1 class="text-white font-bold">
                        <i class="far fa-eye text-lightmode-primary mr-3"></i>Genre Manga
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
                       <a href="<?php echo base_url().'manga/genre'?>">ALL</a>
                       <?php foreach (range('A', 'Y') as $char) { ?>
                       <a href="<?php echo base_url().'manga/genre/'.$char ?>"><?php echo $char; ?></a>
                        <?php } ?>
                     </div>
                    </div>
                </div>
                <?php if($Notfound ==0){?>
                    <div class="row the-animelist-text">
                        <div class="sad the-sadasd-text"></div>
                        <?php foreach($GenreListManga as $GenreListMangaV){?>
                        <div class="col-12 col-sm-6 mb40">
                        <div class="text-h2 alphabet mb20 text-primary font-bold">
                        <a name="."><?php echo $GenreListMangaV->NameIndex; ?></a>
                        </div>
                        <?php foreach($GenreListMangaV->ListSubIndex as $ListSubIndexV) {?>
                            <?php 
                            $colorList = 'Special';
                            $Slug = $ListSubIndexV->Slug;
                            $Genre = $ListSubIndexV->Genre;
                            ?>
                            <a class="list-anime ONA show" href="<?php echo base_url().'manga/genre/search/'.$Slug?>">
                                <div class="d-flex justify-content-start align-items-center the-anime mb10">
                                    <div class="<?php echo $colorList.' type text-h5 text-uppercase';?>" >
                                    <!-- <?php echo $Status?>  -->
                                    <?php echo $Genre?> 
                                    </div>
                                    <div class="title text-h4">
                                    
                                    </div>
                                </div>
                            </a>
                        <?php }?>
                        
                        </div>
                        <?php }?>
                    </div>
                <?php }else{?>
                        <div class="row mb40 pd-top-10">
                                <div class="col-12 col-md-12 not-found">
                                <h1 class="text-white font-bold"> 
                                </i>Genre Manga Not Found</h1>
                                <img src="<?php echo base_url()."assets/template_2/assets/img/404.png"; ?>"class="center-404" width="80%" alt="404 NotFound" alt="">
                            </div>
                        </div>
                <?php }?>                
            </section>
            
        </div>
   
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>