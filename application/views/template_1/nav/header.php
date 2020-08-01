<!doctype html>
<html lang="en">
<head>
    <!-- google search console -->
    
    <!-- enc google search console -->
    <!-- Required meta tags -->
    <title>NimeIndo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel=icon href=<?php echo base_url()."assets/img/favicon.png"?> type=image/gif>
    <link rel="shortcut icon" href=<?php echo base_url()."assets/img/favicon.png"?> >
    <meta name="google-site-verification" content="3KQlhxMlmslnx_eiZh-Mf8E8haDHnmXPOsNzyBuZ1fg" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if($RefreshPage){ ?>
        <meta http-equiv="Refresh" content="600"/>
    <?php }?>
    <meta name="keywords" content="Nimeindo, Anime Indo, Nonton Anime, Nimeindo, Nanime">
    <meta name="trending_keywords" content="<?php echo $TrendingKeyword ?>">
    <meta name="tags_keywords" content="<?php echo $TagsKeyword ?>">
    <meta name="description" content="NimeIndo adalah website dimana kalian bisa nonton anime subtitle indonesia terlengkap dan terupdate dengan koleksi lebih dari 30.000 judul dan 40.000 episode anime dari berbagai genre." />
    <meta property=og:image content="<?php echo base_url()."assets/template_1/assets/img/logo.png"?>">
    <meta property="og:image:width" content="1501" />
    <meta property="og:image:height" content="2639" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Nimeindo | Nonton Streaming Anime Subtitle Indonesia" />
    <meta property="og:description" content="NimeIndo adalah website dimana kalian bisa nonton anime subtitle indonesia terlengkap dan terupdate dengan koleksi lebih dari 30.000 judul dan 40.000 episode anime dari berbagai genre." />
    <meta property="og:url" content="<?php echo base_url()?>" />
    <meta property="og:site_name" content="Nimeindo" />
    <meta content="<?php echo base_url()?>" name="author" />
    <meta content="id" name="language" />
    <meta content="id" name="geo.country" />
    <link rel="canonical" href="<?php echo site_url($this->uri->uri_string()) ?>" />
    <meta content="Indonesia" name="geo.placename" />
    <!-- <Meta name = "googlebot" content = "NOODP, all" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <!-- pinters -->
    <meta name="p:domain_verify" content="6bba5f05d50f11fe7f6fc718ec3951b9"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <!-- <link rel="prev" href="https://animeindo.to/page/4/" />
    <link rel="next" href="https://animeindo.to/page/6/" /> -->
    <!-- scroll -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
    <!-- google ads -->
    <script data-ad-client="ca-pub-6254866850943257" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!-- CSS - Fontawesome -->
    <link rel="stylesheet" href=<?php echo base_url()."assets/template_1/assets/css/front.style.css"?> >
    <link rel="stylesheet" href=<?php echo base_url()."assets/template_1/assets/css/owl.carousel.min.css"?> >
    <link rel="stylesheet" href=<?php echo base_url()."assets/template_1/assets/css/owl.theme.default.min.css"?> >
    <link rel="stylesheet" href=<?php echo base_url()."assets/template_1/assets/css/all.min.css"?> >
    
    <link rel="stylesheet" href=<?php echo base_url()."assets/template_1/assets/css/animeindo.css"?> >
    <link rel="stylesheet" href=<?php echo base_url()."assets/template_1/assets/css/template1.css"?> >
    <script src=<?php echo base_url()."assets/template_1/assets/js/slider.min.js"?> ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    
    
    <!-- <link href="https://vjs.zencdn.net/7.7.5/video-js.css" rel="stylesheet" /> -->

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <!-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163772752-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-163772752-1');
    </script> -->
    <!-- WebPage -->
    <?php if(isset($SeoStructurData)){
        foreach($SeoStructurData as $key => $seo){
            echo "\t\n";
            echo $seo;
            
        }
    } ?>
</head>

<body>
    <!-- Navbar -->
    
    <div class=mobile-menu>
        <div class=the-menu>
            <form action="<?php echo base_url()."search"?>" id=form method=get itemprop=potentialAction role=search >
                <input id="s" type=text placeholder=Search... name="KeyW" autocomplete=off>
            </form>
            <ul id=menu-mobile-header class=menu>
                <li id=menu-item-45919 class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-45919"><a href='<?php echo base_url().''?>'><i class="fas text-primary fa-home mr-2"></i> Home</a>
                </li>
                <li id=menu-item-45922 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45922"><a href="<?php echo base_url().'anime-ongoing'?>"><i class="fas text-primary fa-font mr-2"></i> Anime Ongoing</a>
                </li>
                <li id=menu-item-45920 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45920"><a href="<?php echo base_url().'list-anime'?>"><i class="fas text-primary fa-fire mr-2"></i> List Anime</a>
                </li>
                <li id=menu-item-45921 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45921"><a href="<?php echo base_url()."genre"?>"><i class="far text-primary fa-calendar-alt mr-2"></i> Genre</a>
                </li>
                <li id=menu-item-45921 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45921"><a href="<?php echo base_url().'pusat-bantuan'?>"><i class="far text-primary fa-question-circle mr-2"></i> Pusat Bantuan</a>
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
                        <a href="<?php echo base_url()?>">
                            <div class="header-logo d-flex align-items-center justify-content-start">
                            <img src=<?php echo base_url()."assets/template_1/assets/img/logo.png"?> class="img-fluid" width="73" alt="Nimeindo">
                                <!-- <div class=the-icon></div> -->
                                <!-- <div class="fontsize-20 font-bold ml-2">Nimeindo</div> -->
                            </div>
                        </a>
                        <ul class="main-nav d-flex flex-row justify-content-start text-h4 ml-5 mb-0 mt-1" id=accordionHeaderNav>
                            <li id=menu-item-29 class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-29"><a href="<?php echo base_url().''?>">Home</a>
                            </li>
                            <li id=menu-item-28 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28"><a href="<?php echo base_url().'anime-ongoing'?>">Anime Ongoing</a>
                            </li>
                            <li id=menu-item-37 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-37"><a href="<?php echo base_url().'list-anime'?>">List Anime</a>
                            </li>
                            <li id=menu-item-38 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38"><a href="<?php echo base_url()."genre"?>">Genre</a>
                            </li>
                            <li id=menu-item-38 class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38"><a href="<?php echo base_url()."pusat-bantuan"?>">Pusat Bantuan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2 d-none d-md-flex flex-row justify-content-end">
                        <form class="the-search form-inline my-2 my-lg-0" method=get id=searchform action="<?php echo base_url()."search"?>">
                            <input class="form-control mr-sm-2" type=search placeholder=Search aria-label=Search name="KeyW">
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <nav class="navbar mobile-nav navbar-expand-lg d-md-none">
            <button class=navbar-toggler id=menu-sh>
                <i class="fas fa-bars"></i>
            </button>
            <a href="<?php echo base_url()?>" class=text-logo style="padding-right: 4%;">
                <span class="text-h2 font-bold">Nimeindo</span>
            </a>
            <div class="collapse navbar-collapse" id=navbarNav>
                <ul class=navbar-nav>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-29 menumob"><a href="<?php echo base_url().''?>">Home</a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28 menumob"><a href="<?php echo base_url().'anime-ongoing'?>">Anime Ongoing</a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-37 menumob"><a href="<?php echo base_url().'list-anime'?>">List Anime</a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38 menumob"><a href="<?php echo base_url()."genre"?>">Genre</a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38 menumob"><a href="<?php echo base_url()."pusat-bantuan"?>">Pusat Bantuan</a>
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
    <input id="baseUrl" type="hidden" value="<?php echo base_url()?>">
    