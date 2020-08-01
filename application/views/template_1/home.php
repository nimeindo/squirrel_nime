<?php
    
    $pag = 0;
    $TotalSearchPage = 0;
    $PageNowSearch = 1;
    $FirstPagination = 5;
    if($API_TheMovieRs->API_TheMovieRs->Status == "Not Complete"){ 
    }else{
        $TotalSearchPage = $API_TheMovieRs->API_TheMovieRs->Body->TotalSearchPage;
        $PageNowSearch = $API_TheMovieRs->API_TheMovieRs->Body->PageSearch;
        $FirstPagination = $API_TheMovieRs->API_TheMovieRs->Body->FirstPagination;
    }
?>

    <!-- Navbar slider-->
    <div class="container ">
        <div class="image-slider">
            <img src=<?php echo base_url()."/assets/template_1/assets/img/nime/thumbnail_2_min.jpg"?> alt="thumbnail">
        </div>
    </div>
    <!-- Jumbotron -->
    <!-- Content -->
    <div class="container">
        <div class="update-anime">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4>Update Episode</h4>
                    <div class="jumbotron update-anime">
                        
                        <!-- Baris 1 -->
                        <div class="row ">
                        <?php if($API_TheMovieRs->API_TheMovieRs->Status == "Not Complete"){ ?>
                        <?php }else{?>
                            <?php foreach($API_TheMovieRs->API_TheMovieRs->Body->LastUpdateAnime as $API_TheMovieRS){ ?>
                            <?php //$slug = $API_TheMovieRS->IdListEpisode.'-'.$API_TheMovieRS->SlugEp; ?>
                            <?php $slug = $API_TheMovieRS->SlugEp; ?>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-3 mb40">
                                <a href="<?php echo site_url('streaming/'.$slug); ?>">
                                    <div class="episode-card">
                                        <div class="episode-ratio background-cover" style="" >
                                        <img  src="<?php echo $API_TheMovieRS->Image ?>" onerror="this.src='https://pbs.twimg.com/profile_images/600060188872155136/st4Sp6Aw_400x400.jpg'" alt="<?php echo $API_TheMovieRS->Title ?>">
                                            <div class="episode-detail px-3 pt-5">
                                                <div class="">
                                                    <h5 class="text-white"><?php echo $API_TheMovieRS->Title; ?></h5></div>
                                                <div class="status-type text-white"> <span class="text-h6"></span> <span class="text-h6">TV</span></div>
                                            </div>
                                            <div class="episode-number"><?php echo $API_TheMovieRS->Episode ?></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        <?php }?>
                        
                        </div>
                        <div class="row  d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination-2">
                                    <li class="page-item">
                                        <a class="page-link" style="color:white; cursor: pointer;" href="<?php echo site_url('pages/1'); ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php if($FirstPagination >= $LimitRowPegination){?>
                                        <li class="page-item">
                                            <a class="page-link" style="color:white; cursor: pointer;" href="<?php echo site_url('pages/'.($PageNowSearch-1)); ?>"  aria-label="Next">
                                                <span aria-hidden="true">Prev</span>
                                            </a>
                                        </li>
                                    <?php }?>
                                    <?php for($i = $FirstPagination; $i <= $TotalSearchPage ; $i++){?>
                                        <?php if($pag <= $LimitRowPegination) { ?>
                                            <li  class="page-item">
                                                <a style="color:white;cursor: pointer;" class="page-link" href="<?php echo site_url('pages/'.$i); ?>" ><?php echo $i ?></a>
                                            </li>
                                            <?php $pag++ ?>    
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if($PageNowSearch < $TotalSearchPage ){?>
                                        <li class="page-item">
                                            <a class="page-link" style="color:white; cursor: pointer;" href="<?php echo site_url('pages/'.($PageNowSearch+1)); ?>"  aria-label="Next">
                                                <span aria-hidden="true">Next</span>
                                            </a>
                                        </li>
                                    <?php }?>
                                    <li class="page-item">
                                        <a class="page-link" style="color:white; cursor: pointer;" href="<?php echo site_url('pages/'.$TotalSearchPage); ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col text-right">
                            <div class="ico-sosmed ">
                                <!-- <a href="" class="ml-3"><i class="fab fa-instagram fa-2x"></i></a>
                                <a href="" class="ml-3"><i class="fab fa-facebook fa-2x"></i></a>
                                <a href="" class="ml-3"><i class="fab fa-twitter fa-2x"></i></a>
                                <a href="" class="ml-3"><i class="fab fa-youtube fa-2x"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row space-iklan mt-3">
                        <div class="col d-flex justify-content-center align-self-center">
                            <img src="assets/img/iklan.png">
                        </div>
                    </div> -->
                    <!-- chat room -->
                    <div class="col sidebar-col d-none d-lg-block">
                        <div class="row mb20">
                            <div class="col">
                                <div class="mb-3 text-h2 text-primary">Chatroom</div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div>
                                        <script id="cid0020000234317034312" rel="noopener noreferrer nofollow" data-cfasync="false" async src="https://st.chatango.com/js/gz/emb.js" style="width: 300px;height: 450px;">
                                        {
                                            "handle": "nime-indo",
                                            "arch": "js",
                                            "styles": {
                                                "a": "ffffff",
                                                "c": "00a8e9",
                                                "d": "2e3035",
                                                "e": "ffffff",
                                                "h": "ffffff",
                                                "l": "ffffff",
                                                "m": "ffffff",
                                                "p": "10",
                                                "q": "ffffff",
                                                "t": 0,
                                                "sbc": "bbbbbb",
                                                "fwtickm": 1
                                            }
                                        }
                                        </script>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->

    <!-- Iklan 2 -->
    <div class="container mt-5 mb-5">
        <!-- <img src="assets/img/anime/iklan.png" class="img-fluid"> -->
    </div>
    <!-- Iklan 2 -->
    <script src=<?php echo base_url()."assets/template_1/assets/js/streaming_anime.js"?> ></script>
    <script src=<?php echo base_url()."assets/template_1/assets/js/home.js"?> ></script>

