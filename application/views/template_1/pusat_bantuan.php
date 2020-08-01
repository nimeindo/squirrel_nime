
    <!-- Content -->
    <div class="container">
        <div class="update-anime">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <h4>Pusat Bantuan</h4>
                    <div class="jumbotron update-anime">
                        
                        <!-- Baris 1 -->
                        <div class="row ">
                            <div class="col-12 col-md-12 col-sm-12 col-lg-12 anime-inner">
                                <p>Anda memiliki pertanyaan atau keluh kesah seputar layanan NimeIndo Kami ? tanyakan langsung
                        ke kami. kami siap membantu anda menemukan solusi dari berbagai jenis bantuan.</p>
                                <form id='sendPusatBantuan' method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    <div class="form-group input-text">
                                        <input id="email "type="email" name="email" class="form-control"  placeholder="nimeindo@example.com" required>
                                        <input type="hidden" value="" id="baseUrl">
                                    </div>
                                    <div class="form-group input-text">
                                    <div class="custom-file">
                                        <input id="gambar" type="file" class="form-control" name="gambar" >
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group input-text-area">
                                        <textarea id="message" name="message" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="form-group input-text">
                                        <button type="submit" class="btn btn-secondary btn-block"><i class="fa fa-paper-plane" aria-hidden="true"></i> Kirim</button>
                                    </div>
                                    
                                </form>
                              
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

    <script src=<?php echo base_url()."assets/js/pusatbantuan.js"?>></script>