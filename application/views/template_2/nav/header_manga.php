
<body>
    <!-- Navbar -->
    <div class=mobile-menu>
      <div class=the-menu>
          <form action="<?php echo site_url('manga-search/'); ?>" id=form method=get itemprop=potentialAction role=search >
              <input id="s" type=text placeholder="Search Manga" name="KeyW" autocomplete=off>
          </form>
          <ul id=menu-mobile-header class=menu>
              <li id=menu-item-45919 class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-45919"><a href='<?php echo base_url().''?>'><i class="fas text-primary fa-home mr-2"></i> Home</a>
              </li>
              <li id=menu-item-45922 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45922"><a href="<?php echo base_url().'anime'?>"><i class="fas text-primary fa-fire mr-2"></i> Anime</a>
              </li>
              <li id=menu-item-45922 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45922"><a href="<?php echo base_url().'manga'?>"><i class="fas text-primary fa-snowflake-o mr-2"></i>Manga</a>
              </li>
              <li id=menu-item-45922 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45922"><a href="<?php echo base_url().'manga-list/img'?>"><i class="fas text-primary fa-server mr-2"></i>List Manga</a>
              </li>
              <li id=menu-item-45922 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45922"><a href="<?php echo site_url('manga-update/'); ?>"><i class="fas text-primary fa-rocket mr-2"></i>Chapter Terbaru</a>
              </li>
              <li id=menu-item-45922 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45922"><a href="<?php echo base_url().'manga/genre'?>"><i class="fas text-primary fa-magic mr-2"></i>Genre Manga</a>
              </li>
              
          </ul>
          <div class=mobilswc>
              <label id=switch class=switch>
                  <input type=checkbox id=slider>
                  <span class="slider round"></span>
              </label>
          </div>
      </div>
      <div class="bg-closer navbar-toggler"></div>
  </div>
  <header>
      <div class="header-nav d-none d-md-block">
          <div class="container container-big">
              <div class="row align-items-center">
                  <div class="col d-flex justify-content-start align-items-center">
                      <a href="<?php echo base_url() ?>">
                          <div class="header-logo d-flex align-items-center justify-content-start">
                          <img src=<?php echo base_url()."assets/template_2/assets/img/logoo.png" ?> class="img-fluid" width="106" alt="Nimeindo">
                              <!-- <div class=the-icon></div> -->
                              <!-- <div class="fontsize-20 font-bold ml-2">Nimeindo</div> -->
                          </div>
                      </a>
                      <ul class="main-nav d-flex flex-row justify-content-start text-h4 ml-5 mb-0 mt-1" id=accordionHeaderNav>
                          <li id=menu-item-29 class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-29"><a href="<?php echo base_url().''?>">Home</a>
                          </li>
                          <li id=menu-item-28 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28"><a href="<?php echo base_url().'anime'?>">Anime</a>
                          </li>
                          <li id=menu-item-28 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28"><a href="<?php echo base_url().'manga'?>">Manga</a>
                          </li>
                          <li id=menu-item-28 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28"><a href="<?php echo base_url().'manga-list/img'?>">List Manga</a>
                          </li>
                          <li id=menu-item-28 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28"><a href="<?php echo site_url('manga-update/'); ?>">Chapter Terbaru</a>
                          </li>
                          <li id=menu-item-28 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28"><a href="<?php echo base_url().'manga/genre'?>">Genre Manga</a>
                          </li>
                          
                      </ul>
                  </div>
                  <div class="col-2 d-none d-md-flex flex-row justify-content-end">
                      <form class="the-search form-inline my-2 my-lg-0" method=get id=searchform action="<?php echo site_url('manga-search/'); ?>"search"">
                          <input class="form-control mr-sm-2" type=search placeholder="Search Manga" aria-label=Search name="KeyW">
                      </form>
                  </div>
                  
              </div>
          </div>
      </div>
      <nav class="navbar mobile-nav navbar-expand-lg d-md-none">
          <button class=navbar-toggler id=menu-sh>
              <i class="fas fa-bars"></i>
          </button>
          <a href="<?php echo base_url() ?>" class=text-logo style="padding-right: 4%;">
              <span class="text-h2 font-bold">Nimeindo</span>
          </a>
          <div class="collapse navbar-collapse" id=navbarNav>
              <ul class=navbar-nav>
                  <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-29 menumob"><a href="<?php echo base_url().''?>">Home</a>
                  </li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28 menumob"><a href="<?php echo base_url().'anime'?>">Anime</a>
                  </li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28 menumob"><a href="<?php echo base_url().'manga'?>">Manga</a>
                  </li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28 menumob"><a href="<?php echo base_url().'manga-list/img'?>">List Manga</a>
                  </li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28 menumob"><a href="<?php echo site_url('manga-update/'); ?>">Chapter Terbaru</a>
                  </li>
                  <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28 menumob"><a href="<?php echo base_url().'manga/genre'?>">Genre Manga</a>
                  </li>
                  
              </ul>
          </div>
      </nav>
  </header>
    <script>
        $(document).ready(function() {
            $(".navbar-toggler").click(function() {
                $(".mobile-menu").toggleClass("show-mobile-menu");
                $(".mainbody").toggleClass("no-scroll");
            });
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $(".scrollToTop").fadeIn()
                } else {
                    $(".scrollToTop").fadeOut()
                }
            });
        });
    </script>
    <input id="baseUrl" type="hidden" value="#">
    
    
    