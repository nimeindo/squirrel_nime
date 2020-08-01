
        

    <!-- SECTION - Footer -->
    <div class="mt-5 pt-4 sec-footer">
        <div class="row">
            <div class="col d-flex">
                <a class="footer-brand ml-2 image-footer" href="<?php echo base_url()?>">
                    <img src=<?php echo base_url()."assets/template_1/assets/img/logo.png"?> class="img-fluid" alt="Nimeindo">
                </a>
                <div class="lorem-footer">
                    <p>NimeIndo adalah website dimana kalian bisa nonton anime subtitle indonesia terlengkap dan terupdate dengan koleksi lebih dari 30.000 judul dan 40.000 episode anime dari berbagai genre.</p>
                </div>
            </div>
            <div class="col d-flex justify-content-end ">
                <nav class="nav bot-nav ml-2 link-footer">
                    <!-- <a class="nav-link" href="<?php echo base_url().''?>" > Home</a> -->
                    <!-- <a class="nav-link" href="#">Anime Ongoing</a> -->
                    <!-- <a class="nav-link" href="<?php echo base_url().'list-anime'?>" > List Anime</a>
                    <a class="nav-link" href='<?php echo base_url()."genre"?>' > Genre List</a> -->
                    <!-- <a class="nav-link" href="<?php echo base_url().'pusat-bantuan'?>" > Pusat Bantuan</a> -->
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col text-right">
                <div class="ico-sosmed bot-icon ">
                    <!-- <a href="" class="ml-2"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="" class="ml-2"><i class="fab fa-facebook fa-2x"></i></a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- SECTION - Footer -->

    <!-- Footer -->
    <footer class="d-flex justify-content-center align-self-center">
        <p>Allright Reserved - nimeindo | Copyright 2019</p>
    </footer>
    <!-- Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    
    

    <!-- Font awesome JS -->
    <script src=<?php echo base_url()."assets/template_1/assets/js/search_anime.js"?> ></script>
    <script src=<?php echo base_url()."assets/template_1/assets/js/detail_anime.js"?> ></script>
    <script src=<?php echo base_url()."assets/template_1/assets/js/all.min.js"?> ></script>
    <script src=<?php echo base_url()."assets/template_1/assets/js/owl.carousel.min.js"?> ></script>
    <!-- <script src="https://vjs.zencdn.net/7.7.5/video.js"></script> -->

    
    <script>
            var owl = $('.owl-carousel')
             owl.owlCarousel({
                 items:4,
                 loop:true,
                 margin:10,
                 autoplay:true,
                 autoplayTimeout:10000,
                 autoplayHoverPause:true,
                 responsiveClass:true,
                 responsive:{
                     0:{
                         items:2,
                         nav:false
                     },
                     400:{
                         items:2,
                         nav:false
                     },
                     600:{
                         items:3,
                         nav:false
                     },
                     767:{
                         items:4,
                         nav:false
                     },
                     1000:{
                         items:7,
                         nav:true,
                     }
                 }
             });
    </script>
    
</body>

</html>