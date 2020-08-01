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

    <!-- Content -->
    <div class="container">
        <div class="update-anime">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4>Search - <?php echo $API_Keyword ?></h4>
                    <div class="jumbotron update-anime">
                        
                        <!-- Baris 1 -->
                        <div class="row ">
                        <?php if($API_TheMovieRs->API_TheMovieRs->Status == "Not Complete"){ ?>
                            
                        <?php }else{?>
                            <?php foreach($API_TheMovieRs->API_TheMovieRs->Body->SearchAnime as $SearchAnime){ ?>
                            <?php //$params = $SearchAnime->IdDetailAnime.'-'.$SearchAnime->SlugDetail;?>
                            <?php $params = $SearchAnime->SlugDetail;?>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-3 mb40">
                                <a href="<?php echo site_url('anime/'.$params); ?>">
                                        <div class="episode-card">
                                            <div class="episode-ratio background-cover" style="background-image: url('<?php echo $SearchAnime->Image ?>')" title="<?php echo $SearchAnime->Title ?>">
                                            <img src="<?php echo $SearchAnime->Image ?>" onerror="this.src='https://pbs.twimg.com/profile_images/600060188872155136/st4Sp6Aw_400x400.jpg'" alt="<?php echo $SearchAnime->Title ?>">
                                                <div class="episode-detail px-3 pt-5">
                                                    <div class="">
                                                        <h5 class="text-white"><?php echo $SearchAnime->Title ?></h5>
                                                    </div>
                                                    <?php foreach($SearchAnime->ListDetail as $ListDetail){ ?>
                                                    <div class="status-type text-white"> 
                                                        <span class="text-h6"></span> 
                                                        <span class="text-h6"><?php echo $ListDetail->ListInfo->Status ?></span>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                                <!-- <div class="episode-number"></div> -->
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
                                    <a href="<?php echo site_url('anime-ongoing/pages/1');?>" class="page-link" style="color:white"  aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php if($FirstPagination >= $LimitRowPegination){?>
                                        <li class="page-item">
                                            <a href="<?php echo site_url('anime-ongoing/pages/'.($PageNowSearch-1));?>" class="page-link" style="color:white; cursor: pointer;" aria-label="Next">
                                                <span aria-hidden="true">Prev</span>
                                            </a>
                                        </li>
                                    <?php }?>
                                    <?php for($i = $FirstPagination; $i <= $TotalSearchPage ; $i++){?>
                                        <?php if($pag <= $LimitRowPegination) { ?>
                                            <li class="page-item">
                                                <a href="<?php echo site_url('anime-ongoing/pages/'.($i));?>" style="color:white;cursor: pointer;" class="page-link" ><?php echo $i ?></a>
                                            </li>
                                            <?php $pag++ ?>    
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if($PageNowSearch < $TotalSearchPage ){?>
                                        <li class="page-item">
                                            <a href="<?php echo site_url('anime-ongoing/pages/'.($PageNowSearch+1));?>" class="page-link" style="color:white; cursor: pointer;"  aria-label="Next">
                                                <span aria-hidden="true">Next</span>
                                            </a>
                                        </li>
                                    <?php }?>
                                    <li class="page-item">
                                    <a href="<?php echo site_url('anime-ongoing/pages/'.$TotalSearchPage);?>" class="page-link" style="color:white" aria-label="Next">
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
                    <div class="chat-room mt-3">
                        <h6>CHATROOM</h6>
                        <div class="chat-script-desktop">
                            <script id="cid0020000234317034312" data-cfasync="false" async src="http://st.chatango.com/js/gz/emb.js" style="width: 90%;height: 350px;">{"handle":"nime-indo","arch":"js","styles":{"a":"000000","b":100,"c":"FFFFFF","d":"FFFFFF","k":"000000","l":"000000","m":"000000","n":"FFFFFF","p":"10","q":"000000","r":100,"fwtickm":1}}</script>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <script src=<?php echo base_url()."assets/template_1/assets/js/search_page.js"?> ></script>
