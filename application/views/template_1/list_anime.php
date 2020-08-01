    <!-- Iklan 2 -->
        <div class="container mt-5 mb-5">
            <!-- <img src=<?php echo base_url()."assets/template_1/assets/img/anime/iklan.png"?> class="img-fluid"> -->
        </div>
        <!-- Iklan 2 -->
        <div class="container">
            <div class="populer-anime">
                <h4> Anime List</h4>
            </div>
            <div class="jumbotron">
                <div class="table-responsive">
                    <!-- baris 1 -->
                    <?php if($API_TheMovieRs->API_TheMovieRs->Status=="Not Complete"){ ?> 
                        <table class="table">
                            <thead>
                              <tr>
                                <div class="list-title">#Not Found</div>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='rgb(145, 252, 58)'">#Not Found</a>
                                        </div>
                                    </div>
                                </td>
                              </tr>
                            </tbody>
                        </table>
                    <?php }else{?> 
                      <?php foreach($API_TheMovieRs->API_TheMovieRs->Body->ListAnime as $ListAnime){ ?>
                        <table class="table">
                            <thead>
                              <tr>
                                <div class="list-title"><?php echo $ListAnime->NameIndex ?></div>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                    <div class="row">
                                    <?php foreach($ListAnime->ListSubIndex as $ListSubIndex){ ?>
                                      <?php //$params = $ListSubIndex->IdDetailAnime.'-'.$ListSubIndex->SlugDetail;?>
                                      <?php $params = $ListSubIndex->SlugDetail;?>
                                        <div class="col-md-6">
                                            <!-- <a style="color:white; cursor: pointer;" onclick="getDetailListAnime('<?php echo $params ?>')" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='rgb(145, 252, 58)'"><?php echo $ListSubIndex->Title; ?></a> -->
                                            <a style="color:white; cursor: pointer;" href="anime/<?php echo $params?>" onMouseOver="this.style.color='rgb(252, 189, 63)'" onMouseOut="this.style.color='rgb(145, 252, 58)'"><?php echo $ListSubIndex->Title; ?></a>
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
        <script src=<?php echo base_url()."assets/template_1/assets/js/list_anime.js"?> ></script>