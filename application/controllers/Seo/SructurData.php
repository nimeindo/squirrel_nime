<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SructurData {
    
    public static function WebPage($param =[],$default = False, $menu = False){
        // home list pusat bantuan anime ongoing genre list
        $webPageJson = array();
        
        if($default){
            $webPageJson = array(
                "@context" => "https://schema.org",
                "@type" => "WebPage",
                "name" => "Nimeindo",
                "description" => "NimeIndo adalah website dimana kalian bisa nonton anime subtitle indonesia terlengkap dan terupdate dengan koleksi lebih dari 30.000 judul dan 40.000 episode anime dari berbagai genre.",
                "publisher" => array(
                    "@type"=> "ProfilePage",
                    "name" => "Nimeindo Website"
                )
            );
        }else{
            // Menu
            $Organization = array(
                "@type" => "Organization",
                "@id" => $param['main_url']."#organization",
                "name" => $param['name_website'],
                "url" => $param['main_url'],
                "sameAs" => [
                    // "https://www.facebook.com/nimeindo24-108112447258606/",
                    "https://www.instagram.com/nimeindotv/"
                ],
                "logo" => [
                    "@type" => "ImageObject", 
                    "@id" => $param['main_url']."#logo", 
                    "inLanguage" => "id-ID", 
                    "url" => $param['main_url']."assets/template_1/assets/img/logo.png", 
                    "width" => 128, 
                    "height" => 128, 
                    "caption" => $param['name_website'],
                ],
                "image" => [
                    "@id" => $param['main_url']."#logo", 
                ]
            );

            $WebSite = array(
                "@type" => "WebSite",
                "@id" => $param['main_url']."#website",
                "url" => $param['main_url'],
                "name" => $param['name_website'],
                "inLanguage" => "id-ID",
                "description" => "Nonton Streaming Anime Sub Indonesia",
                "publisher" => [
                    "@id" => $param['main_url']."#organization"
                ],
                "potentialAction" => [ 
                    "@type" => "SearchAction",
                    "target" => $param['main_url']."search?KeyW={search_term_string}",
                    "query-input" => "required name=search_term_string"
                ]
            );
            $imageDetail = array(
                "@type" => "ImageObject", 
                "@id" => $param['url']."#primaryimage", 
                "inLanguage" => "id-ID", 
                "url" => $param['image_url'], 
                "width" => 320, 
                "height" => 450
            );

            $WebPage = array(
                "@type" => "WebPage",
                "@id" => $param['url']."#webpage",
                "url" => $param['url'],
                "name" => $param['name_page'].$param['name_website'],
                "isPartOf" => [
                    "@id" => $param['main_url']."#website"
                ]
                ,
                "inLanguage" => "id-ID",
                "datePublished" => $param['publish_date'].":24+00:00",
                "dateModified" => $param['publish_date'].":24+00:00",
                "description" => $param['description'],
                "breadcrumb" => [
                    "@id" => $param['url']."#breadcrumb"
                ]
                ,
                "potentialAction" => [
                    "@type" => "ReadAction", 
                    "target" => [$param['url']]
                ]
            );
            $BreadCrumList = array(
                "@type" => "BreadcrumbList",
                "@id" => $param['url']."#breadcrumb",
                "itemListElement" => [ 
                    [
                        "@type" => "ListItem",
                        "position" => 1,
                        "item" => [
                            "@type" =>  "WebPage", 
                            "@id" => $param['main_url'], 
                            "url" => $param['main_url'], 
                            "name" => "Home"
                        ]
                    ],
                    [
                        "@type" => "ListItem",
                        "position" => 2,
                        "item" => [
                            "@type" => "WebPage", 
                            "@id" => $param['url'], 
                            "url" => $param['url'], 
                            "name" => str_replace('-','',$param['name_page']),
                        ]
                    ]
                ]
            );

            if($menu){
                $graph = array(
                    $Organization,
                    $WebSite,
                    $WebPage,
                    $BreadCrumList
                );    
            }else{
                $graph = array(
                    $Organization,
                    $WebSite,
                    $imageDetail,
                    $WebPage,
                    $BreadCrumList
                );    
            }
            
            $webPageJson = array(
                "@context" => "https://schema.org",
                "@graph"=> $graph
            );
            // echo json_encode($webPageJson);exit;
        }
        
        $response = '<script type="application/ld+json">'.json_encode($webPageJson).'</script>';
        return $response;
    }
    

    public static function Website($param = [], $default = False){
        $websiteJson = array();
        if(count($param) > 0){
            $websiteJson = array(
                "@context" => "https://schema.org",
                "@type" => "WebSite",
                "@id" => $param['url']."#website",
                "url" => $param['url'],
                "name" =>  $param['name_website'],
                "inLanguage" => "id-ID",
                "description" => "Nonton Streaming Anime Sub Indonesia",
                "publisher" =>  [
                    "@id" => $param['main_url']."#organization"
                ],
                "potentialAction" => [ 
                    "@type" => "SearchAction",
                    "target" => $param['main_url']."search?KeyW={search_term_string}",
                    "query-input" => "required name=search_term_string"
                ]
            );
        }
        $response = '<script type="application/ld+json">'.json_encode($websiteJson).'</script>';
        return $response;
        
    }

    public static function CollectionPage($param = [], $default = false){
        $CollectionPageJson = array();
        if(count($param) > 0){

            $CollectionPageJson = array(
                "@context" => "https://schema.org",
                "@graph" => [ 
                [
                    "@type" => "Organization",
                    "@id" => $param['main_url']."#organization",
                    "name" => $param['name_website'],
                    "url" => $param['main_url'],
                    "sameAs" => [
                        // "https://www.facebook.com/nimeindo24-108112447258606/",
                        "https://www.instagram.com/nimeindotv/",
                    ],
                    "logo" =>  [
                        "@type" =>  "ImageObject", 
                        "@id" => $param['main_url']."#logo", 
                        "inLanguage" => "id-ID", 
                        "url" => $param['main_url']."assets/template_1/assets/img/logo.png", 
                        "width" => 128, 
                        "height" => 128, 
                        "caption" => $param['name_website']
                    ],
                    "image" => [
                        "@id" => $param['main_url']."#logo", 
                    ]
                ],
                [
                    "@type" => "WebSite",
                    "@id" => $param['url']."#website",
                    "url" => $param['url'],
                    "name" =>  $param['name_website'],
                    "inLanguage" => "id-ID",
                    "description" => "Nonton Streaming Anime Sub Indonesia",
                    "publisher" =>  [
                        "@id" => $param['main_url']."#organization"
                    ],
                    "potentialAction" => [ 
                        "@type" => "SearchAction",
                        "target" => $param['main_url']."search?KeyW={search_term_string}",
                        "query-input" => "required name=search_term_string"
                    ]
                ],
                [
                    "@type" => "CollectionPage",
                    "@id" => $param['url']."#webpage",
                    "url" => $param['url'],
                    "inLanguage" => "id-ID",
                    "name" => $param['name_website']." - Download Anime Streaming Subtitle Indonesia Gratis",
                    "isPartOf" =>  [
                        "@id" =>  $param['main_url']."#website"
                    ]
                    ,
                    "about" =>  [
                        "@id" =>  $param['main_url']."pusat-bantuan"
                    ]
                    ,
                    "description" => "Download anime subtitle indonesia dan gratis nonton anime streaming sub indo hanya di ".$param['name_website']
                    ]
                ]
            );
        }
        $response = '<script type="application/ld+json">'.json_encode($CollectionPageJson).'</script>';
        return $response;
    }

    public static function Organization($param = [], $default = false){
        $Organization = array(
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "@id" => $param['url']."#organization",
            "name" => $param['name_website'],
            "url" => $param['url'],
            "sameAs" => [
                // "https://www.facebook.com/nimeindo24-108112447258606/",
                "https://www.instagram.com/nimeindotv/",
            ],
            
        );
        $response = '<script type="application/ld+json">'.json_encode($Organization).'</script>';
        return $response;
    }

    public static function Article($param = [], $default = false){

        $article = array(
            "@type" => "Article",
            "@id" => $param['url']."#article",
            "isPartOf" =>  [
                "@id" => $param['url']."#webpage"
            ],
            "author" => [
                "@id" => $param['main_url']."/#/schema/person/1bee475bc550155f2661a366c0eede1a"
            ]
            ,
            "headline" => $param['name_page'],
            "datePublished" => "2020-04-22T23:40:24+00:00",
            "dateModified" => "2020-04-22T23:40:24+00:00",
            "commentCount" => 0,
            "mainEntityOfPage" => [
                "@id" => $param['url']."#webpage"
            ],
            "publisher" => [
                "@id" => $param['main_url']."#organization"
            ],
            "articleSection" => $param['name_page'],
            "inLanguage" => "id-ID"
        );
        $ArticleJson = array(
            "@context" => "https://schema.org",
            "@graph" => [ 
                $article
            ]
        );
        $response = '<script type="application/ld+json">'.json_encode($ArticleJson).'</script>';
        return $response;
    }
}