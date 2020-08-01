    <!-- Content -->
    <div class="container">
        <div class="update-anime">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4>Genre Anime</h4>
                    <div class="jumbotron update-anime">
                        <!-- Baris 1 -->
                        <div class="row ">
                            <div class="col-12 col-md-12 col-sm-12 col-lg-12 anime-inner">
                                <div class="table-responsive">
                                    <!-- baris 1 -->
                                    <?php if($API_TheMovieRs->API_TheMovieRs->Status=="Not Complete"){ ?> 
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <div class="list-title">A</div>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <a href="" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='rgb(145, 252, 58)'">Judul Anime</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='rgb(145, 252, 58)'">Judul Animasasasasasasasae</a>
                                                        </div>
                                                            <div class="col-md-6">
                                                            <a href="" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='rgb(145, 252, 58)'">Judul Anime</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='rgb(145, 252, 58)'">Judul Animasasasasasasasae</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    <?php }else{?> 
                                        <?php foreach($API_TheMovieRs->API_TheMovieRs->Body->GenreListAnime as $GenreListAnime){ ?>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <div class="list-title"><?php echo $GenreListAnime->NameIndex ?></div>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                        <?php foreach($GenreListAnime->ListSubIndex as $ListSubIndex){ ?>
                                                            <div class="col-md-6">
                                                                <!-- <a style="color:white" onclick="getListGenre('<?php echo $ListSubIndex->Genre ?>')" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='rgb(145, 252, 58)'"><?php echo $ListSubIndex->Genre; ?></a> -->
                                                                <a href="<?php echo base_url().'genre/'.$ListSubIndex->Genre ?>" style="color:white"  onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='rgb(145, 252, 58)'"><?php echo $ListSubIndex->Genre; ?></a>
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    <?php }?>
                                </div>
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
    <script src=<?php echo base_url()."assets/template_1/assets/js/search_genre.js"?> ></script>
