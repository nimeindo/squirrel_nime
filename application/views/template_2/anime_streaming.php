<?php 
    $Title = "Judul";
    $Image = "https://image.tmdb.org/t/p/w780/r1jOpRyqP5pKkvZvaiCXVJ5RYOa.jpg";
    $Synopsis = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum nesciunt illo nihil voluptate eligendi molestiae, neque earum quo dolor accusamus quam! Expedita eum quaerat nemo nobis. Assumenda delectus voluptates quae!";
    $Episode = "0";
    $Status = "";
    $Years = ""; 
    $Score = "";
    $Rating = "";
    $Studio = "";
    $Duration = "";
    $SlugEpNow = "";
    $Notfound = 0;
?>
<?php if($API_Streaming->API_TheMovieRs->Status == "Not Complete"){ 
  $Notfound = 1;  
?>
<?php }else{?>
    <?php foreach($API_Streaming->API_TheMovieRs->Body->StreamAnime as $StreamAnime){ ?>
        <?php $Title = $StreamAnime->Title; ?>
        <?php $Image2 = $StreamAnime->Image; ?>
        <?php $SlugEpNow = $StreamAnime->SlugEp; ?>
        <!-- #======================== ListDetail ========================-->
        <?php foreach($StreamAnime->ListDetail as $ListDetail){ ?>
            <?php $paramsIdNextStream = substr($ListDetail->ListInfo->IdNextStream, (strpos($ListDetail->ListInfo->IdNextStream, '-') ?: -1) + 1); ?>
            <?php $paramsIdPrevStream = substr($ListDetail->ListInfo->IdPrevStream, (strpos($ListDetail->ListInfo->IdPrevStream, '-') ?: -1) + 1); ?>
            <?php $params = $ListDetail->ListInfo->SlugDetail;?>
            <?php $nameDetail = ucwords(str_replace('-',' ',$ListDetail->ListInfo->SlugDetail));?>
            <?php $Synopsis = str_replace('nanime.org', 'nimeindo.net',$ListDetail->Synopsis); ?>
            <?php $Episode = $ListDetail->ListInfo->Episode; ?>
            <?php $Status = $ListDetail->ListInfo->Status; ?>
            <?php $Years = $ListDetail->ListInfo->Years; ?>
            <?php $Score = $ListDetail->ListInfo->Score; ?>
            <?php $Rating = $ListDetail->ListInfo->Rating; ?>
            <?php $Studio = $ListDetail->ListInfo->Studio; ?>
            <?php $Duration = $ListDetail->ListInfo->Duration; ?>
        <?php } ?>
    <?php } ?>
<?php }?>

    <div class="fixed-spacing pd-btm-14 pd-top-10">
        <?php if($Notfound ==0){?>
            <div class="container single mt40">
                <div class="row">
                    <div class="col breadcrumb m-0 text-h5"> <span><a href="<?php echo base_url() ?>">Home</a></span> / <span><a href="<?php echo base_url().'anime-detail/des/'.$params?>"><?php echo $nameDetail?></a></span> / <span><?php echo $Title?></span></div>
                </div>
                <div class="row mb30">
                    <div class="col">
                        <h1 class="text-white font-bold fontsize-23"><?php echo $Title?></h1></div>
                </div>
                <div class="row" style="position: relative;">
                    <div class="plyexpand"></div>
                    <div class="col col-main pr-lg-4">
                        <div class="adshome mb40"></div>
                        <div class="player-area">
                            <div class="mirrorarea">
                                <button class="btn mirrorbuttn" type="button" data-toggle="collapse" data-target="#mirror" aria-controls="mirror" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-server"></i> Server Player </button>
                                <!-- <div class="socialshare">
                                    <div class="socshare">
                                        <a class="icsocial " href="https://www.instagram.com/nimeindotv/" rel="noopener noreferrer nofollow" target="_blank"> <i class="fab fa-instagram"></i> </a>
                                    </div>
                                    
                                </div> -->
                            </div>
                            <div class="collapse navbar-collapse" id="mirror">
                                <div class="row mirror-buttons mb-3">
                                <?php if($API_Streaming->API_TheMovieRs->Status == "Not Complete"){ ?>
                                <?php }else{?>
                                <?php $i = 0; $serverData = array();?>
                                <?php foreach($API_Streaming->API_TheMovieRs->Body->StreamAnime as $StreamAnime){ ?>
                                    <!-- #====================== ListServer ========================= -->
                                    <?php foreach($StreamAnime->ListServer as $ListServer){ ?>
                                            <?php if($i < 4) {?>
                                                <div class="col-4 col-lg text-center px-0" onclick="serverStreamPlay('<?php echo $ListServer->IframeSrc ?>','<?php echo 'player-option-'.$i;?>')">
                                                    <div id="player-option-<?php echo $i;?>" class="the-button sunset_player_option" data-post="101048" data-nume="<?php echo $i ?>">
                                                        <div class="">Server <?php echo $i += 1 ?></div>
                                                    </div>
                                                </div>
                                                <?php $serverData [$i] = $ListServer->IframeSrc;?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                    
                                <?php }?>
                                    
                                </div>
                            </div>
                            <div class="row mb30">
                                <div class="col">
                                    <div class="player-ratio">
                                        <div id="theplayer" class="the-player">
                                            <div class="playerload">
                                            </div>
                                            <div id="player_embed">
                                                <div class="pframe" id="pframe">
                                                    <?php $ServerLocal = isset($serverData[1]) ? $serverData[1] : ''; ?>
                                                    <iframe id="videoPlay" class="playeriframe" src="<?php echo $ServerLocal; ?>" frameborder="0" scrolling="no" autoplay="false" allow=" encrypted-media" allowfullscreen="">
                                                    </iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb40">
                                <div class="col d-flex justify-content-between align-items-center plnavmob">
                                    <div class="d-flex justify-content-start plnavmob">
                                        <div class="btn-ep-nav"> 
                                            <?php if(!empty($paramsIdPrevStream)){ ?>
                                                <a href="<?php echo $paramsIdPrevStream?>">
                                                    <span>
                                                        <i class="fas fa-chevron-left ml-2"></i>
                                                    </span>
                                                </a>
                                            <?php }?>
                                                <a href="<?php echo base_url().'anime-detail/des/'.$params?>">
                                                    <span>
                                                        <i class="fas fa-list-ul"></i>
                                                    </span>
                                                </a>
                                            <?php if(!empty($paramsIdNextStream)){ ?>
                                                <a href="<?php echo $paramsIdNextStream?>">
                                                    <span>
                                                        <i class="fas fa-chevron-right ml-2"></i>
                                                    </span>
                                                </a>
                                            <?php }?>
                                        </div>
                                        <div class="toolnvpl">
                                            <div class="tooel">
                                                <a class="btn btn-ep-tool ml-3 toogleLight" data-toggle="collapse" href="#toogleLight" role="button" aria-expanded="false" aria-controls="toogleLight"> <i class="far fa-lightbulb"></i>
                                                    <div class="light-fix collapse" id="toogleLight"></div>
                                                </a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <button class="btn btn-success btn-video text-left" type="button" data-toggle="collapse" data-target="#download" aria-controls="download" aria-expanded="false"> <span class="text-h2 mr-2"> <i class="fas fa-download"></i> </span> <span class=""><div class="text-h4">Download</div><div class="text-h6">Sawidago</div> </span> </button>
                                </div>
                            </div>
                            <div class="collapse navbar-collapse" id="download">
                                <div class="row mirror-buttons mb-3">
                                    <div class="links_table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Download</th>
                                                    <th>Quality</th>
                                                    <th>Size</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if($API_Streaming->API_TheMovieRs->Status == "Not Complete"){ ?>
                                            <?php }else{?>
                                                <?php foreach($API_Streaming->API_TheMovieRs->Body->StreamAnime as $StreamAnime){ ?>
                                                    <?php foreach($StreamAnime->DownloadList as $adflyServer){ ?>
                                                        <?php foreach($adflyServer as $adflyDwonload){ ?>
                                                            <tr id="link-101048">
                                                                <td><img src="https://s2.googleusercontent.com/s2/favicons?domain=www64.zippyshare.com"> <a href="<?php echo $adflyDwonload->AdflyLink?>" target="_blank" alt="Download"">Download</a></td>
                                                                <td><strong class="quality"><?php echo $adflyDwonload->NameDownload?></strong></td>
                                                                <td>? Mb</td>
                                                            </tr>
                                                            <?php }?>
                                                    <?php }?>
                                                <?php }?>
                                            <?php }?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb50">
                            <div class="col">
                                <div class="floatsign">
                                    <div class="entry-content"> <img width="225" height="318" src="<?php echo $Image2 ?>" alt="<?php echo $Title ?>" />
                                        <h2><?php echo $Title?></h2>
                                        <h3><?php echo $Synopsis?></h3>
                                        <h4>Episode Lists</h4> : <i><a href="<?php echo base_url().'anime-detail/des/'.$params?>"><?php echo $nameDetail?></a></i>
                                        <br>
                                        <!-- <h4>Genre</h4> : <i>Action, Sci-Fi, Tokusatsu</i> -->
                                        <br>
                                        <div class="clear"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- disqus -->
                        <!-- <input id="urlStreaming" type="hidden" value="<?php echo base_url().'anime/streaming/'.$SlugEpNow?>">
                        <div class="row mb40">
                            <div class="col text-white text-center">
                                <div id="comment">
                                    <div id="disqus_thread"> 
                                        <a href="#" class="comments-holder" onclick="loadDisqus();return false;">
                                            <i class="fas fa-comments"></i> Show/Post Comments</a>
                                        </div>
                                    <script>
                                        var disqus_shortname = "nimeindo-net";
                                        var urlStreaming = $("#urlStreaming").val();
                                        
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
                        </div> -->
                    </div>
                    <!-- Chatroom -->
                    <div class="col sidebar-col d-none d-lg-block">
                        <div class="row mb20">
                            <div class="col">
                                <div class="mb-3 text-h2 text-primary">Chatroom</div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div>
                                        <script id="cid0020000234317034312" rel="noopener noreferrer nofollow" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 300px;height: 450px;">
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
        <?php }else{?>
            <div class="row mb40 pd-top-10">
                    <div class="col-12 col-md-12 not-found">
                    <h1 class="text-white font-bold"> 
                    </i>Streaming Anime Not Found</h1>
                    <img src="<?php echo base_url()."assets/template_2/assets/img/404.png"; ?>"class="center-404" width="80%" alt="404 NotFound" alt="">
                </div>
            </div>
        <?php }?>
    </div>
    <script src=<?php echo base_url()."assets/template_1/assets/js/streaming_anime.js"?> ></script>
