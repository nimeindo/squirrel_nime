<?php
    $i = 0;
    $Title = "";
    $Image = "";
    $Genre = "";
    $Score = "";
    $Rating = "";
    $Status = "";
    $Synopsis = "";
    if($API_TheMovieRs->API_TheMovieRs->Status == "Not Complete"){ 
    }else{
        foreach($API_TheMovieRs->API_TheMovieRs->Body->SingleListAnime as $SingleListAnime){ 
            $Title = $SingleListAnime->Title;
            $Image = $SingleListAnime->Image;
            foreach($SingleListAnime->ListDetail as $ListDetail){ 
                $Genre = $ListDetail->ListInfo->Genre;
                $Score = $ListDetail->ListInfo->Score;
                $Rating = $ListDetail->ListInfo->Rating;
                $Status = $ListDetail->ListInfo->Status;
                $Synopsis = $ListDetail->Synopsis;
            }
        }
    }
?>
 <!-- Content -->
 <div class="container">
        <div class="update-anime">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4>Detail Anime</h4>
                    <div class="jumbotron update-anime">
                        <!-- Baris 1 -->
                        <div class="row ">
                            <div class="col-6 col-md-6 col-sm-6 col-lg-4 anime-inner">
                                <img src="<?php echo $Image ?>" alt="<?php echo $Title ?>">
                            </div>
                            <div class="col-md-6 col-sm-6 col-6 col-lg-8 detail-anime">
                                <h5><?php echo $Title ?></h5>
                                <p><?php echo $Synopsis ?></p>
                            </div>
                        </div>
                        <div class="row  ">
                            <div class="col-md-12 col-lg-4">
                                <div class="genre-background">
                                    <table>
                                        <tr>
                                            <th><p>Genre</p></th>
                                            <td><p>:</p></td>
                                            <td colspan="2"><p> <?php echo $Genre ?></p></td>
                                        </tr>
                                        <tr>
                                            <th><p>Rating</p></th>
                                            <td><p>:</p></td>
                                            <td><p><?php echo $Rating ?></p></td>
                                        </tr>
                                        <tr>
                                            <th><p>Votes</p></th>
                                            <td><p>:</p></td>
                                            <td><p><?php echo $Score ?></p></td>
                                        </tr>
                                        <tr>
                                            <th><p>Status</p></th>
                                            <td><p>:</p></td>
                                            <td><p><?php echo $Status ?></p></td>
                                        </tr>
                                        <tr>
                                            <th><p>Total Episode</p></th>
                                            <td><p>:</p></td>
                                            <td><p></p></td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-8">
                                <table class="table-bordered border-list-episode">
                                    <thead>
                                       <tr>
                                         <th scope="row">#</th>
                                         <th scope="row">Judul Episode</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($API_TheMovieRs->API_TheMovieRs->Status == "Not Complete"){ ?>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td onclick=""><a href="" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='wheat'">Episode 1</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td onclick=""><a href="" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='wheat'">Episode 2</a></td>
                                            </tr>
                                        <?php }else{?>
                                            <?php foreach($API_TheMovieRs->API_TheMovieRs->Body->SingleListAnime as $SingleListAnime){ ?>
                                                <?php foreach($SingleListAnime->ListEpisode as $ListEpisode){ ?>
                                                    <?php //$params = $ListEpisode->IDEpisode.'-'.$ListEpisode->SlugEp;?>
                                                    <?php $params = $ListEpisode->SlugEp;?>
                                                    <tr>
                                                        <th scope="row"> <?php echo $i += 1; ?> </th>
                                                        <!-- <td onclick="getStreamPlay('<?php echo $params?>')"><a onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='wheat'"><?php echo $ListEpisode->Episode ?></a></td> -->
                                                        <td ><a href="<?php echo base_url().'streaming/'.$params?>" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='wheat'"><?php echo $ListEpisode->Episode ?></a></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
        </div>
    </div>
    <!-- Content -->

    <!-- Iklan 2 -->
    <div class="container mt-5 mb-5">
        <!-- <img src="assets/img/anime/iklan.png" class="img-fluid"> -->
    </div>
    <!-- Iklan 2 -->
    <script src=<?php echo base_url()."assets/template_1/assets/js/streaming_anime.js"?> ></script>