<?php
    $i = 0;
    $Title = "";
    $Image = "";
    $Genre = "";
    $Score = "";
    $Rating = "";
    $Status = "";
    $Synopsis = "";
    $lastEpisode = "";
    $paramsLastEps = "#";
    if($API_TheMovieRs->API_TheMovieRs->Status == "Not Complete"){ 
    }else{
        foreach($API_TheMovieRs->API_TheMovieRs->Body->SingleListAnime as $SingleListAnime){ 
            $Title = $SingleListAnime->Title;
            $Image = $SingleListAnime->Image;
            $slugDetail = $SingleListAnime->SlugDetail;
            foreach($SingleListAnime->ListDetail as $ListDetail){ 
                $Genre = $ListDetail->ListInfo->Genre;
                $Score = $ListDetail->ListInfo->Score;
                $Rating = $ListDetail->ListInfo->Rating;
                $Status = $ListDetail->ListInfo->Status;
                $Synopsis = $ListDetail->Synopsis;
            }
            foreach($SingleListAnime->ListEpisode as $ListEpisode){ 
                $paramsLastEps = $ListEpisode->SlugEp;
                $lastEpisode = $ListEpisode->Episode;
            }
        }
    }
?>
<div class="fixed-spacing ">
        <div class="anime-slider d-flex align-items-end">
            <section class="container container-1080">
                <div class="row d-none d-md-flex">
                    <div class="col-12 col-md-4 col-lg-3"></div>
                    <div class="col pl-4 text-white mb20 animeinfti">
                        <h1 class="fontsize-39 font-bold mb-3"><?php echo $Title ?></h1>
                        <span class="text-h3 japannm"></span></div>
                </div>
            </section>
            <div class="anime-slider-bg" style="background-image: url('<?php echo $Image ?>')"></div>
        </div>
        <section class="container container-1080 single-anime mb40 text-white">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3 anime-pic">
                    <div class="row mb20">
                        <div class="col-6 col-sm-4 col-md-12 mx-auto">
                            <div class="episode-ratio background-cover" style="background-image: url('<?php echo $Image;?>')" title="<?php echo $Title ?>"></div>
                        </div>
                    </div>
                    <div class="row mb20 d-md-none">
                        <div class="col animeinfti">
                            <span class="text-h3 font-bold mb-3 japannm"><?php echo $Title ?></span></div>
                    </div>
                    <div class="row mb20 series-details">
                        <div class="col-6 col-md-12 mb10">
                            <a href="<?php echo base_url().'streaming/'.$paramsLastEps;?>" class="btn btn-cta btn-success round roundepstr" style="width: 100%;padding: 8px 52px;">
                                <div class="d-flex align-items-center epsterbaru text-white">
                                    <i class="text-white size-26 mr-2"></i> 
                                    <span class="mobil">Eps</span>
                                    <span class="deskt">Episode</span> 
                                    <span class="terbaru">Terbaru</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-12">
                            <div class="text-h3 block"><?php echo $Status ?></div>
                        </div>
                        
                    </div>
                </div>
                <div class="col pl-4 text-white text-lightmode-black mt20">
                    <div class="row mb20">
                        <div class="col genrexarea">
                            <ul class="animegenre">
                            <?php $listGenre = explode("|",$Genre); ?>
                            <?php foreach($listGenre as $valueGenre){?>
                                <li><a href="<?php echo base_url().'genre/'.trim($valueGenre);?>" rel="tag"><?php echo  $valueGenre;?></a></li>
                            <?php }?>
                                
                            </ul>
                            <div class="ratingarea">
                                <span class="series-rating" style="background-size: 0% 100%">★★★★★</span></div>
                        </div>
                    </div>
                    <div class="row mb40">
                        <div class="col descanm">
                            <p><?php echo str_replace('nanime.org', 'nimeindo.net', $Synopsis) ?></p>
                        </div>
                    </div>
                    
                    <div class="adshome mb40"></div>
                    <div class="row mb40">
                        <div class="col">
                            <div class="text-h2 mb20 font-bold"><i class="fas fa-list-ul mr-2 text-lightmode-primary"></i> List Episode</div>
                            <div class="row epslist">
                                <div class="col">
                                    <div class="episodelist">
                                        <div class="row offzone text-h4 py-3">
                                            <div class="col col-sm-2">
                                                <a href="#" title="Change Order" class="btn-reverse-order"><i class="fa fa-sort mr-2"></i></a> Episode</div>
                                            <div class="col d-none d-sm-block lefttitle">Episode Title</div>
                                            <div class="col-3 d-none d-sm-block">Release Date</div>
                                        </div>
                                        <div class="list-episode">
                                            <ul class="leps">
                                            <?php if($API_TheMovieRs->API_TheMovieRs->Status == "Not Complete"){ ?>
                                            <?php }else{?>
                                                <?php foreach($API_TheMovieRs->API_TheMovieRs->Body->SingleListAnime as $SingleListAnime){ ?>
                                                    <?php foreach($SingleListAnime->ListEpisode as $ListEpisode){ ?>
                                                        <?php //$params = $ListEpisode->IDEpisode.'-'.$ListEpisode->SlugEp;?>
                                                        <?php $params = $ListEpisode->SlugEp;?>
                                                        <li class="row episodes text-h4 py-3">
                                                            <div class="col-2 d-none d-sm-block">
                                                                <a href="<?php echo base_url().'streaming/'.$params?>"><?php echo '0'.$i += 1; ?> </a>
                                                            </div>
                                                            <div class="col lefttitle">
                                                                <a href="<?php echo base_url().'streaming/'.$params?>"> <?php echo $ListEpisode->Episode ?></a>
                                                            </div>
                                                            <div class="col-3 d-none d-sm-block font-regular">2020</div>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('.btn-reverse-order').on('click', function(e) {
                                            var main_lists = $('.list-episode .leps');
                                            main_lists.each(function(idx) {
                                                var listItems = $(this).children('li');
                                                $(this).append(listItems.get().reverse());
                                            });
                                            return false;
                                        })
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="row mb20">
                        <div class="col">
                            <h2 class="mb-3 text-h2">Populer Anime</h2></div>
                    </div>
                    <div class="row mb40">
                        <div class="col">
                            <div class="row">
                                <?php if($API_TheMovieTrendingRs->API_TheMovieRs->Status=="Not Complete"|| empty($API_TheMovieTrendingRs)){ ?>
                                <?php }else{?>
                                    <?php foreach($API_TheMovieTrendingRs->API_TheMovieRs->Body->TrendingWeekAnime as $key => $API_TheMovieTrendingRs){ ?>
                                        <?php $params = $API_TheMovieTrendingRs->SlugDetail;?>
                                        <?php if($key < 4){?>
                                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 mb40 ">
                                            <a href="<?php echo site_url('anime/'.$params); ?>">
                                            <div class="series-card">
                                                <div class="episode-ratio background-cover" style="background-image: url('<?php echo $API_TheMovieTrendingRs->Image; ?>')" title="<?php echo $API_TheMovieTrendingRs->Title ?>">
                                                    <div class="series-detail px-3 pt-5">
                                                        <div class="">
                                                            <h4 class="text-white"><?php echo $API_TheMovieTrendingRs->Title ?></h4></div>
                                                        <div class="status-type text-white">
                                                            <span class="text-h6"><?php echo $API_TheMovieTrendingRs->Status ?></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- disqus -->
                    <input id="urlDetail" type="hidden" value="<?php echo base_url().'anime/'.$slugDetail?>">
                    <div class="row mb40">
                        <div class="col text-white text-center">
                        <div id="comment">
                                <div id="disqus_thread"> 
                                    <a href="#" class="comments-holder" onclick="loadDisqus();return false;">
                                        <i class="fas fa-comments"></i> Show/Post Comments</a>
                                    </div>
                                <script>
                                    var disqus_shortname = "nimeindo-net";
                                    var urlStreaming = $("#urlDetail").val();
                                    
                                    var disqus_config = function() {
                                        this.page.url = urlStreaming;
                                        this.page.identifier = urlStreaming;
                                    };
                                    var is_disqus_loaded = false;

                                    function loadDisqus() {
                                        if (!is_disqus_loaded) {
                                            is_disqus_loaded = true;
                                            var d = document,
                                                s = d.createElement('script');
                                            s.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                        }
                                    };
                                </script>
                                <noscript> Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a> </noscript>
                                <div id="bg_3386164486"></div>
                                <script type="text/javascript" src="//platform.bidgear.com/async.php?domainid=3386&sizeid=16&zoneid=4486&k=5ea811cb41082" defer="" async=""></script>
                            </div>
                        </div>
                    </div>
                </div>
        </div></section>
        </div>